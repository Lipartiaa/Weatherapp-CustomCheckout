<?php
declare(strict_types=1);

namespace Devall\SimpleData\Setup\Patch\SimpleDataPatch;

use Devall\SimpleData\Setup\Patch\SimpleDataPatch;

class BlockFulfillmentStatusUpdate extends SimpleDataPatch
{
    public function apply()
    {
        $this->block->save([
            'identifier' => 'fulfillment_status',
            'title' => 'Updated Fulfillment Status',
        ]);
    }
}
