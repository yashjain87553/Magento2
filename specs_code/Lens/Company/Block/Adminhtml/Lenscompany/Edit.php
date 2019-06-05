<?php
namespace Lens\Company\Block\Adminhtml\Lenscompany;

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
        $this->_objectId = 'lenscompany_id';
        $this->_blockGroup = 'Lens_Company';
        $this->_controller = 'adminhtml_lenscompany';
        parent::_construct();
        $this->buttonList->update('save', 'label', __('Save Lenscompany'));
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
        $this->buttonList->update('delete', 'label', __('Delete Lenscompany'));
    }
    
    public function getHeaderText()
    {
    	
      
        $lenscompany = $this->coreRegistry->registry('lens_company');
        if ($lenscompany->getId()) {
            return __("Edit Lenscompany '%1'", $this->escapeHtml($lenscompany->getCompanyName()));
        }
        return __('New Lenscompany');
    }
}