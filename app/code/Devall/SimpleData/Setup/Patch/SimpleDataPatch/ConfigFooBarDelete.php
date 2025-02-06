<?php
declare(strict_types=1);

namespace Devall\SimpleData\Setup\Patch\SimpleDataPatch;

use Devall\SimpleData\Setup\Patch\SimpleDataPatch;

class ConfigFooBarDelete extends SimpleDataPatch
{
    public function apply()
    {
        $this->config->delete('foo/bar');
    }
}
