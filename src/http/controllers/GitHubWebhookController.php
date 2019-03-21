<?php

namespace nxtlvlsoftware\githubwebhooks\http\controllers;

use GitHubWebhooks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;
use nxtlvlsoftware\githubwebhooks\jobs\HandleWebhookJob;
use nxtlvlsoftware\githubwebhooks\models\GitHubWebhookEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GitHubWebhookController extends Controller
{
    public function __construct()
    {
        $this->middleware('webhook.github');
    }

    /**
     * Handle a github webhook http request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function webhook(Request $request)
    {
        if($request->hasHeader('X-GitHub-Event')) {
            $event = $request->header('X-GitHub-Event');
            // 404 on unhandled event
            if(GitHubWebhooks::handlesEvent($event)) {
                $model = GitHubWebhookEvent::create([
                    'event' => $event,
                    'payload' => $request->getContent(),
                ]);

                HandleWebhookJob::dispatch($model);

                return response()->json(['message' => 'ok']);
            }
        }

        throw new NotFoundHttpException('Unhandled webhook event.');
    }
}