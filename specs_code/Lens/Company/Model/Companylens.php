<?php

namespace Lens\Company\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;

/**
 * Contact Model
 *
 * @author      Pierre FAY
 */
class Companylens extends AbstractModel
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $_dateTime;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Lens\Company\Model\ResourceModel\Companylens');
    }
}