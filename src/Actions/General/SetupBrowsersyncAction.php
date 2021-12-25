<?php

namespace RalphJSmit\TallInstall\Actions\General;

use Illuminate\Support\Str;

use function RalphJSmit\PestPluginFilesystem\contents;

class SetupBrowsersyncAction
{
    public function execute(string $basePath, string $domain = null): void
    {
        $webpackMixJsContents = Str::of(contents($basePath . '/webpack.mix.js'));

        $domain = $domain ? Str::of($domain)->remove('.test') : Str::of($basePath)->rtrim('/')->afterLast('/');

        $webpackMixJsContents = $webpackMixJsContents->append(
            Str::replace('valetDomain', $domain, contents(stub('webpack.mix.js.browsersync')))
        );

        file_put_contents($basePath . '/webpack.mix.js', $webpackMixJsContents);
    }
}