<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github repository event. https://developer.github.com/v3/activity/events/types/#repositoryevent
 */
abstract class RepositoryHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A repository was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deleted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository was archived.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function archived(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository was unarchived.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function unarchived(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository was made public.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function publicized(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A repository was made private.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function privatized(WebhookPayload $payload): void
    {
        //
    }
}