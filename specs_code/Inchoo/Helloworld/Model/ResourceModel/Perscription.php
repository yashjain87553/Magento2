<?php

namespace Inchoo\Helloworld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Contact Resource Model
 *
 * @author      Pierre FAY
 */
class Perscription extends AbstractDb
{
	 const TBL_ATT_PRODUCT = 'perscriptions';
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('perscriptions', 'id');
    }
}