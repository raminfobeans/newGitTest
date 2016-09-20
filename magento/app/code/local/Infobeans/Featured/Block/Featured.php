<?php
class Infobeans_Featured_Block_Featured extends Mage_Catalog_Block_Product_Abstract
{

public function getProduct () {
    $totalPerPage = ($this->show_total) ? $this->show_total : 6;
$visibility = array(
    Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH,
    Mage_Catalog_Model_Product_Visibility::VISIBILITY_IN_CATALOG
);
$storeId = Mage::app()->getStore()->getId();
$_productCollection = Mage::getResourceModel('reports/product_collection')
        ->addAttributeToSelect('*')
        ->setStoreId($storeId)
        ->addStoreFilter($storeId)
        ->addAttributeToFilter('visibility', $visibility)
        ->addAttributeToFilter('featured', true)
        ->setOrder('created_at', 'desc')
        ->addAttributeToSelect('status')
        ->setPageSize($totalPerPage);

Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($_productCollection);
Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($_productCollection);
return $_productCollection;

}


public function getLatest()
{
      $todayDate  = Mage::app()->getLocale()->date()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);
        $collection = Mage::getModel('catalog/product')
                ->getCollection()
                ->addAttributeToSelect('*')
                ->addAttributeToFilter('news_from_date', array('date' => true, 'to' => $todayDate))
               ->addAttributeToFilter('news_to_date', array('or'=> array(
            0 => array('date' => true, 'from' => $todayDate),
            1 => array('is' => new Zend_Db_Expr('null')))
         ), 'left')
         ->addAttributeToSort('news_from_date', 'desc');
    return  $collection;

}



}
























?>
