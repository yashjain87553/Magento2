<?php
namespace Lens\Info\Model\Source;

class Status implements \Magento\Framework\Option\ArrayInterface
{
    const ENABLED = 1;
    const DISABLED = 0;
    protected $mymodulemodelFactory;
    
     public function __construct(
        \Lens\Company\Model\ResourceModel\Companylens\CollectionFactory $mymodulemodelFactory
    )
    {
        $this->mymodulemodelFactory = $mymodulemodelFactory;
    }

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::ENABLED,
                'label' => __('Enabled')
            ],
            [
                'value' => self::DISABLED,
                'label' => __('Disabled')
            ],
        ];
        return $options;

    }
     public function getratingOptionArray()
    { 
        $collection = $this->mymodulemodelFactory->create();
        $count=count($collection);
        $count2=1;
       $array1 = array(
        "" => "Select",   
);  
       foreach ($collection as $data)
       {
           $x=$data->getLenscompanyId();
           $y=$data->getCompanyName();
          $array1[$x]=$y;
       }
       return $array1;

    }
}