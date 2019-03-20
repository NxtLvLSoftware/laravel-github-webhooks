<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github content reference event. https://developer.github.com/v3/activity/events/types/#contentreferenceevent
 */
abstract class ContentReferenceHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'created';

    /**
     * An issue or pull request includes a URL that matches a configured content reference domain.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function created(WebhookPayload $payload): void
    {
        //
    }
}