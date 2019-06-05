<?php

namespace Lens\Info\Model\ResourceModel\Infolens;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
  
    public function _construct()
    {
        $this->_init('Lens\Info\Model\Infolens', 'Lens\Info\Model\ResourceModel\Infolens');
    }
}