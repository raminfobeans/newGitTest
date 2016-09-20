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
class HM_Testimonial_Block_Adminhtml_Testimonial_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(

     array('tab_id' => 'form_section')

);

						$wysiwygConfig["files_browser_window_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index');
						
						$wysiwygConfig["directives_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive');
						
						$wysiwygConfig["directives_url_quoted"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive');
						
						$wysiwygConfig["widget_window_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/widget/index');
						
						$wysiwygConfig["files_browser_window_width"] = (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_width');
						
						$wysiwygConfig["files_browser_window_height"] = (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_height');
						
						$plugins = $wysiwygConfig->getData("plugins");
						
						$plugins[0]["options"]["url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/system_variable/wysiwygPlugin');
						
						$plugins[0]["options"]["onclick"]["subject"] = "MagentovariablePlugin.loadChooser('".Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/system_variable/wysiwygPlugin')."', '{{html_id}}');";
						
						$plugins = $wysiwygConfig->setData("plugins",$plugins);
				$fieldset = $form->addFieldset("testimonial_form", array("legend"=>Mage::helper("testimonial")->__("Item information")));
				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("testimonial")->__("Client Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("email", "text", array(
						"label" => Mage::helper("testimonial")->__("Client Email"),
						"name" => "email",
						));
					
						$fieldset->addField("company", "text", array(
						"label" => Mage::helper("testimonial")->__("Client Company"),
						"name" => "company",
						));
					
						$fieldset->addField("website", "text", array(
						"label" => Mage::helper("testimonial")->__("Website"),
						"name" => "website",
						));
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('testimonial')->__('Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("video", "text", array(
						"label" => Mage::helper("testimonial")->__("Video URL"),
						"name" => "video",
						'note' => '(*Youtube URL)',
						));
									
						 $fieldset->addField('sidebar', 'select', array(
						'label'     => Mage::helper('testimonial')->__('Display on Sidebar'),
						'values'   => HM_Testimonial_Block_Adminhtml_Testimonial_Grid::getValueArray6(),
						'name' => 'sidebar',
						));
						$fieldset->addField("testimonial", "editor", array(
						"label" => Mage::helper("testimonial")->__("Testimonial"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimonial",
						'config'    => $wysiwygConfig,
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('testimonial')->__('Status'),
						'values'   => HM_Testimonial_Block_Adminhtml_Testimonial_Grid::getValueArray8(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getTestimonialData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getTestimonialData());
					Mage::getSingleton("adminhtml/session")->setTestimonialData(null);
				} 
				elseif(Mage::registry("testimonial_data")) {
				    $form->setValues(Mage::registry("testimonial_data")->getData());
				}
				return parent::_prepareForm();
		}
}
