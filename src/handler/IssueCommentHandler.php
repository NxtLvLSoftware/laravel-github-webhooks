<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github issue comment event. https://developer.github.com/v3/activity/events/types/#issuecommentevent
 */
abstract class IssueCommentHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * An issue comment was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue comment was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue comment was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }
}