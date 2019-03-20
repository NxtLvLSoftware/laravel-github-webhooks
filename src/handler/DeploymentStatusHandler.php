<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github deployment status event. https://developer.github.com/v3/activity/events/types/#deploymentstatusevent
 */
abstract class DeploymentStatusHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    protected $action_key = 'deployment_status.state';

    /**
     * A deployment is pending.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function pending(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A deployment has succeeded.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function success(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A deployment has failed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function failure(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A deployment has errored.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function errored(WebhookPayload $payload): void
    {
        //
    }
}