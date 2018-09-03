<?php
class Lindybop_Parcelshop_Model_Carrier_Parcelshop extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'parcelshop';
    
    public function collectRates (Mage_Shipping_Model_Rate_Request $request)
    {
        $result = Mage::getModel('shipping/rate_result');
        
        //Check if parcelshop method is enabled
        if ($this->getConfigData('parcelshop_enabled'))
        {
            $method = Mage::getModel('shipping/rate_result_method');
            $method->setCarrier($this->_code);
            $method->setCarrierTitle($this->getConfigData('title'));
            
            $method->setMethod('parcelshop');
            $method->setMethodTitle($this->getConfigData('parcelshop_title'));
            
            $method->setCost($this->getConfigData('parcelshop_price'));
            $method->setPrice($this->getConfigData('parcelshop_price'));
            
            $result->append($method);
        }        
        
        return $result;
    }
    
    public function isActive()
    {
        $active = $this->getConfigData('active');
        return $active==1 || $active=='true';
    }
    
    public function isTrackingAvailable() 
    {
        return true;
    }
    
    public function getAllowedMethods()
    {
        return array('parcelshop'=>$this->getConfigData('name'));
    }
    
}