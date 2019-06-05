<?php

namespace Lens\Company\Controller\Adminhtml\Lenscompany;

class Edit extends \Lens\Company\Controller\Adminhtml\Companylens{

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
        \Lens\Company\Model\CompanylensFactory $companylensFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($companylensFactory, $registry, $context);
    }

    /**
     * is action allowed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Lens_Company::Lenscompany');
    }

    public function execute()
    {    
         $id = $this->getRequest()->getParam('lenscompany_id');
        
         $lenscompany = $this->initLens();
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('LensCompany'));
        if ($id) {
            $lenscompany->load($id);
            if (!$lenscompany->getId()) {
                 $this->messageManager->addError(__('This lenscompany no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath(
                    'Lens_Company/*/edit',
                    [
                        'lenscompany_id' => $lenscompany->getId(),
                        '_current' => true
                    ]
                );
                return $resultRedirect;
              }
        }
        $title = $lenscompany->getId() ? $lenscompany->getCompanyName() : __('New Lens');
        echo $title."<br>";
        $resultPage->getConfig()->getTitle()->prepend($title);
        $data = $this->_session->getData('lens_company_lenscompany_data', true);
        
        if (!empty($data)) {
            $lenscompany->setData($data);

        }
        return $resultPage;
        
    }
    }
