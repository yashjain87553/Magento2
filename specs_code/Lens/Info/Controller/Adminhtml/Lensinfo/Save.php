<?php

namespace Lens\Info\Controller\Adminhtml\Lensinfo;

class Save extends \Lens\Info\Controller\Adminhtml\Infolens
{
    
    protected $uploadModel;

    
    protected $imageModel;

    protected $jsHelper;

    
    public function __construct(
         \Lens\Info\Model\Upload $uploadModel,
        \Lens\Info\Model\Source\Image $imageModel,
        \Magento\Backend\Helper\Js $jsHelper,
        \Lens\Info\Model\InfolensFactory $infolensFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->uploadModel    = $uploadModel;
        $this->imageModel     = $imageModel;
        $this->jsHelper       = $jsHelper;
        parent::__construct($infolensFactory, $registry, $context);
    }

    public function execute()
    {       
        $data = $this->getRequest()->getPost('info');
         $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $lensinfo = $this->initLens();
            $lensinfo->setData($data);

           
            $imageFile = $this->uploadModel->uploadFileAndGetName('lens_image_one', $this->imageModel->getBaseDir(), $data);
         
           $lensinfo->setLensImage_one($imageFile);
           
            try {
                $lensinfo->save();
                $this->messageManager->addSuccess(__('The Lensinfo has been saved.'));
                if ($this->getRequest()->getParam('back')) {
                 return $resultRedirect->setPath('*/*/edit', ['lensinfo_id' => $lensinfo->getId(), '_current' => true]);
                   
                }
               return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Lensinfo.'));
            }
            $this->_getSession()->setLensInfoLensinfoData($data);
           return $resultRedirect->setPath('*/*/edit', ['lensinfo_id' => $this->getRequest()->getParam('lensinfo_id')]);
        }
       return $resultRedirect->setPath('*/*/');
    }
}