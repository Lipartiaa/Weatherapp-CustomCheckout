<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Creating weather data table
        if (!$setup->tableExists('devall_signup_weather')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('devall_signup_weather')
            )
                ->addColumn(
                    'weather_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Weather ID'
                )
                ->addColumn(
                    'city',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'City'
                )
                ->addColumn(
                    'temperature',
                    Table::TYPE_DECIMAL,
                    '10,2',
                    ['nullable' => false],
                    'Temperature'
                )
                ->addColumn(
                    'date',
                    Table::TYPE_DATETIME,
                    null,
                    ['nullable' => false],
                    'Date'
                )
                ->setComment('Weather Data Table');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
