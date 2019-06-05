<?php

namespace Inchoo\Helloworld\Model\ResourceModel\Perscription;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
  
    public function _construct()
    {
        $this->_init('Inchoo\Helloworld\Model\Perscription', 'Inchoo\Helloworld\Model\ResourceModel\Perscription');
    }
}