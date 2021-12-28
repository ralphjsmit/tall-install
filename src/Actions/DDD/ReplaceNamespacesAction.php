<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

class ReplaceNamespacesAction
{
    public function __construct(
        private ReplaceNamespaceAction $replaceNamespaceAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $this->replaceNamespaceAction->execute($basePath, [
            [
                'path' => '/config/app.php',
                'search' => 'App\Providers',
                'replace' => 'Support\App\Providers',
            ],
            [
                'path' => '/database/seeders/DatabaseSeeder.php',
                'search' => 'App\Models',
                'replace' => 'Support\Models',
            ],
            [
                'path' => '/src/Support/App/Http/Kernel.php',
                'search' => '\App\Http\\',
                'replace' => '\Support\App\Http\\',
            ],
            [
                'path' => '/src/Support/App/Providers/AuthServiceProvider.php',
                'search' => 'App\Models\\',
                'replace' => 'Support\Models\\',
            ],
            [
                'path' => '/src/Support/App/Providers/AuthServiceProvider.php',
                'search' => 'App\Policies\\',
                'replace' => 'Support\App\Policies\\',
            ],
        ]);
    }
}
