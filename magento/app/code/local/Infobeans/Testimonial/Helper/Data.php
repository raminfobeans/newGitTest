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
class Testimonial_Helper_Data extends Mage_Core_Helper_Abstract
{
	const XML_PATH_CONFIG_GENERAL_ENABLE_FRONTEND 	= 'testimonial/testimonial_general/frontend_submission';
	const XML_PATH_CONFIG_GENERAL_ENABLE_GUEST		= 'testimonial/testimonial_general/guest_submission';
	const XML_PATH_CONFIG_GENERAL_AUTO_APPROVE		= 'testimonial/testimonial_general/approve_testimonial';
	const XML_PATH_CONFIG_GENERAL_SHOW_NAME			= 'testimonial/testimonial_general/display_name';
	const XML_PATH_CONFIG_GENERAL_SHOW_URL			= 'testimonial/testimonial_general/display_wedsite';
	const XML_PATH_CONFIG_GENERAL_SHOW_Video		= 'testimonial/testimonial_general/display_video';
	
	public function getConfigEnableFrontend() {
		return Mage::getStoreConfig(self::XML_PATH_CONFIG_GENERAL_ENABLE_FRONTEND);
	}
	
	public function getConfigEnableGuest() {
		return Mage::getStoreConfig(self::XML_PATH_CONFIG_GENERAL_ENABLE_GUEST);
	}

	public function getConfigAutoApprove() {
		return Mage::getStoreConfig(self::XML_PATH_CONFIG_GENERAL_AUTO_APPROVE);
	}

	public function getConfigShowName() {
		return Mage::getStoreConfig(self::XML_PATH_CONFIG_GENERAL_SHOW_NAME);
	}

	public function getConfigShowUrl() {
		return Mage::getStoreConfig(self::XML_PATH_CONFIG_GENERAL_SHOW_URL);
	}
	
	public function getConfigShowVideo() {
		return Mage::getStoreConfig(self::XML_PATH_CONFIG_GENERAL_SHOW_Video);
	}
}
	 