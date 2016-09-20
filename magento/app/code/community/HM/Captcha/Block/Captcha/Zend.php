<?php
/**
 * Magento
 *
 * Testimonial Plus for Magento
 * Author: Hire Magento
 * Website: www.hiremagento.com 
 * Suport Email: hiremagento@gmail.com
 *
**/
class HM_Captcha_Block_Captcha_Zend extends Mage_Captcha_Block_Captcha_Zend
{
    protected function _toHtml()
    {
        $this->getCaptchaModel()->generate();
 
        if (!$this->getTemplate()) {
            return '';
        }
        $html = $this->renderView();
 
        return $html;
    }
 
    public function getRefreshUrl()
    {
        return Mage::getUrl(
            Mage::app()->getStore()->isAdmin() ? 'adminhtml/refresh/refresh' : 'hm_captcha/captcha/refresh',
            array('_secure' => Mage::app()->getStore()->isCurrentlySecure())
        );
    }
}
