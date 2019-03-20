<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github membership event. https://developer.github.com/v3/activity/events/types/#membershipevent
 */
abstract class MembershipHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A user was added to a team.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function added(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user was removed from a team.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function removed(WebhookPayload $payload): void
    {
        //
    }
}