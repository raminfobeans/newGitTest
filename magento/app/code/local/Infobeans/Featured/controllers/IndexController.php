<?php

class Infobeans_Featured_IndexController extends Mage_Core_Controller_Front_Action {

    public function sayHelloAction() {
        echo 'Hello Ram...';
    }

    public function indexAction() {
        echo 'Hello developer...';
    }

    public function addAction() {
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
Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($_productCollection);       echo "<pre>";
        print_r($_productCollection->getData()[1]->getProductUrl());

        
        
        
        
        
        
        
    }
    public function testAction() {
        //echo $this->getLayout()->createBlock('infobeans_featured/product_featured')->getFeaturedProduct();
        $categoryIds = array(15);//category id

$collection = Mage::getModel('catalog/product')
                             ->getCollection()
                             ->joinField('category_id', 'catalog/category_product', 'category_id', 'product_id = entity_id', null, 'left')
                             ->addAttributeToSelect('*')
                             ->addAttributeToFilter('category_id', array('in' => $categoryIds));
echo "<pre>";
print_r($collection->getData()); die();
        
        
    }
}

?>
