<?php
namespace Lens\Info\Controller\Adminhtml\Lensinfo;

class Delete extends \Lens\Info\Controller\Adminhtml\Infolens
{
    /**
     * execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('lensinfo_id');
        if ($id) {
            $name = "";
            try {
                
                $infolens    = $this->infolensFactory->create();
                $infolens->load($id);
                $name = $infolens->getCompanyName();
                $infolens->delete();
                $this->messageManager->addSuccess(__('The Lensinfo has been deleted.'));
                $this->_eventManager->dispatch(
                    'adminhtml_lens_info_lensinfo_on_delete',
                    ['name' => $name, 'status' => 'success']
                );
                $resultRedirect->setPath('*/*/');
                return $resultRedirect;
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_lens_info_lensinfo_on_delete',
                    ['name' => $name, 'status' => 'fail']
                );
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                $resultRedirect->setPath('lens_info/*/edit', ['lensinfo_id' => $id]);
                return $resultRedirect;
            }
        }
        // display error message
        $this->messageManager->addError(__('lensinfo to delete was not found.'));
        // go to grid
        $resultRedirect->setPath('lens_info/*/');
        return $resultRedirect;
    }
}