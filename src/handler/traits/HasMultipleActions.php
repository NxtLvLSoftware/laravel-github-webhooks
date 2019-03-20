<?php

namespace nxtlvlsoftware\githubwebhooks\handler\traits;

use Illuminate\Support\Str;
use nxtlvlsoftware\githubwebhooks\payload\ArrayPayload;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;
use ReflectionObject;
use RuntimeException;
use function explode;
use function is_string;

trait HasMultipleActions
{
    /**
     * Attempt to find the nested action key used to determine which action this event is, then call
     * the method for handling the action.
     *
     * @param \nxtlvlsoftware\githubwebhooks\payload\WebhookPayload $payload
     */
    public function handle(WebhookPayload $payload): void
    {
        $parts = explode('.', $this->actionKey());
        $current = ($payload instanceof ArrayPayload ? $payload->getPayload() : (new ArrayPayload($payload->request()))->getPayload());

        foreach($parts as $part) {
            if (!isset($current[$part])) {
                break;
            }

            $current = $current[$part];
        }

        if (!is_string($current) or !(new ReflectionObject($this))->hasMethod($method = Str::camel($current))) {
            throw new RuntimeException('Invalid nested action key provided to github webhook handler.');
        }

        $this->{$method}($payload);
    }

    private function actionKey(): string
    {
        return $this->action_key ?? 'action';
    }
}