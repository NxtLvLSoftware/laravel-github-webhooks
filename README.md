Laravel GitHub Webhooks
===============
_Make github webhook handling in your laravel application a breeze._

[![Build Status](https://travis-ci.org/NxtLvLSoftware/laravel-github-webhooks.svg?branch=master)](https://travis-ci.org/NxtLvLSoftware/laravel-github-webhooks)

### About

This package provides container injection and controller like handling for each github webhook event available. Out of the
box you can generate a handler for an event with the `php artisan make:gh-webhook {event}` command, this will create a class
under `Http/Webhooks/GitHub` with the corresponding event name and a separate method for each action the webhook will notify
you of.

```php
<?php

namespace App\Http\Webhooks\GitHub;

use nxtlvlsoftware\githubwebhooks\handler\ForkHandler as Handler;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

class ForkHandler extends Handler
{
    protected function forked(WebhookPayload $payload): void
    {
        //
    }
}
```

You should then make sure you register the directory of handlers your application provides by calling `GitHubWebhooks::registerFromDir();`
from a service providers boot method. If you customized where your handlers are generated you can also pass the correct
directory to the register method: `GitHubWebhooks::registerFromDir('Http/Github');`

You can list all available/supported github webhook events with the `php artisan github-webhook:list` command.

### Installation

All you have to do to install with composer is the following:

```bash
$ composer require nxtlvlsoftware/laravel-github-webhooks
```

Or add it directly to your composer.json manifest:

```json
{
    "require": {
        "nxtlvlsoftware/laravel-github-webhooks": "*"
    }
}
```

Composer will automatically handle registering the service provider and facade for you, but you can also register these
manually if you wish.

You can then publish the migration file for creating the webhook events table:
```bash
$ php artisan vendor:publish --provider="nxtlvlsoftware\githubwebhooks\GitHubWebhooksServiceProvider" --tag="migrations"
```

You can also optionally publish the config file if you don't want to define your webhook secret in your .env file:
```bash
$ php artisan vendor:publish --provider="nxtlvlsoftware\githubwebhooks\GitHubWebhooksServiceProvider" --tag="config"
```

### Usage

You should register a POST API route that looks something like `https://myapp.com/api/webhook/github` and configure your
github application with this webhook url. This package provides a helper method for defining this route, add this to your api.php file:

```php
Route::githubWebhooks();
```

This will register a route at `github/webhook` by default. You may pass a custom route name as the first parameter and the
macro will respect nested group route rules.

If a webhook is received that there is no handler configured for, the request will throw a `Symfony\Component\HttpKernel\Exception\NotFoundHttpException`
that will cause the webhook delivery to fail with a 404 error and no job will be dispatched.

If there is a handler configured for the event and the signature is successfully verified then a new model will be inserted
into the `github_webhook_events` table with the event name, payload and information on the last jobs status. When the job
finished it will update the model and set the `handled` attribute to true and remove any failure information. If the job
encounters an error while handling the event then the model will be updated with the exception information and have the `failed`
attribute marked as true.

This package does not automatically delete handled webhook event data from the database as you may find it useful to re-schedule
failed event handler jobs in production or just run the handler again in a development environment.

#### Setting the payload type

You should set the webhook payload type that which you're expecting (the default is currently array payloads):
```php
GitHubWebhooks::useObjectPayloads(); // payload will be \stdObject
GitHubWebhooks::useArrayPayloads(); // payload will be an array
```

You can also implement your own payload class if you want to accept another format or parse the json differently:
```php
GitHubWebhooks::usePayload(YourPayload::class);
```

### Issues

Found a problem with this laravel github webhooks? Make sure to open an issue on the [issue tracker](https://github.com/NxtLvLSoftware/laravel-github-webhooks/issues)
and we'll get it sorted!

#

__The content of this repo is licensed under the Unlicense. A full copy of the license is available [here](LICENSE).__