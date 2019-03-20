<?php

namespace nxtlvlsoftware\githubwebhooks;

use Carbon\Laravel\ServiceProvider;
use nxtlvlsoftware\githubwebhooks\console\Generator;
use nxtlvlsoftware\githubwebhooks\console\Kernel as Console;

/**
 * Service provider for the github webhook package.
 */
class GitHubWebhooksProvider extends ServiceProvider
{
    public function register(): void
    {
        Console::register();
    }

    public function boot()
    {
        $this->app->singleton(GitHubWebhooks::class, function ($app) {
            return new GitHubWebhooks($app);
        });

        $this->app->singleton(Generator::class, function ($app) {
            return new Generator($app);
        });
    }
}