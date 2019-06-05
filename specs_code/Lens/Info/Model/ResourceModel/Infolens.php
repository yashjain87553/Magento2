<?php

namespace Lens\Info\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Contact Resource Model
 *
 * @author      Pierre FAY
 */
class Infolens extends AbstractDb
{
	 const TBL_ATT_PRODUCT = 'lens_info';
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('lens_info', 'lensinfo_id');
    }
}