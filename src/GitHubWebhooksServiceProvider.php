<?php

namespace nxtlvlsoftware\githubwebhooks;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Str;
use nxtlvlsoftware\githubwebhooks\console\Generator;
use nxtlvlsoftware\githubwebhooks\console\Kernel as Console;
use nxtlvlsoftware\githubwebhooks\http\controllers\GitHubWebhookController;
use nxtlvlsoftware\githubwebhooks\http\middleware\VerifyGitHubWebhookSecret;
use ReflectionClass;
use Route;
use function array_filter;
use function array_map;
use function class_exists;
use function explode;
use function implode;
use function preg_split;
use function strtolower;

/**
 * Service provider for the github webhook package.
 */
class GitHubWebhooksServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/github-webhooks.php', 'github-webhooks');

        Console::register();

        $this->macros();
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/github-webhooks.php' => config_path('github-webhooks.php')]);

            if (!class_exists('CreateGitHubWebhookEventsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_github_webhook_events_table.php.stub' => database_path('migrations/' . date('Y_m_d_His') . '_create_github_webhook_events_table.php'),
                ], 'migrations');
            }
        }

        $this->middleware();

        $this->app->singleton(Generator::class, function ($app) {
            return new Generator($app);
        });
    }

    /**
     * Register the middleware this service provider ships with.
     */
    protected function middleware(): void
    {
        $this->app->get(Router::class)->aliasMiddleware('webhook.github', VerifyGitHubWebhookSecret::class);
    }

    /**
     * Register the macros this package provides.
     */
    protected function macros(): void
    {
        /**
         * Register the github webhook route.
         *
         * @param string $url
         */
        Route::macro('githubWebhooks', function ($url = 'webhook/github') {
            return Route::post($url, '\\' . GitHubWebhookController::class . '@webhook');
        });

        /**
         * Get the corresponding handler classname from a webhook event name.
         *
         * @param string $name
         *
         * @return string
         */
        Str::macro('classFromGithubEventName', function (string $name) {
            return implode('', array_map(
                    'ucfirst',
                    explode('_', $name)
                )) . 'Handler';
        });

        /**
         * Get the github webhook event name from its corresponding handler class.
         *
         * @param string $class
         *
         * @return string
         */
        Str::macro('githubEventNameFromClass', function (string $class) {
            return strtolower(implode('_', array_filter(
                preg_split('/(?=[A-Z])/', strpos($class, '\\') !== false ? Str::shortClassName($class) : $class)
            )));
        });

        /**
         * Strip the fully qualified namespace from a class and return the base/short class name.
         *
         * @param string $class
         *
         * @return string
         */

        Str::macro('shortClassName', function (string $class) {
            return (new ReflectionClass($class))->getShortName();
        });
    }
}