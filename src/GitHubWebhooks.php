<?php

namespace nxtlvlsoftware\githubwebhooks;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler;
use nxtlvlsoftware\githubwebhooks\payload\ArrayPayload;
use nxtlvlsoftware\githubwebhooks\payload\ObjectPayload;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;
use ReflectionClass;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function class_exists;
use function is_dir;

class GitHubWebhooks
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->useArrayPayloads();
    }

    /**
     * Handle a github webhook http request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function handleRequest(Request $request): void
    {
        if (($handler = $this->resolve($request->header('X-GitHub-Event'))) === null) {
            throw new NotFoundHttpException('Unhandled webhook event.');
        }

        $handler->handle($this->app->get(WebhookPayload::class));
    }

    /**
     * Resolve a webhook handler object from the service container by its event name.
     *
     * @param string $event
     *
     * @return \nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler|null
     */
    public function resolve(string $event): ?AbstractWebhookHandler
    {
        $class = 'nxtlvlsoftware\githubwebhooks\handler\\' . Str::classFromGithubEventName($event);

        if (!class_exists($class) or !$this->app->has($class)) {
            return null;
        }

        return $this->app->make($class);
    }

    /**
     * Register a webhook handler into the service container.
     *
     * @param string $class
     */
    public function registerHandler(string $class): void
    {
        $reflection = new ReflectionClass($class);
        if (is_subclass_of($class, AbstractWebhookHandler::class) and !$reflection->isAbstract() and $reflection->getParentClass()->getName() !== AbstractWebhookHandler::class) {
            $this->app->bind($reflection->getParentClass()->getName(), $class);
        }
    }

    /**
     * Register a directory of webhook handlers into the service container.
     *
     * @param string $dir
     */
    public function registerFromDir(string $dir = 'Http/Webhooks/GitHub')
    {
        $namespace = $this->app->getNamespace();

        if (is_dir($path = $this->app->path($dir))) {
            foreach ((new Finder)->in($path)->files() as $handler) {
                $handler = $namespace . str_replace(
                        ['/', '.php'],
                        ['\\', ''],
                        Str::after($handler->getPathname(), $this->app->path().DIRECTORY_SEPARATOR)
                    );

                $this->registerHandler($handler);
            }
        }
    }

    /**
     * Set the webhook payload class.
     *
     * @param string $class
     */
    public function usePayload(string $class): void
    {
        $this->app->bind(WebhookPayload::class, $class);
    }

    /**
     * Use stdObject's for representing the payload data passed to your handlers.
     */
    public function useObjectPayloads(): void
    {
        $this->usePayload(ObjectPayload::class);
    }

    /**
     * Use array's for representing the payload data passed to your handlers.
     */
    public function useArrayPayloads(): void
    {
        $this->usePayload(ArrayPayload::class);
    }
}