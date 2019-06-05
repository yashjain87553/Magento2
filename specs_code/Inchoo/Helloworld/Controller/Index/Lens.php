<?php
 
namespace Inchoo\Helloworld\Controller\Index;
 
use Magento\Framework\App\Action\Context;
 
class Lens extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $resultJsonFactory;
    protected $lens_info;
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,\Lens\Info\Model\ResourceModel\Infolens\CollectionFactory $lens_info)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->lens_info = $lens_info;
        parent::__construct($context);
    }
 
    public function execute()
    {
      $lens_company_id = $this->getRequest()->getParam('lens_company_id');
      if($lens_company_id!=0){
      $collection = $this->lens_info->create()->addFieldToFilter('lenscompany_id',$lens_company_id)->getData();
    }
    else{
       $collection = $this->lens_info->create()->getData();
    }
    $x='<div class="owl-carousel owl-theme">';
    $count=1;
    foreach($collection as $data)
    {
       
       $x.='<div class="item'.$count.'">
    <p class="item'.$count.'">'.$data["company_name"].'</p>
    <p class="item'.$count.'">'.$data["Features"].'</p>
    <p class="item'.$count.'">'.$data["message"].'</p>
    <input type="hidden" value="50" class="cost_item'.$count.'">
    <input type="hidden" value="'.$data["lensinfo_id"].'" class="id_item'.$count.'">
    <input type="hidden" value="'.$data["company_name"].'" class="name_item'.$count.'">
    <button name="add_to_cart" type="submit" class="btn btn-primary add_to_cart" value="item'.$count.'">Add to cart</button>
    </div>';
     $count++;
    }
      $x.='</div>';
        $mata['lens_data']=$x;
        $result = $this->resultJsonFactory->create();
        return $result->setData($mata);
        
    }
  }

