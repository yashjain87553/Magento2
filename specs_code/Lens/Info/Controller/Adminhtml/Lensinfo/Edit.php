<?php

namespace Lens\Info\Controller\Adminhtml\Lensinfo;

class Edit extends \Lens\Info\Controller\Adminhtml\Infolens{

    /**
     * Page factory
     * 
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Result JSON factory
     * 
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Lens\Info\Model\InfolensFactory $infolensFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($infolensFactory, $registry, $context);
    }

    /**
     * is action allowed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Lens_Info::Lensinfo');
    }

    public function execute()
    {    
         $id = $this->getRequest()->getParam('lensinfo_id');
        
         $lensinfo = $this->initLens();
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('LensInfo'));
        if ($id) {
            $lensinfo->load($id);
            if (!$lensinfo->getId()) {
                 $this->messageManager->addError(__('This lensinfo no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath(
                    'Lens_Info/*/edit',
                    [
                        'lensinfo_id' => $lensinfo->getId(),
                        '_current' => true
                    ]
                );
                return $resultRedirect;
              }
        }
        $title = $lensinfo->getId() ? $lensinfo->getCompanyName() : __('New Lens');
        echo $title."<br>";
        $resultPage->getConfig()->getTitle()->prepend($title);
        $data = $this->_session->getData('lens_info_lensinfo_data', true);
        
        if (!empty($data)) {
            $lensinfo->setData($data);

        }
        return $resultPage;
        
    }
    }
