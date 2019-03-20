<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github milestone event. https://developer.github.com/v3/activity/events/types/#milestoneevent
 */
abstract class MilestoneHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A milestone was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A milestone was closed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function closed(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A milestone was opened.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function opened(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A milestone was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A milestone was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }
}