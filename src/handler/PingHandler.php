<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github ping event. https://developer.github.com/webhooks/#ping-event
 */
class PingHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'ping';

    protected function ping(WebhookPayload $payload): void
    {
        //
    }
}