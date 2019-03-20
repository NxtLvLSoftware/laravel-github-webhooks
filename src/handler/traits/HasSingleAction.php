<?php

namespace nxtlvlsoftware\githubwebhooks\handler\traits;

use Illuminate\Support\Str;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

trait HasSingleAction
{
    public function handle(WebhookPayload $payload): void
    {
        $this->{Str::camel($this->action)}($payload);
    }
}