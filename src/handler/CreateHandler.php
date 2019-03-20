<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github create event. https://developer.github.com/v3/activity/events/types/#createevent
 */
abstract class CreateHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'created';

    /**
     * A repository, branch or tag was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }
}