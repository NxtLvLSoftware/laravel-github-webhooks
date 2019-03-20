<?php

namespace nxtlvlsoftware\githubwebhooks\payload;

use Illuminate\Http\Request;
use function json_last_error_msg;
use Log;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use function json_last_error;
use const JSON_ERROR_NONE;

/**
 * The base webhook payload class.
 */
abstract class WebhookPayload
{
    /** @var \Illuminate\Http\Request */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function request(): Request
    {
        return $this->request;
    }

    /**
     * Retrieve the raw payload data from the request
     *
     * @return string|null
     */
    public function getRawPayload(): ?string
    {
        if($this->request->getContentType() === 'json') {
            return $this->request->getContent();
        }

        return null;
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