<?php
declare(strict_types=1);

namespace Devall\SimpleData\Setup\Patch\SimpleDataPatch;

use DEvall\SimpleData\Setup\Patch\SimpleDataPatch;

class ConfigFooBarCreate extends SimpleDataPatch
{
    public function apply()
    {
        $this->config->save('foo/bar', 'baz');
    }
}
