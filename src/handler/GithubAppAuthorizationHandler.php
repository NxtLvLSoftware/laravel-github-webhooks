<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github app authorization event. https://developer.github.com/v3/activity/events/types/#githubappauthorizationevent
 */
abstract class GithubAppAuthorizationHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'revoked';

    /**
     * A user has revoked the github app.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function revoked(WebhookPayload $payload): void
    {
        //
    }
}