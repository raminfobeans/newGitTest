<?php



class Infobeans_Custombanner_Block_Adminhtml_Custombanner_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
//        echo "dddd";
        parent::__construct();
        $this->setId('custombannerGrid');
        $this->setDefaultSort('banner_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('custombanner/custombanner')->getCollection();
              $this->setCollection($collection);
        
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        
        $this->addExportType('*/*/exportCsv', Mage::helper('custombanner')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('custombanner')->__('XML'));
                
        $this->addColumn('banner_id', array(
            'header' => 'ID',
            'align' => 'right',
            'width' => '50px',
            'index' => 'banner_id',
        ));
        
	  $this->addColumn('image',array(
		  'header'    => Mage::helper('custombanner')->__('Banner Image'),
		  'align'     =>'center',
          'index'     => 'image',
		  'filter'    => false,
		  'sortable'  => false,
		  'width'	  =>'150',
          'renderer'  => 'infobeans_custombanner/adminhtml_renderer_image'	  
	  )); 
        
        
        
        $this->addColumn('title', array(
            'header' => Mage::helper('custombanner')->__('Banner Title'),
            'align' => 'left',
            'index' => 'title',
        ));

        $this->addColumn('sort_order', array(
            'header' => Mage::helper('custombanner')->__('Sort Order'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'sort_order',
        ));

        
      $this->addColumn('status', array(
          'header'    => Mage::helper('custombanner')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('custombanner')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('custombanner')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		



        return parent::_prepareColumns();
    }
    
    
        protected function _prepareMassaction()
    {
        $this->setMassactionIdField('banner_id');
        $this->getMassactionBlock()->setFormFieldName('custombanner');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('custombanner')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('custombanner')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('custombanner/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('custombanner')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('custombanner')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

    

}
