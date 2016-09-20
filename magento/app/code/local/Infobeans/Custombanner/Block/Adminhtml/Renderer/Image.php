
<?php

class Infobeans_Custombanner_Block_Adminhtml_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function render(Varien_Object $row)
    {		
		$model  = Mage::getModel('custombanner/custombanner')->load($row->getId());
		$file = $model->getFilename();		
				
		$url = Mage::getBaseUrl('media') . 'mbimages/thumbs/' . $file;
		$out = "<img src=". $url ." width='80px'/>";
		return $out;
	}
}