<?php
namespace Lens\Company\Block\Adminhtml\Lenscompany\Edit\Tab;

class Lenscompany extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    
    protected $typeOptions;

   
    protected $statusOptions;

    public function __construct(
        \Lens\Company\Model\Source\Status $statusOptions,
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

        $lenscompany = $this->_coreRegistry->registry('lens_company');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('lens_');
        $form->setFieldNameSuffix('company');
        $fieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => __('Lens Companyrmation'),
                'class'  => 'fieldset-wide'
            ]
        );
        $fieldset->addType('image', 'Lens\Company\Block\Adminhtml\Lenscompany\Helper\Image');
        if ($lenscompany->getId()) {
            $fieldset->addField(
                'lenscompany_id',
                'hidden',
                ['name' => 'lenscompany_id']
            );
        }
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
     
        $lenscompanyData = $this->_session->getData('lens_company_lenscompany_data', true);
        if ($lenscompanyData) {
            $lenscompany->addData($lenscompanyData);
        } /*else {
            if (!$label->getId()) {
                $label->addData($label->getDefaultValues());
            }
        }*/
    
        $form->addValues($lenscompany->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }

    
    public function getTabLabel()
    {
        return __('Lenscompany');
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