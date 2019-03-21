<?php

namespace nxtlvlsoftware\githubwebhooks\console\commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;
use nxtlvlsoftware\githubwebhooks\console\Generator;
use nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler;
use ReflectionClass;
use ReflectionMethod;
use Str;
use function class_exists;
use function compact;
use function str_replace;
use function strlen;
use function strtolower;
use function substr;

class MakeWebhookHandlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:gh-webhook {event} {--P|path=Http/Webhooks/GitHub} {--N|name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new handler for a GitHub webhook event.';

    /** @var \nxtlvlsoftware\githubwebhooks\console\Generator */
    private $generator;

    public function __construct(Application $app)
    {
        parent::__construct();

        $this->generator = new Generator($app);
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (($class = $this->tryResolveHandler()) === null) {
            $this->error('Unknown GitHub webhook event \'' . $this->argument('event') . '\'. Run github-webhook:list to view available events names.');
            return;
        }

        $namespace = 'App\\' . str_replace('/', '\\', $this->option('path'));
        $classname = Str::shortClassName($class);
        $name = $this->option('name') ?? $classname;
        $event = substr($classname, 0, strlen($classname) - 7);

        $methods = [];
        foreach((new ReflectionClass($class))->getMethods(ReflectionMethod::IS_PROTECTED) as $method) {
            $methods[] = $method->getName();
        }

        $this->generator->generate(
            $this->option('path'), $name . '.php',
            'webhook_handler', compact(['namespace', 'event', 'name', 'methods']));

        $this->info('Generated github webhook handler for \'' . Str::githubEventNameFromClass($event) . '\' at \'' . $namespace . '\\' . $name . '\'');
    }

    protected function tryResolveHandler(): ?string
    {
        $input = trim($this->argument('event'));
        if(!$this->checkHandlerClass($class = Str::classFromGithubEventName(str_replace(' ', '_', strtolower($input))))) {
            if(!$this->checkHandlerClass($class = $input . 'Handler')) {
                if(!$this->checkHandlerClass($class = $input)) {
                    if(!$this->checkHandlerClass($input, false)) {
                        return null;
                    } else {
                        $class = Str::shortClassName($input);
                    }
                }
            }
        }

        return (new ReflectionClass('\nxtlvlsoftware\githubwebhooks\handler\\' . $class))->getName();
    }

    /**
     * Make sure the event is valid.
     *
     * @param string $class
     *
     * @param bool   $addFqn
     *
     * @return bool
     */
    protected function checkHandlerClass(string $class, bool $addFqn = true): bool
    {
        if($addFqn) {
            $class = '\nxtlvlsoftware\githubwebhooks\handler\\' . $class;
        }

        return class_exists($class) and $class !== AbstractWebhookHandler::class;
    }
}