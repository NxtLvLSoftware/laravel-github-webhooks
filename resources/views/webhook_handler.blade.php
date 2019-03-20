<?= '<?php' ?>

<?php
/**
 * @var array $compacted
 *
 * @var string $namespace
 * @var string $event
 * @var string $name
 * @var string[] $methods
 */
extract($compacted, EXTR_OVERWRITE);

$last_method = $methods[count($methods) - 1];
?>

namespace <?= $namespace ?>;

use nxtlvlsoftware\githubwebhooks\handler\<?= $event ?>Handler as Handler;
use nxtlvlsoftware\githubwebhooks\payload\WebhookPayload;

class <?= $name ?> extends Handler
{
<?php foreach($methods as $method): ?>
    protected function <?= $method ?>(WebhookPayload $payload): void
    {
        //
    }
<?= $method !== $last_method ? "\n" : '' ?>
<?php endforeach; ?>
}
