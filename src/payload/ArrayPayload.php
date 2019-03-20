<?php

namespace nxtlvlsoftware\githubwebhooks\payload;

class ArrayPayload extends WebhookPayload
{
    /**
     * Retrieve the event payload as an array from the request.
     *
     * @return array
     */
    public function getPayload(): array
    {
        $payload = json_decode($this->getRawPayload(), true);

        $this->checkDecodeError();

        return $payload;
    }
}