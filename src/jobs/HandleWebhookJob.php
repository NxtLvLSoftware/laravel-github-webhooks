<?php

namespace nxtlvlsoftware\githubwebhooks\jobs;

use App;
use Exception;
use GitHubWebhooks;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use nxtlvlsoftware\githubwebhooks\models\GitHubWebhookEvent;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;
use Str;

class HandleWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \nxtlvlsoftware\githubwebhooks\models\GitHubWebhookEvent
     */
    public $model;

    public function __construct(GitHubWebhookEvent $model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        if ($this->model->handled) {
            return;
        }

        $handler = GitHubWebhooks::resolve($this->model->event);

        if ($handler !== null) {
            $handler->handle(App::make(WebhookPayload::class)
                ->setRawPayload($this->model->payload));
        }

        $this->succeeded();
    }

    /**
     * Update the event model to set it as handled.
     */
    protected function succeeded(): void
    {
        $this->model->update([
            'handled' => true,
            'failed' => false,
            'exception' => null,
        ]);
    }

    /**
     * Update the job model with the failure information.
     *
     * @param \Exception $exception
     */
    public function failed(Exception $exception): void
    {
        $this->model->update([
            'handled' => false,
            'failed' => true,
            'exception' => [
                'name' => Str::shortClassName($exception),
                'message' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]
        ]);
    }
}