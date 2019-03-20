<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github pull request review comment event. https://developer.github.com/v3/activity/events/types/#pullrequestreviewcommentevent
 */
abstract class PullRequestReviewCommentHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A pull request review review comment was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request review comment was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request review comment was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }
}