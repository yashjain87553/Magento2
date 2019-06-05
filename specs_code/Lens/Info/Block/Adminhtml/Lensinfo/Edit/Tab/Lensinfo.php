<?php
namespace Lens\Info\Block\Adminhtml\Lensinfo\Edit\Tab;

class Lensinfo extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    
    protected $typeOptions;

   
    protected $statusOptions;

    public function __construct(
        \Lens\Info\Model\Source\Status $statusOptions,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        array $data = []
    )
    {
        $this->statusOptions = $statusOptions;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {   

        $lensinfo = $this->_coreRegistry->registry('lens_info');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('lens_');
        $form->setFieldNameSuffix('info');
        $fieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => __('Lens Information'),
                'class'  => 'fieldset-wide'
            ]
        );
        $fieldset->addType('image', 'Lens\Info\Block\Adminhtml\Lensinfo\Helper\Image');
        if ($lensinfo->getId()) {
            $fieldset->addField(
                'lensinfo_id',
                'hidden',
                ['name' => 'lensinfo_id']
            );
        }
         $fieldset->addField(
            'lenscompany_id',
           'select',
            [
                'name'  => 'lenscompany_id',
                'label' => __('Lens Company'),
                'title' => __(' Lens Company'),
                'values' => $this->statusOptions->getratingOptionArray(),
            ]
        );
        $fieldset->addField(
            'company_name',
            'text',
            [
                'name'  => 'company_name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
            ]
        );
        $fieldset->addField(
            'lens_image_one',
            'image',
            [
                'name'  => 'lens_image_one',
                'label' => __(' Lens Image One'),
                'title' => __(' Lens Image One'),
            ]
        );

        $fieldset->addField(
            'Features',
            'text',
            [
                'name'  => 'Features',
                'label' => __('Features'),
                'title' => __('Features'),
                'required' => true,
            ]
        );


        $fieldset->addField(
            'message',
            'text',
            [
                'name'  => 'message',
                'label' => __('Message'),
                'title' => __('Message'),
                'required' => true,
            ]
        );
       /* $fieldset->addField(
        'testimonial_date',
        'date',
        [
            'name' => 'testimonial_date',
            'label' => __('Testmonial Date'),
            'title' => __('Date'),
            'required' => true,
            'date_format' => 'yyyy-MM-dd',
            
        ]
);     */
        $fieldset->addField(
            'display_order',
            'text',
            [
                'name'  => 'display_order',
                'label' => __(' Display Order'),
                'title' => __('Display Order'),
                'required' => true,
            ]
        );
         /*$fieldset->addField(
            'rating',
            'select',
            [
               'name'  => 'rating',
               'label' => __('Select Rating'),
               'title' => __('Select Rating'),
               'required' => true,
               'options' => $this->statusOptions->getratingOptionArray(),
           ]
        );*/
       
        $fieldset->addField(
            'status',
            'select',
            [
                'name'  => 'status',
                'label' => __('Status'),
                'title' => __('Status'),
                'values' => $this->statusOptions->toOptionArray(),
            ]
        );
     
        $lensinfoData = $this->_session->getData('lens_info_lensinfo_data', true);
        if ($lensinfoData) {
            $lensinfo->addData($lensinfoData);
        } /*else {
            if (!$label->getId()) {
                $label->addData($label->getDefaultValues());
            }
        }*/
    
        $form->addValues($lensinfo->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }

    
    public function getTabLabel()
    {
        return __('Lensinfo');
    }

  
    public function getTabTitle()
    {
        return $this->getTabLabel();
    }

  
    public function canShowTab()
    {
        return true;
    }

   
    public function isHidden()
    {
        return false;
    }
}