<?php
//die("111");
?>
<?php 
class Infobeans_Custombanner_Block_Custombanner extends Mage_Core_Block_Template {

	public function getImageCollection() {
		$collection = Mage::getModel('custombanner/custombanner')->getCollection()->addFieldToFilter('status',1);		
		$banners = array();
		foreach ($collection as $banner) {			
				$banners[] = $banner;
		}
                // echo "<pre>";echo print_r($banner); die("================");
		return $banners;
	}
	
} 
