<?php
namespace Lens\Info\Controller\Adminhtml;

abstract class Infolens extends \Magento\Backend\App\Action
{
   
    protected $infolensFactory;

    
    protected $coreRegistry;


    public function __construct(
        \Lens\Info\Model\InfolensFactory $infolensFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->infolensFactory         = $infolensFactory;
        $this->coreRegistry          = $coreRegistry;
        parent::__construct($context);
    }

   
    protected function initLens()
    {
        $infolensId  = (int) $this->getRequest()->getParam('lensinfo_id');
        
        $infolens    = $this->infolensFactory->create();
        if ($infolensId) {
            $infolens->load($infolensId);
        }
        $this->coreRegistry->register('lens_info', $infolens);
        return $infolens;
    }
}