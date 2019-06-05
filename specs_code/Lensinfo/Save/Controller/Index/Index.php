<?php
 
namespace Lensinfo\Save\Controller\Index;
 
use Magento\Framework\App\Action\Context;
 
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $lensinfosave;
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,\Lensinfo\Save\Model\ResourceModel\Lensinfosave\CollectionFactory $lensinfosave)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->lensinfosave = $lensinfosave;
        parent::__construct($context);
    }
 
    public function execute()

    {
         $collection = $this->lensinfosave->create()->addFieldToFilter('order_id',20)->getData();
         foreach($collection as $data)
         {
            print_r($data);
            exit;
         }
        /*$datas=$this->customerSession->getMyTestValue();
        foreach($datas as $data)
        {
            $lensinfosave = $this->lensinfosaveFactory->create();
            $lensinfosave->setOrderId(23);
            $lensinfosave->setName($data['firstName']);
            $lensinfosave->setCost($data['lastName']);
            $lensinfosave->save();

        }*/
        echo "done";
        exit;
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}