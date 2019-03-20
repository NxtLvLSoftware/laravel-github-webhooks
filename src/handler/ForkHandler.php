<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github fork event. https://developer.github.com/v3/activity/events/types/#forkevent
 */
abstract class ForkHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'forked';

    /**
     * A user forked a repository.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function forked(WebhookPayload $payload): void
    {
        //
    }
}