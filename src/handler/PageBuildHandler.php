<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github page build event. https://developer.github.com/v3/activity/events/types/#pagebuildevent
 */
abstract class PageBuildHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    protected $action_key = 'build.status';

    /**
     * A pages site was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function built(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A pages site wasn't created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function error(WebhookPayload $payload): void
    {
        //
    }
}