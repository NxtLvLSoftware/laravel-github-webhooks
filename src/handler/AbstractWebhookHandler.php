<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

abstract class AbstractWebhookHandler
{
    /**
     * Handle the webhook event.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    abstract public function handle(WebhookPayload $payload): void;
}