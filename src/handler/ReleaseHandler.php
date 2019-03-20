<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github release event. https://developer.github.com/v3/activity/events/types/#releaseevent
 */
abstract class ReleaseHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A new release was published.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function published(WebhookPayload $payload): void
    {
        //
    }
}