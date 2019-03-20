<?php

namespace nxtlvlsoftware\githubwebhooks\handler\fixtures;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

class MultipleActions
{
    use HasMultipleActions;

    public static $created = false;
    public static $updated = false;
    public static $deleted = false;

    public function created(WebhookPayload $payload): void
    {
        self::$created = true;
    }

    public function updated(WebhookPayload $payload): void
    {
        self::$updated = true;
    }

    public function deleted(WebhookPayload $payload): void
    {
        self::$deleted = true;
    }
}