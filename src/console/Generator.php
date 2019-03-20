<?php

namespace nxtlvlsoftware\githubwebhooks\console;

use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use function file_put_contents;

/**
 * Helper class to generate php files from blade templates.
 */
class Generator
{
    /** @var \Illuminate\Foundation\Application */
    private $app;

    /** @var \Illuminate\Filesystem\Filesystem */
    private $filesystem;

    /** @var \Illuminate\Events\Dispatcher */
    private $dispatcher;

    /** @var \Illuminate\View\Factory */
    private $factory;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->filesystem = $app->get(Filesystem::class);
        $this->dispatcher = $app->get(Dispatcher::class);

        $this->factory = $this->createViewFactory();
    }

    /**
     * Generate a file form a blade template provided by this package.
     *
     * @param string $path
     * @param string $filename
     * @param string $template
     * @param array  $compacted The compacted variables to be passed to
     */
    public function generate(string $path, string $filename, string $template, array $compacted): void
    {
        file_put_contents(
            $this->touchDirectory($this->app->path($path)) . '/' . $filename,
            $this->factory->make($template)
                ->with('compacted', $compacted)
                ->render()
        );
    }

    /**
     * Make sure a directory exists.
     *
     * @param string $path
     *
     * @return string
     */
    protected function touchDirectory(string $path): string
    {
        if (!$this->filesystem->isDirectory($path)) {
            $this->filesystem->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    /**
     * Create a blade factory for generating files.
     *
     * @return \Illuminate\View\Factory
     */
    private function createViewFactory(): Factory
    {
        $factory = new Factory(
            $resolver = new EngineResolver,
            new FileViewFinder($this->filesystem, [__DIR__ . '/../../resources/views']),
            $this->dispatcher
        );

        $resolver->register('php', function () {
            return new PhpEngine;
        });

        $factory->addExtension('php', 'php');

        return $factory;
    }
}