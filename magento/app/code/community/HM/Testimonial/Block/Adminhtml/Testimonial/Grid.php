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
class HM_Testimonial_Block_Adminhtml_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("testimonialGrid");
				$this->setDefaultSort("testimonial_id");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("testimonial/testimonial")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("testimonial_id", array(
				"header" => Mage::helper("testimonial")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "testimonial_id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("testimonial")->__("Client Name"),
				"index" => "name",
				));
				$this->addColumn("email", array(
				"header" => Mage::helper("testimonial")->__("Client Email"),
				"index" => "email",
				));
				$this->addColumn('status', array(
				'header' => Mage::helper('testimonial')->__('Status'),
				'index' => 'status',
				'type' => 'options',
				'options'=>HM_Testimonial_Block_Adminhtml_Testimonial_Grid::getOptionArray8(),				
				));
				$this->addColumn("created_time", array(
				"header" => Mage::helper("testimonial")->__("Created Time"),
				"index" => "created_time",
				));
				/*$this->addColumn("company", array(
				"header" => Mage::helper("testimonial")->__("Client Company"),
				"index" => "company",
				));
				$this->addColumn("website", array(
				"header" => Mage::helper("testimonial")->__("Website"),
				"index" => "website",
				));
				$this->addColumn("video", array(
				"header" => Mage::helper("testimonial")->__("Video"),
				"index" => "video",
				));*/
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('testimonial_id');
			$this->getMassactionBlock()->setFormFieldName('testimonial_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_testimonial', array(
					 'label'=> Mage::helper('testimonial')->__('Remove Testimonial'),
					 'url'  => $this->getUrl('*/adminhtml_testimonial/massRemove'),
					 'confirm' => Mage::helper('testimonial')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray6()
		{
            $data_array=array(); 
			$data_array[0]='No';
			$data_array[1]='Yes';
            return($data_array);
		}
		static public function getValueArray6()
		{
            $data_array=array();
			foreach(HM_Testimonial_Block_Adminhtml_Testimonial_Grid::getOptionArray6() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray8()
		{
            $data_array=array(); 
			$data_array[0]='Disabled';			
			$data_array[1]='Enabled';
            return($data_array);
		}
		static public function getValueArray8()
		{
            $data_array=array();
			foreach(HM_Testimonial_Block_Adminhtml_Testimonial_Grid::getOptionArray8() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}