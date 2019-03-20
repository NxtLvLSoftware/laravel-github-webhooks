<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github security advisory event. https://developer.github.com/v3/activity/events/types/#securityadvisoryevent
 */
abstract class SecurityAdvisoryHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A security advisory was published.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function published(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A security advisory was updated.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function updated(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A security advisory was performed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function performed(WebhookPayload $payload): void
    {
        //
    }
}