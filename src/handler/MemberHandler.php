<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github member event. https://developer.github.com/v3/activity/events/types/#memberevent
 */
abstract class MemberHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A user was added to a repository as a collaborator.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function added(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A users role as a repository collaborator was revoked.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deleted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A users role as a repository collaborator was modified.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function edited(WebhookPayload $payload): void
    {
        //
    }
}