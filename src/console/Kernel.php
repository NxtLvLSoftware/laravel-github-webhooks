<?php

namespace nxtlvlsoftware\githubwebhooks\console;

use Illuminate\Console\Application as Artisan;
use nxtlvlsoftware\githubwebhooks\console\commands\ListWebhookHandlersCommand;
use nxtlvlsoftware\githubwebhooks\console\commands\MakeWebhookHandlerCommand;

abstract class Kernel
{
    /**
     * Register all the commands provided by this package.
     */
    public static function register(): void
    {
        foreach (static::commands() as $command) {
            Artisan::starting(function ($artisan) use($command) {
                $artisan->resolve($command);
            });
        }
    }

    /**
     * The commands provided by this package.
     *
     * @return array
     */
    protected static function commands(): array
    {
        return [
            MakeWebhookHandlerCommand::class,
            ListWebhookHandlersCommand::class,
        ];
    }
}