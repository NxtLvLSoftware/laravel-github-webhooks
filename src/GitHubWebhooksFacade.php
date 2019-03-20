<?php

namespace nxtlvlsoftware\githubwebhooks;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the github webhooks package.
 */
class GitHubWebhooksFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return GitHubWebhooks::class;
    }
}