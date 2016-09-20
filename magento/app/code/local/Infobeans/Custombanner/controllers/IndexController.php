<?php

class Infobeans_Custombanner_IndexController extends Mage_Core_Controller_Front_Action {

    public function helloAction() {
        
        $this->loadLayout();
        echo "\n\n\nEvery time the page is reloaded, the event is dispatched.";
        $parameters = array(
        'product' => Mage::getModel('catalog/product')->load(1),
        'category' => Mage::getModel('catalog/category')->load(1),
        );
        Mage::dispatchEvent('infobeans_register_visit',$parameters);
        $this->renderLayout();
    }

    public function indexAction() {
        echo 'Hello developer1111...';
        $this->loadLayout();
        $this->renderLayout();
    }

    public function addAction() {
        echo $this;
    }

    public function testModelAction() {

        echo "<pre>";
        $params = $this->getRequest()->getParams();

        $ram = Mage::getModel('custombanner/ram')->getCollection();
        echo "<pre>";
        print_r($ram->getData());

//        $collection_of_products = Mage::getModel('catalog/product')->getCollection();
//        var_dump($collection_of_products->getFirstItem()->getData());
//        echo 'End Collection';
        //print_r(get_Class($ram));
        if (!$ram) {
            throw new UnexpectedValueException('Expected Model not available.');
        }
        echo $ram->load($params['id']);
        $data = $ram->getData();
        var_dump($data);
    }

    public function testAction() {

        echo "<pre>";


        $ram = Mage::getModel('catalog/product')->getCollection();
        echo "<pre>";
       var_dump($ram->getSelect());
       // print_r($ram->getData());
    }

}
