<?php

namespace nxtlvlsoftware\githubwebhooks\handler\fixtures;

use nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler;
use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;

class SingleSnakeCaseAction extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'action_snake_case';

    public static $called = false;

    public function actionSnakeCase(): void
    {
        self::$called = true;
    }
}