<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

abstract class WatchHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A user stared a repository.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function stared(WebhookPayload $payload): void
    {
        //
    }
}