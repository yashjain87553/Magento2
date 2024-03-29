<?php
namespace Lens\Info\Block\Adminhtml\Lensinfo\Edit;

/**
 * @method Tabs setTitle(\string $title)
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * constructor
     *
     * @return void
   */
  protected function _construct()
    {
        parent::_construct();
        $this->setId('lensinfo_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Lens Information'));
    }
}