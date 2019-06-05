<?php

namespace Lensinfo\Save\Model\ResourceModel\Lensinfosave;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
  
    public function _construct()
    {
        $this->_init('Lensinfo\Save\Model\Lensinfosave', 'Lensinfo\Save\Model\ResourceModel\Lensinfosave');
    }
}