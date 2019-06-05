<?php

namespace Lens\Info\Setup;

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
        $tableName = $setup->getTable('lens_info');

        $installer->startSetup();
        
          $installer->getConnection()->addColumn(
                $installer->getTable('lens_info'),
                'lenscompany_id',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'identity' => false,
                    'nullable' => true,
                    'primary'  => false,
                    'unsigned' => true,
                    'comment' => 'lenscompany_id'
                ]
            );        
        $installer->endSetup();
    }
}

