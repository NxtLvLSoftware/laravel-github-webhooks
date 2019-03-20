<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

/**
 * Contract for the github marketplace purchase event. https://developer.github.com/v3/activity/events/types/#marketplacepurchaseevent
 */
abstract class MarketplacePurchaseHandler extends AbstractWebhookHandler
{
    use HasMultipleActions;

    /**
     * A user purchased a marketplace plan.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function purchased(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user cancelled a marketplace plan.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function cancelled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user is pending a marketplace plan charge.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function pendingCharge(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user is pending a cancelled marketplace plan charge.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function pendingChargeCancelled(WebhookPayload $payload): void
    {
        //
    }

    /**
     * A user was charged for a marketplace plan.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function charged(WebhookPayload $payload): void
    {
        //
    }
}