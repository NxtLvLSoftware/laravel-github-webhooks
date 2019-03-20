<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github installation event. https://developer.github.com/v3/activity/events/types/#installationevent
 */
abstract class InstallationHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A github app was installed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A github app had new permissions accepted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function newPermissionsAccepted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A github app was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }
}