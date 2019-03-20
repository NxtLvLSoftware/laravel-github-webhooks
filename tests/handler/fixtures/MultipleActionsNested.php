<?php

namespace nxtlvlsoftware\githubwebhooks\handler\fixtures;

use nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler;
use nxtlvlsoftware\githubwebhooks\handler\traits\HasMultipleActions;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

class MultipleActionsNested extends AbstractWebhookHandler
{
    use HasMultipleActions;

    protected $action_key = 'this.is.a.nested.action';

    public static $action = false;
    public static $anAction = false;

    public function action(WebhookPayload $payload): void
    {
        self::$action = true;
    }

    public function anAction(WebhookPayload $payload): void
    {
        self::$anAction = true;
    }
}