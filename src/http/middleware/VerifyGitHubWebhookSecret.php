<?php

namespace nxtlvlsoftware\githubwebhooks\http\middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function abort;
use function config;
use function explode;
use function hash_equals;
use function hash_hmac;

/**
 * Verify the github webhook secret matches when receiving webhook events.
 */
class VerifyGitHubWebhookSecret
{
    public function handle(Request $request, Closure $next)
    {
        $secret = config('github-webhooks.secret');
        if ($secret !== '') {
            $signature = $this->checkHeader($request);

            if ($signature === false or !$this->isValidSignature($secret, $request->getContent(), $signature)) {
                abort(Response::HTTP_UNAUTHORIZED, 'Invalid signature.');
            }
        }

        return $next($request);
    }

    /**
     * Make sure the signature header exists and uses the correct hash algo.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|bool
     */
    protected function checkHeader(Request $request)
    {
        if($request->hasHeader('X-Hub-Signature')) {
            // X-Hub-Signature sha1=ff67cf27f59a9067366d653fda0baf46d1adbbdc
            $parts = explode('=', $request->header('X-Hub-Signature'));

            // make sure index 0 AND 1 are set and that the signature is using the correct algo
            if(isset($parts[1]) and $parts[0] === 'sha1') {
                return $parts[1];
            }
        }

        return false;
    }

    /**
     * Verify a signature is valid for the given payload.
     *
     * @param string $secret
     * @param string $payload
     * @param string $signature
     *
     * @return bool
     */
    protected function isValidSignature(string $secret, string $payload, string $signature): bool
    {
        return hash_equals(
            hash_hmac('sha1', $payload, $secret),
            $signature
        );
    }
}