<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github pull request event. https://developer.github.com/v3/activity/events/types/#pullrequestevent
 */
abstract class PullRequestHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A user was assigned to a pull request.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function assigned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user was unassigned from a pull request.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unassigned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A review was requested.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function reviewRequested(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A review request was removed
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function reviewRequestRemoved(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request was reopened.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function reopened(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request was labeled.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function labeled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request was opened.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function opened(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pull request was closed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function closed(WebhookPayload $payload): void
    {
        //
    }
}