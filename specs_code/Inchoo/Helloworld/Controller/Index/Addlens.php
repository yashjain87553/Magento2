<?php
 
namespace Inchoo\Helloworld\Controller\Index;
 
use Magento\Framework\App\Action\Context;
 
class Addlens extends \Magento\Framework\App\Action\Action
{

    protected $_resultPageFactory;
    protected $resultJsonFactory;
    protected $customerSession;
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Customer\Model\Session $customerSession,\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->customerSession = $customerSession;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        /*$this->customerSession->setCount();
        $this->customerSession->setMyTestValue();
        return;*/
        $lens_info_id = $this->getRequest()->getParam('lens_info_id');
        $lens_info_cost = $this->getRequest()->getParam('lens_info_cost');
        $lens_info_name = $this->getRequest()->getParam('lens_info_name');

        $count;
        if($this->customerSession->getCount())
        {
         $count=$this->customerSession->getCount();
         $count++;
         $this->customerSession->setCount($count);
        }
        else{
            $this->customerSession->setCount(1);
            $count=$this->customerSession->getCount();
        }
        if($count==1)
        {
            $this->customerSession->setMyTestValue(array(array()));
            $datas=array(array('firstName'=> $lens_info_name, 'lastName'=> $lens_info_cost ));
        }
        else{
            $datas=$this->customerSession->getMyTestValue();
            $data=array('firstName'=> $lens_info_name, 'lastName'=> $lens_info_cost );
            array_push($datas,$data);
        }
        $this->customerSession->setMyTestValue($datas);
        $cost=0;
       foreach($datas as $data)
       {
         $cost+=$data['lastName'];
         
       }
       $this->customerSession->setLenscost($cost);
       $mata['data']="done";
        $result = $this->resultJsonFactory->create();
        return $result->setData($mata);
    }
}
