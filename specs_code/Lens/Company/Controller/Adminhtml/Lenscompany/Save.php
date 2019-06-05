<?php

namespace Lens\Company\Controller\Adminhtml\Lenscompany;

class Save extends \Lens\Company\Controller\Adminhtml\Companylens
{
    
    protected $uploadModel;

    
    protected $imageModel;

    protected $jsHelper;

    
    public function __construct(
         \Lens\Company\Model\Upload $uploadModel,
        \Lens\Company\Model\Source\Image $imageModel,
        \Magento\Backend\Helper\Js $jsHelper,
        \Lens\Company\Model\CompanylensFactory $companylensFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->uploadModel    = $uploadModel;
        $this->imageModel     = $imageModel;
        $this->jsHelper       = $jsHelper;
        parent::__construct($companylensFactory, $registry, $context);
    }

    public function execute()
    {       
        $data = $this->getRequest()->getPost('company');
         $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $lenscompany = $this->initLens();
            $lenscompany->setData($data);

           
            $imageFile = $this->uploadModel->uploadFileAndGetName('lens_image_one', $this->imageModel->getBaseDir(), $data);
         
           $lenscompany->setLensImage_one($imageFile);
           
            try {
                $lenscompany->save();
                $this->messageManager->addSuccess(__('The Lenscompany has been saved.'));
                if ($this->getRequest()->getParam('back')) {
                 return $resultRedirect->setPath('*/*/edit', ['lenscompany_id' => $lenscompany->getId(), '_current' => true]);
                   
                }
               return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Lenscompany.'));
            }
            $this->_getSession()->setLensCompanyLenscompanyData($data);
           return $resultRedirect->setPath('*/*/edit', ['lenscompany_id' => $this->getRequest()->getParam('lenscompany_id')]);
        }
       return $resultRedirect->setPath('*/*/');
    }
}