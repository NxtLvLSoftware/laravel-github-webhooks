<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github repository import event. https://developer.github.com/v3/activity/events/types/#repositoryimportevent
 */
abstract class RepositoryImportHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A repository was imported.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function success(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository import was cancelled.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function cancelled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository failed to import.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function failure(WebhookPayload $payload): void
    {
        //
    }
}