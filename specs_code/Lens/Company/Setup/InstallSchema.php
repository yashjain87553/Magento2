<?php
namespace Lens\Company\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('lens_company')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('lens_company')
            )
            ->addColumn(
                'lenscompany_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'Lens Company ID'
            )
            ->addColumn(
                'company_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable => false'],
                'Author Name'
            )
            ->addColumn(
                'lens_image_one',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Lens Image One '
            )
            ->addColumn(
                'lens_image_two',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Lens Image two '
            )
            ->addColumn(
                'Features',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Rating'
            )
            ->addColumn(
                'message',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Message'
            )
           ->addColumn(
                'display_order',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => false,
                    'nullable' => true,
                    'primary'  => false,
                    'unsigned' => true,
                ],
                'Display Order'
            )
            ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                [],
                'Status'
            )
             
            ->setComment('Lens Company Table');
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
            }
            }
            }