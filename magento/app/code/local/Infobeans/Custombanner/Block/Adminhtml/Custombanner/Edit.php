<?php
//die("111");
?>
<?php
class Infobeans_Custombanner_Block_Adminhtml_Custombanner_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'infobeans_custombanner';
        $this->_controller = 'adminhtml_custombanner';
        
        $this->_updateButton('save', 'label', Mage::helper('custombanner')->__('Save Banner'));
        $this->_updateButton('delete', 'label', Mage::helper('custombanner')->__('Delete Banner'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
           'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('custombanner_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'custombanner_content');
               } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'custombanner_content');
                }
           }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('custombanner_data') && Mage::registry('custombanner_data')->getId() ) {
            return Mage::helper('custombanner')->__("Edit banner '%s'", $this->htmlEscape(Mage::registry('custombanner_data')->getTitle()));
        } else {
            return Mage::helper('custombanner')->__('Add Banner');
        }
    }
}