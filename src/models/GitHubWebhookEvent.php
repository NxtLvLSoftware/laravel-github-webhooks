<?php

namespace nxtlvlsoftware\githubwebhooks\models;

use Illuminate\Database\Eloquent\Model;

class GitHubWebhookEvent extends Model
{
    protected $table = 'github_webhook_events';

    protected $fillable = [
        'event', 'payload', 'handled', 'failed', 'exception'
    ];

    protected $casts = [
        'handled' => 'bool',
        'failed' => 'bool',
    ];
}