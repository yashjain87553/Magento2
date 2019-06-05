<?php

namespace Lens\Company\Model\ResourceModel\Companylens;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
  
    public function _construct()
    {
        $this->_init('Lens\Company\Model\Companylens', 'Lens\Company\Model\ResourceModel\Companylens');
    }
}