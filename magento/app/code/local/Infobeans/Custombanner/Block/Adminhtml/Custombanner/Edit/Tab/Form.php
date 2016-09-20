<?php
//die("111");
?>
<?php

class Infobeans_Custombanner_Block_Adminhtml_Custombanner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('custombanner_form', array('legend'=>Mage::helper('custombanner')->__('Banner information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('custombanner')->__('Image Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));	

      $fieldset->addField('filename', 'image', array(
          'label'     => Mage::helper('custombanner')->__('Image'),
          'required'  => false,
          'name'      => 'filename',
	  ));	
	  
	  
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('custombanner')->__('Image Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('custombanner')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('custombanner')->__('Disabled'),
              ),
          ),
      ));
			
	  $fieldset->addField('weblink', 'text', array(
          'label'     => Mage::helper('custombanner')->__('Image Url'),
		  'class'     => 'validate-url',
          'required'  => false,
		  'after_element_html' => "<small>Image URL</small>",
          'name'      => 'weblink',
      ));
	  
	  $fieldset->addField('linktarget', 'select', array(
				  'label'     => Mage::helper('custombanner')->__('Link Target'),
				  'name'      => 'linktarget',
				  'after_element_html' => "<small>New Tab: To open in new tab, Same Tab: To open in same tab</small>",
				  'values'    => array(
					  array(
						  'value'     => '_self',
						  'label'     => Mage::helper('custombanner')->__('Same Tab'),
					  ),
				  
					  array(
						  'value'     => '_blank',
						  'label'     => Mage::helper('custombanner')->__('New Tab'),
					  )
				  ),
			));
			
		$fieldset->addField('sort_order', 'text', array(
			'name'		=> 'sort_order',
			'label'		=> $this->__('Sort Order'),
			'title'		=> $this->__('Sort Order'),
			'class'		=> 'validate-digits'
		));
			
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('custombanner')->__('Content'),
          'title'     => Mage::helper('custombanner')->__('Content'),
          'style'     => 'width:280px; height:100px;',
          'wysiwyg'   => false,
          'required'  => false,
      ));
			
     
      if ( Mage::getSingleton('adminhtml/session')->getImageSliderData() )
      {
          $data = Mage::getSingleton('adminhtml/session')->getImageSliderData();
          Mage::getSingleton('adminhtml/session')->setImageSliderData(null);
      } elseif ( Mage::registry('custombanner_data') ) {
          $data = Mage::registry('custombanner_data')->getData();
      }
	  if (isset($data['stores'])) {
		$data['store_id'] = explode(',',$data['stores']);
	  }
	  $form->setValues($data);
	  
      return parent::_prepareForm();
  }
}
