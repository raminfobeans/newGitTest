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
class HM_Testimonial_Block_Adminhtml_Testimonial_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "testimonial_id";
				$this->_blockGroup = "testimonial";
				$this->_controller = "adminhtml_testimonial";
				$this->_updateButton("save", "label", Mage::helper("testimonial")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("testimonial")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("testimonial")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("testimonial_data") && Mage::registry("testimonial_data")->getId() ){

				    return Mage::helper("testimonial")->__("Edit Testimonial '%s'", $this->htmlEscape(Mage::registry("testimonial_data")->getName()));

				} 
				else{

				     return Mage::helper("testimonial")->__("Add Testimonial");

				}
		}
}