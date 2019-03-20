<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github pull request review event. https://developer.github.com/v3/activity/events/types/#pullrequestreviewevent
 */
abstract class PullRequestReviewHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A pull request review review was submitted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function submitted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request review was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request review was dismissed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function dismissed(WebhookPayload $payload): void
    {
        //
    }
}