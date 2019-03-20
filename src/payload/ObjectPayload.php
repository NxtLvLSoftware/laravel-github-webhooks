<?php

namespace nxtlvlsoftware\githubwebhooks\payload;

use StdClass;
use function json_decode;

class ObjectPayload extends WebhookPayload
{
    /**
     * Retrieve the event payload as an object from the request.
     *
     * @return \StdClass
     */
    public function getPayload(): StdClass
    {
        $payload = json_decode($this->getRawPayload());

        $this->checkDecodeError();

        return $payload;
    }
}