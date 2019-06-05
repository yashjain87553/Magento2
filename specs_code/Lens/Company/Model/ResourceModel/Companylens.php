<?php

namespace Lens\Company\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Contact Resource Model
 *
 * @author      Pierre FAY
 */
class Companylens extends AbstractDb
{
	 const TBL_ATT_PRODUCT = 'lens_company';
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('lens_company', 'lenscompany_id');
    }
}