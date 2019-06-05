<?php
namespace Inchoo\Helloworld\Block;
 
class Helloworld extends \Magento\Framework\View\Element\Template
{
	protected $mymodulemodelFactory;
    
     public function __construct(
     	\Magento\Catalog\Block\Product\Context $context,
        \Lens\Company\Model\ResourceModel\Companylens\CollectionFactory $mymodulemodelFactory
    )
    {
        $this->mymodulemodelFactory = $mymodulemodelFactory;
        parent::__construct(
                $context
                );
    }

    public function getCompanycollection()
    {

            return $this->mymodulemodelFactory->create();
    }
}