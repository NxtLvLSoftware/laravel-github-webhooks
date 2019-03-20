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
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function deleted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was transferred.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function transferred(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was pinned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function pinned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unpinned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function unpinned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was closed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function closed(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was reopened.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function reopened(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was assigned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function assigned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unassigned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function unassigned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was labeled.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function labeled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unlabeled.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function unlabeled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was milestoned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function milestoned(WebhookPayload $payload): void
    {
        //
    }

    /**
     * An issue was unmilestoned.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function unmilestoned(WebhookPayload $payload): void
    {
        //
    }
}