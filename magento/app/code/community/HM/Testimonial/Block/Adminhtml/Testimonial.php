<?php
/**
 * Magento Testimonial
 *
 * Testimonial Plus for Magento
 * Author: Hire Magento
 * Website: www.hiremagento.com 
 * Suport Email: hiremagento@gmail.com
 *
**/
class HM_Testimonial_Block_Adminhtml_Testimonial extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_testimonial";
	$this->_blockGroup = "testimonial";
	$this->_headerText = Mage::helper("testimonial")->__("Testimonial Manager");
	$this->_addButtonLabel = Mage::helper("testimonial")->__("Add New Item");
	parent::__construct();
	
	}

}