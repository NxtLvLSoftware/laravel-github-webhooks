<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github team add event. https://developer.github.com/v3/activity/events/types/#teamaddevent
 */
abstract class TeamAddHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'added';

    /**
     * A repository was added to a team
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function added(WebhookPayload $payload): void
    {
        //
    }
}