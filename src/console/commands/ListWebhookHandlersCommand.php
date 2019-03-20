<?php

namespace nxtlvlsoftware\githubwebhooks\console\commands;

use GitHubWebhooks;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use function count;
use function implode;
use const PHP_EOL;

class ListWebhookHandlersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github-webhook:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the available webhook event handlers.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $eventNames = $this->collectEventNames();

        $this->info('Available GitHub webhook events (' . count($eventNames) . ' total)');
        $this->warn('  ' . implode(PHP_EOL . '  ', $eventNames));
    }

    /**
     * Scan the webhook handler directory and build a list of event names.
     *
     * @return array
     */
    private function collectEventNames(): array
    {
        $names = [];

        foreach ((new Finder)->in(__DIR__ . '/../../handler')->files() as $handler) {
            if ('AbstractWebhook' === ($name = substr($handler->getBasename(), 0, strlen($handler->getBasename()) - 11))) { // cut off 'Handler.php' suffix from file names
                continue; // skip the abstract webhook class
            }

            $names[] = GitHubWebhooks::eventNameFromClass($name);
        }

        return $names;
    }
}