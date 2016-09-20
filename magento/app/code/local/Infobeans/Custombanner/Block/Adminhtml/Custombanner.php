<?php
class Infobeans_Custombanner_Block_Adminhtml_Custombanner extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_custombanner';
    $this->_blockGroup = 'infobeans_custombanner';
    $this->_headerText = Mage::helper('custombanner')->__('Manage Banner');
    $this->_addButtonLabel = Mage::helper('custombanner')->__('Add New Banner');
    parent::__construct();
  }
}