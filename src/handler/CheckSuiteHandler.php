<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github check suite event. https://developer.github.com/v3/activity/events/types/#checksuiteevent
 */
abstract class CheckSuiteHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A check suite completed action was performed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function completed(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A check suite requested action was performed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function requested(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A check suite rerequested action was performed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function rerequested(WebhookPayload $payload): void
    {
        //
    }
}