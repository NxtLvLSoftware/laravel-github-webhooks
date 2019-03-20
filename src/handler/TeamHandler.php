<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github team  event. https://developer.github.com/v3/activity/events/types/#teamevent
 */
abstract class TeamHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A team was created.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function created(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A team was deleted.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function deleted(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A team was edited.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function edited(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A team was added to a repository.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function addedToRepository(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A team was removed from a repository.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    protected function removedFromRepository(WebhookPayload $payload): void
    {
        //
    }
}