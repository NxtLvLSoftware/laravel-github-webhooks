<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github project event. https://developer.github.com/v3/activity/events/types/#projectevent
 */
abstract class ProjectHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A project was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project  was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project  was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project  was closed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function closed(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project  was reopened.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function reopened(WebhookPayload $payload): void
    {
        //
    }
}