<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github installation repositories event. https://developer.github.com/v3/activity/events/types/#installationrepositoriesevent
 */
abstract class InstallationRepositoriesHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A repository was added to a github app installation.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function added(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository was removed from a github app installation.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function removed(WebhookPayload $payload): void
    {
        //
    }
}