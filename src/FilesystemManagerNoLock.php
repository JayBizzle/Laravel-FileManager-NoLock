<?php

namespace Jaybizzle\FileManagerNoLock;

use Illuminate\Filesystem\FilesystemManager as FM;
use Illuminate\Support\Arr;
use League\Flysystem\Adapter\Local as LocalAdapter;

class FilesystemManagerNoLock extends FM
{
    /**
     * Create an instance of the local driver.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public function createLocalDriver(array $config)
    {
        $permissions = isset($config['permissions']) ? $config['permissions'] : [];

        $links = Arr::get($config, 'links') === 'skip'
            ? LocalAdapter::SKIP_LINKS
            : LocalAdapter::DISALLOW_LINKS;

        return $this->adapt($this->createFlysystem(new LocalAdapter(
            $config['root'], 0, $links, $permissions
        ), $config));
    }
}
