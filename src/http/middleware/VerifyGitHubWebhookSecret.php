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
        if($request->hasHeader('X-Hub-Signature')) {
            // X-Hub-Signature sha1=ff67cf27f59a9067366d653fda0baf46d1adbbdc
            $parts = explode('=', $request->header('X-Hub-Signature'));

            // make sure index 0 AND 1 are set and that the signature is using the correct algo
            if(isset($parts[1]) and $parts[0] === 'sha1') {
                [$algo, $signature] = $parts;

                if (hash_equals(
                    hash_hmac('sha1', $request->getContent(), config('github-webhooks.secret')),
                    $signature)
                ) {
                    return $next($request);
                }
            }
        }

        abort(Response::HTTP_UNAUTHORIZED, 'Invalid signature.');
    }
}