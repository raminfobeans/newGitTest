<?php
//die("111");
?>
<?php

class Infobeans_Custombanner_Block_Adminhtml_Custombanner_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('custombanner_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('custombanner')->__('Banner Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('custombanner')->__('Banner Information'),
          'title'     => Mage::helper('custombanner')->__('Banner Information'),
          'content'   => $this->getLayout()->createBlock('infobeans_custombanner/adminhtml_custombanner_edit_tab_form')->toHtml(),
      ));
	  
	  
     
      return parent::_beforeToHtml();
  }
}
