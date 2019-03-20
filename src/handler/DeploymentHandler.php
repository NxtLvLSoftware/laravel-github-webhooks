<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github deployment event. https://developer.github.com/v3/activity/events/types/#deploymentevent
 */
abstract class DeploymentHandler extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'deployed';

    /**
     * A deployment occurred.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deployed(WebhookPayload $payload): void
    {
        //
    }
}