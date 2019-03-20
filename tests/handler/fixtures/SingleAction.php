<?php

namespace nxtlvlsoftware\githubwebhooks\handler\fixtures;

use nxtlvlsoftware\githubwebhooks\handler\AbstractWebhookHandler;
use nxtlvlsoftware\githubwebhooks\handler\traits\HasSingleAction;

class SingleAction extends AbstractWebhookHandler
{
    use HasSingleAction;

    protected $action = 'action';

    public static $called = false;

    public function action(): void
    {
        self::$called = true;
    }
}