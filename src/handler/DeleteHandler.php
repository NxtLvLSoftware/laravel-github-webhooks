<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github delete event. https://developer.github.com/v3/activity/events/types/#deleteevent
 */
abstract class DeleteHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'deleted';

    /**
     * A branch or tag was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deleted(WebhookPayload $payload): void
    {
        //
    }
}