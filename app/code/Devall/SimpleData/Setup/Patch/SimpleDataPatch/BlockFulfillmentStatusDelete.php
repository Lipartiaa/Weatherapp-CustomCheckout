<?php
declare(strict_types=1);

namespace Devall\SimpleData\Setup\Patch\SimpleDataPatch;

use Devall\SimpleData\Setup\Patch\SimpleDataPatch;

class BlockFulfillmentStatusDelete extends SimpleDataPatch
{
    public function apply()
    {
        $this->block->delete('fulfillment_status');
    }
}
