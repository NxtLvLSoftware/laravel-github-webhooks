<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github issues event. https://developer.github.com/v3/activity/events/types/#issuesevent
 */
abstract class IssuesHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * An issue was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deleted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was transferred.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function transferred(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was pinned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function pinned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unpinned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unpinned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was closed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function closed(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was reopened.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function reopened(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was assigned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function assigned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unassigned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unassigned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was labeled.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function labeled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unlabeled.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unlabeled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was milestoned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function milestoned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unmilestoned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unmilestoned(WebhookPayload $payload): void
    {
        //
    }
}