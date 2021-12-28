<?php

namespace RalphJSmit\TallInstall\Actions\Filesystem;

class DeleteFolderAction
{
    public function execute(string $path): void
    {
        foreach (scandir($path) as $file) {
            if ('.' === $file || '..' === $file) {
                continue;
            }

            if (is_dir("$path/$file")) {
                $this->execute("$path/$file");
            } else {
                unlink("$path/$file");
            }
        }
        rmdir($path);
    }
}
