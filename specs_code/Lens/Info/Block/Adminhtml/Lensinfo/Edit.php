<?php
namespace Lens\Info\Block\Adminhtml\Lensinfo;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
   
    protected $coreRegistry;

    /**
     * constructor
     * 
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Block\Widget\Context $context,
        array $data = []
    )
    {
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

   
    protected function _construct()
    {
        $this->_objectId = 'lensinfo_id';
        $this->_blockGroup = 'Lens_Info';
        $this->_controller = 'adminhtml_lensinfo';
        parent::_construct();
        $this->buttonList->update('save', 'label', __('Save Lensinfo'));
        $this->buttonList->add(
            'save-and-continue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ]
                    ]
                ]
            ],
            -100
        );
        $this->buttonList->update('delete', 'label', __('Delete Lensinfo'));
    }
    
    public function getHeaderText()
    {
    	
      
        $lensinfo = $this->coreRegistry->registry('lens_info');
        if ($lensinfo->getId()) {
            return __("Edit Lensinfo '%1'", $this->escapeHtml($lensinfo->getCompanyName()));
        }
        return __('New Lensinfo');
    }
}