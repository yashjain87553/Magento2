<?php
namespace Lens\Company\Controller\Adminhtml\Lenscompany;

class Delete extends \Lens\Company\Controller\Adminhtml\Companylens
{
    /**
     * execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('lenscompany_id');
        if ($id) {
            $name = "";
            try {
                
                $companylens    = $this->companylensFactory->create();
                $companylens->load($id);
                $name = $companylens->getCompanyName();
                $companylens->delete();
                $this->messageManager->addSuccess(__('The Lenscompany has been deleted.'));
                $this->_eventManager->dispatch(
                    'adminhtml_lens_company_lenscompany_on_delete',
                    ['name' => $name, 'status' => 'success']
                );
                $resultRedirect->setPath('*/*/');
                return $resultRedirect;
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_lens_company_lenscompany_on_delete',
                    ['name' => $name, 'status' => 'fail']
                );
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                $resultRedirect->setPath('lens_company/*/edit', ['lenscompany_id' => $id]);
                return $resultRedirect;
            }
        }
        // display error message
        $this->messageManager->addError(__('lenscompany to delete was not found.'));
        // go to grid
        $resultRedirect->setPath('lens_company/*/');
        return $resultRedirect;
    }
}