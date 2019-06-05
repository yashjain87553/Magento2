<?php

namespace Lensinfo\Save\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Contact Resource Model
 *
 * @author      Pierre FAY
 */
class Lensinfosave extends AbstractDb
{
	 const TBL_ATT_PRODUCT = 'lensinfo_save';
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('lensinfo_save', 'id');
    }
}