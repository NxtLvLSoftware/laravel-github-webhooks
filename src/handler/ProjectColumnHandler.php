<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github project column event. https://developer.github.com/v3/activity/events/types/#projectcolumnevent
 */
abstract class ProjectColumnHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A project column was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project column was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project column was moved.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function moved(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project column was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deleted(WebhookPayload $payload): void
    {
        //
    }
}