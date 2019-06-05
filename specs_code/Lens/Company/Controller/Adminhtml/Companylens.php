<?php
namespace Lens\Company\Controller\Adminhtml;

abstract class Companylens extends \Magento\Backend\App\Action
{
   
    protected $companylensFactory;

    
    protected $coreRegistry;


    public function __construct(
        \Lens\Company\Model\CompanylensFactory $companylensFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->companylensFactory         = $companylensFactory;
        $this->coreRegistry          = $coreRegistry;
        parent::__construct($context);
    }

   
    protected function initLens()
    {
        $companylensId  = (int) $this->getRequest()->getParam('lenscompany_id');
        
        $companylens    = $this->companylensFactory->create();
        if ($companylensId) {
            $companylens->load($companylensId);
        }
        $this->coreRegistry->register('lens_company', $companylens);
        return $companylens;
    }
}