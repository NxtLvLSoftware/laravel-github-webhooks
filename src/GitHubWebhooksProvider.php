<?php

namespace nxtlvlsoftware\githubwebhooks;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Routing\Router;
use nxtlvlsoftware\githubwebhooks\console\Generator;
use nxtlvlsoftware\githubwebhooks\console\Kernel as Console;
use nxtlvlsoftware\githubwebhooks\http\middleware\VerifyGitHubWebhookSecret;

/**
 * Service provider for the github webhook package.
 */
class GitHubWebhooksProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/github-webhooks.php', 'github-webhooks');

        Console::register();
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/github-webhooks.php' => config_path('github-webhooks.php')]);

        $this->middleware();

        $this->app->singleton(GitHubWebhooks::class, function ($app) {
            return new GitHubWebhooks($app);
        });

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
}