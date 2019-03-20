<?php

namespace nxtlvlsoftware\githubwebhooks\handler\fixtures;

use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

class MultipleSnakeCaseActions
{
    use HasMultipleActions;

    public static $created = false;
    public static $updated = false;
    public static $deleted = false;

    public function createdSnakeCase(WebhookPayload $payload): void
    {
        self::$created = true;
    }

    public function updatedSnakeCase(WebhookPayload $payload): void
    {
        self::$updated = true;
    }

    public function deletedSnakeCase(WebhookPayload $payload): void
    {
        self::$deleted = true;
    }
}