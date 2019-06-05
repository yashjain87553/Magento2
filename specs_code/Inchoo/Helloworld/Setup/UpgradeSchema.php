<?php

namespace Inchoo\Helloworld\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $setup->startSetup();
        $tableName = $setup->getTable('perscriptions');

        $installer->startSetup();
        
          $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'lens_type',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'Lens_Type'
                ]
            );
          $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'customer_id',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'Customer_Id'
                ]
            );

          $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'od_sph',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OD_SPH'
                ]
            );

           $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'od_cyl',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OD_CYL'
                ]
            );


           $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'od_axis',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OD_AXIS'
                ]
            );

             $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'od_d',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OD_D'
                ]
            );

             $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'os_sph',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OS_SPH'
                ]
            );

           $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'os_cyl',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OS_CYL'
                ]
            );


           $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'os_axis',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OS_AXIS'
                ]
            );

             $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'os_d',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'OS_D'
                ]
            );
             $installer->getConnection()->addColumn(
                $installer->getTable('perscriptions'),
                'image',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'image'
                ]
            );









          /* if ($setup->getConnection()->isTableExists($tableName) == true) {
                $connection = $setup->getConnection();
                 
                $connection->changeColumn(
                    $tableName,
                    'single-OD-sph',
                    'test',
                    ['type' => Table::TYPE_TEXT, 'nullable' => false, 'default' => ''],
                    'test'
                );
                // Changes here.
            }*/
        
        $installer->endSetup();
    }
}

