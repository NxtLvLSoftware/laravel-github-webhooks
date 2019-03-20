<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github check run event. https://developer.github.com/v3/activity/events/types/#checkrunevent
 */
abstract class CheckRunEventHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A new check run was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * Someone requested to re-run a check run.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function rerequested(WebhookPayload $payload): void
    {
        //
    }

    /**
     * Someone requested that an action be taken.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function requestedAction(WebhookPayload $payload): void{
        //
    }
}