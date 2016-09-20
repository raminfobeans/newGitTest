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
class HM_Testimonial_TestimonialController extends Mage_Core_Controller_Front_Action{
		public function IndexAction() { 
				  $this->loadLayout();   
				  $this->getLayout()->getBlock("head")->setTitle($this->__("Testimonial"));
						$breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
				  $breadcrumbs->addCrumb("home", array(
							"label" => $this->__("Home Page"),
							"title" => $this->__("Home Page"),
							"link"  => Mage::getBaseUrl()
					   ));

				  $breadcrumbs->addCrumb("testimonial", array(
							"label" => $this->__("Testimonial"),
							"title" => $this->__("Testimonial")
					   ));

				  $this->renderLayout(); 
				  
		}
		public function SubmitAction() {
			$this->loadLayout();   
				  $this->getLayout()->getBlock("head")->setTitle($this->__("Testimonial"));
						$breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
					$breadcrumbs->addCrumb("home", array(
							"label" => $this->__("Home Page"),
							"title" => $this->__("Home Page"),
							"link"  => Mage::getBaseUrl()
					   ));

				  $breadcrumbs->addCrumb("testimonial", array(
							"label" => $this->__("Testimonial"),
							"title" => $this->__("Testimonial")
					   ));	
				$this->renderLayout(); 
		}
		
		public function postAction()
		{
			$post_data=$this->getRequest()->getPost();
				if ($post_data) {
					try {
				 //save image
					try{
				if((bool)$post_data['image']['delete']==1) {
					$post_data['image']='';
				}
				else {
				
					unset($post_data['image']);
				
					if (isset($_FILES)){
				
						if ($_FILES['image']['name']) {
				
							if($this->getRequest()->getParam("id")){
								$model = Mage::getModel("testimonial/testimonial")->load($this->getRequest()->getParam("id"));
								if($model->getData('image')){
										$io = new Varien_Io_File();
										$io->rm(Mage::getBaseDir('media').DS.implode(DS,explode('/',$model->getData('image'))));	
								}
							}
										$path = Mage::getBaseDir('media') . DS . 'testimonial' . DS .'testimonial'.DS;
										$uploader = new Varien_File_Uploader('image');
										$uploader->setAllowedExtensions(array('jpg','png','gif'));
										$uploader->setAllowRenameFiles(false);
										$uploader->setFilesDispersion(false);
										$destFile = $path.$_FILES['image']['name'];
										$filename = $uploader->getNewFileName($destFile);
										$uploader->save($path, $filename);
				
										$post_data['image']='testimonial/testimonial/'.$filename;
						}
					}
				}
        } catch (Exception $e) {
					Mage::getSingleton('customer/session')->addError($e->getMessage());
					$this->_redirect('testimonial/testimonial/submit');
					return;
        }
//save image


						$model = Mage::getModel("testimonial/testimonial")
						->addData($post_data)
						->setCreatedTime(Mage::getSingleton('core/date')->gmtDate())
						->setUpdateTime(Mage::getSingleton('core/date')->gmtDate())
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("customer/session")->addSuccess(Mage::helper("adminhtml")->__("Testimonial was successfully saved"));
						Mage::getSingleton("customer/session")->setTestimonialData(false);
						$this->_redirect("testimonial/testimonial");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("customer/session")->addError($e->getMessage());
						$this->_redirect('testimonial/testimonial/submit');
					return;
					}

				}
				$this->_redirect("*/*/");
		}
}