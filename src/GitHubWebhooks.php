<?php

namespace nxtlvlsoftware\githubwebhooks;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler;
use ReflectionClass;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function array_map;
use function class_exists;
use function explode;
use function implode;
use function is_dir;

class GitHubWebhooks
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
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
        $class = 'nxtlvlsoftware\githubwebhooks\handler\\' . $this->classFromEventName($event);

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
            $this->app->singleton($reflection->getParentClass()->getName(), function () use($class) {
                return new $class;
            });
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
     * Get the corresponding handler classname from a webhook event name.
     *
     * @param string $name
     *
     * @return string
     */
    public function classFromEventName(string $name): string
    {
        return implode('', array_map(
            'ucfirst',
            explode('_', $name)
        )) . 'Handler';
    }

    /**
     * Get the github webhook event name from its corresponding handler class.
     *
     * @param string $classname
     *
     * @return string
     */
    public function eventNameFromClass(string $classname): string
    {
        return strtolower(implode('_', array_filter(
            preg_split('/(?=[A-Z])/', strpos($classname, '\\') !== false ? $this->stripFullNamespace($classname) : $classname)
        )));
    }

    /**
     * Strip the fully qualified namespace from a class and return the base/short class name.
     *
     * @param string $class
     *
     * @return string
     */
    public function stripFullNamespace(string $class): string
    {
        return (new ReflectionClass($class))->getShortName();
    }
}