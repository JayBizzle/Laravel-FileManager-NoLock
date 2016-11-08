<?php

namespace Jaybizzle\FileManagerNoLock;

use Illuminate\Filesystem\FilesystemServiceProvider as FSP;

class FilesystemServiceProvider extends FSP
{
    /**
     * Register the filesystem manager.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('filesystem', function () {
            return new FilesystemManagerNoLock($this->app);
        });
    }
}
