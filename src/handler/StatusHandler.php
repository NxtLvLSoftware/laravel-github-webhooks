<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github status event. https://developer.github.com/v3/activity/events/types/#statusevent
 */
abstract class StatusHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    protected $action_key = 'state';

    /**
     * The status of a commit is pending.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function pending(WebhookPayload $payload): void
    {
        //
    }

    /**
     * The status of a commit is success.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function success(WebhookPayload $payload): void
    {
        //
    }

    /**
     * The status of a commit is failed.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function failure(WebhookPayload $payload): void
    {
        //
    }

    /**
     * The status of a commit is errored.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function error(WebhookPayload $payload): void
    {
        //
    }
}