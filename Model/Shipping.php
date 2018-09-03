<?php
class Lindybop_Parcelshop_Model_Shipping extends Mage_Shipping_Model_Shipping
{
    public function collectCarrierRates($carrierCode, $request)
    {
        if (!$this->_checkCarrierAvailability($carrierCode, $request)) {
            return $this;
        }
        return parent::collectCarrierRates($carrierCode, $request);
    }
 
    protected function _checkCarrierAvailability($carrierCode, $request = null)
    {
        return true;
    }
}