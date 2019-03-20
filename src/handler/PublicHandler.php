<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github public event. https://developer.github.com/v3/activity/events/types/#publicevent
 */
abstract class PublicHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'public';

    /**
     * A repository was made public.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function public(WebhookPayload $payload): void
    {

    }
}