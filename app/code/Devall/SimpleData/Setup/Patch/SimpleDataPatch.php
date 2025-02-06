<?php
declare(strict_types=1);

namespace Devall\SimpleData\Setup\Patch;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class SimpleDataPatch implements DataPatchInterface
{
    protected $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        // აქ დაამატეთ თქვენი ლოგიკა
        // მაგალითად, შექმენით CMS ბლოკი:
        $this->moduleDataSetup->getConnection()->insert(
            $this->moduleDataSetup->getTable('cms_block'),
            [
                'identifier' => 'foo_bar',
                'title' => 'Foo Bar',
                'content' => '<div class="foo-bar">Foo bar content</div>',
                'is_active' => 1,
                'creation_time' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
