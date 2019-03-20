<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github org block event. https://developer.github.com/v3/activity/events/types/#orgblockevent
 */
abstract class OrgBlockHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A user was blocked from an organization.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function blocked(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user was unblocked from an organization.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unblocked(WebhookPayload $payload): void
    {
        //
    }
}