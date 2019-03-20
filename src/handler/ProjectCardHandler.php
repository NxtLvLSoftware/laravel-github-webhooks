<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github project card event. https://developer.github.com/v3/activity/events/types/#projectcardevent
 */
abstract class ProjectCardHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A project card was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project card was updated.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function updated(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project card was moved.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function moved(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project card was converted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function converted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A project card was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }
}