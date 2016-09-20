<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Infobeans_Custombanner_Model_Observer {
    const TWO=2;
    

    public function registerVisit(Varien_Event_Observer $observer) {

        $product = $observer->getProduct();
        $category = $observer->getCategory();
        Mage::log('Registered=========================================================');
        Mage::log($product->debug());
        Mage::log($category->debug());
    }

    public function checkCartQty($observer) {
        Mage::getSingleton('checkout/session')->addNotice('Product add event fired');
    }
    
    public function changeCustomerGroup($observer) {
        
        $customer = Mage::getSingleton('customer/session')->getCustomer();
          Mage::getSingleton('core/session')->setMySessionVariable($customer->getGroupId()); 

        if ($customer->getGroupId() != self::TWO) {
            $customer->setGroupId(self::TWO);
            $customer->save();
            Mage::getSingleton('customer/session')->addNotice($customer->getName() . "  HAS CHANGED TO WHOLESALE ");
        } else {
            Mage::getSingleton('customer/session')->addNotice($customer->getName() . "  AlREADY A WHOLESALE ");
        }
    }

    
    public function revertCustomerGroup($observer) {
        $value = Mage::getSingleton('core/session')->getMySessionVariable();
        Mage::getSingleton('customer/session')->addNotice("  LOGOUT AND REVERTED TO GENERAL  ");
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        $customer->setGroupId(1);
        $customer->save();
    }

}
