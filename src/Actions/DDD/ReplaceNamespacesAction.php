<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

class ReplaceNamespacesAction
{
    public function __construct(
        private ReplaceNamespaceAction $replaceNamespaceAction,
    ) {}

    public function execute(string $basePath): void
    {
        $this->replaceNamespaceAction->execute($basePath, [
            [
                'path' => '/config/app.php',
                'search' => 'App\Providers',
                'replace' => 'Support\App\Providers',
            ],
            [
                'path' => '/config/auth.php',
                'search' => 'App\Models\User::class',
                'replace' => 'Support\Models\User::class',
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
            [
                'path' => '/src/Support/App/Providers/BladeServiceProvider.php',
                'search' => '\App\View\Components\Layouts\\',
                'replace' => '\Support\View\Components\Layouts\\',
            ],
        ]);
    }
}
