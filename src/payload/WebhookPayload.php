<?php

namespace nxtlvlsoftware\githubwebhooks\payload;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use function json_last_error;
use const JSON_ERROR_NONE;

/**
 * The base webhook payload class.
 */
abstract class WebhookPayload
{
    /**
     * @var string
     */
    private $raw;

    /**
     * Set the raw webhook payload.
     *
     * @param string $raw
     *
     * @return \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload
     */
    public function setRawPayload(string $raw): WebhookPayload
    {
        $this->raw = $raw;

        return $this;
    }

    /**
     * Get the raw payload data.
     *
     * @return string|null
     */
    public function getRawPayload(): ?string
    {
        return $this->raw;
    }

    /**
     * Retrieve the event payload from the request.
     *
     * @return mixed
     */
    abstract public function getPayload();

    /**
     * Check if there is a json encode/encode error.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    protected function checkDecodeError(): void
    {
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new BadRequestHttpException('Received invalid json payload from webhook');
        }
    }
}