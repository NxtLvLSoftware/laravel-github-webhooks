<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github push event. https://developer.github.com/v3/activity/events/types/#https
 */
abstract class PushHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'pushed';

    /**
     * A group of commits were pushed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function pushed(WebhookPayload $payload): void
    {
        //
    }
}