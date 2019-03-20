<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Webhook Secret
    |--------------------------------------------------------------------------
    |
    | The secret used to sign webhook event requests coming from GitHub. You
    | should always set this up in production environments so you only ever
    | receive webhook payloads from GitHub.
    |
    */

    'secret' => env('GITHUB_WEBHOOK_SECRET', ''),

];