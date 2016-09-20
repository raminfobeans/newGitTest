    <?php

class Infobeans_Custombanner_Model_Mysql4_Custombanner extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('custombanner/custombanner','banner_id');
    }   
}