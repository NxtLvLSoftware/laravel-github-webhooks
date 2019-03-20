<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github commit comment event. https://developer.github.com/v3/activity/events/types/#commitcommentevent
 */
abstract class CommitCommentHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'created';

    /**
     * A commit comment was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function created(WebhookPayload $payload): void
    {
        //
    }
}