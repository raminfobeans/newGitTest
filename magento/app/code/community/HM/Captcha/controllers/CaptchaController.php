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
class HM_Captcha_CaptchaController extends Mage_Core_Controller_Front_Action
{
    /**
     * Refreshes captcha and returns JSON encoded URL to image (AJAX action)
     * Example: {'imgSrc': 'http://example.com/media/captcha/67842gh187612ngf8s.png'}
     *
     * @return null
     */
    public function refreshAction()
    {
        $formId = $this->getRequest()->getPost('formId', false);
        if ($formId) {
            $captchaModel = Mage::helper('captcha')->getCaptcha($formId);
            $this->getLayout()->createBlock('hm_captcha/captcha_zend')->setFormId($formId)->setIsAjax(true)->toHtml();
            $this->getResponse()->setBody(json_encode(array('imgSrc' => $captchaModel->getImgSrc())));
        }
        $this->setFlag('', self::FLAG_NO_POST_DISPATCH, true);
    }
}
