<?php

/**
 *    This module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This module is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    For further informations, see <http://www.gnu.org/licenses/>.
 *
 * @link          http://www.oxidmodule.com
 * @link          http://www.shopmodule.com
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 */
class d3_oxorder_googleanalytics extends d3_oxorder_googleanalytics_parent
{
    /**
     * @return oxUserPayment
     */
    public function getPayment()
    {
        if (!$this->_oPayment) {
            $this->_oPayment = oxNew('oxpayment');
            $this->_oPayment->Load($this->getFieldData('oxpaymenttype'));
        }

        return parent::getPayment();
    }

    /**
     * @return array
     */
    public function d3getVoucherSerieList()
    {
        $sSelect           =
            "SELECT oxvoucherserieid FROM oxvouchers WHERE oxorderid =  " . oxDb::getDb()->quote($this->getId());
        $aVoucherIds       = (array) oxDb::getDb()->getArray($sSelect);
        $aVoucherSerieList = array();

        foreach ($aVoucherIds as $aVoucherId) {
            $oVoucherSerie = oxNew('oxvoucherserie');
            $oVoucherSerie->Load($aVoucherId[0]);
            $aVoucherSerieList[] = $oVoucherSerie;
        }

        return $aVoucherSerieList;
    }

    /**
     * @param array $aArticleList
     *
     * @return null|void
     */
    protected function _setOrderArticles($aArticleList)
    {
        parent::_setOrderArticles($aArticleList);

        /** @var d3_oxbasketitem_googleanalytics $oBasketItem */
        foreach ($aArticleList as $oBasketItem) {
            /** @var oxorderarticle $oOrderArticle */
            foreach ($this->_oArticles as $sArticleId => $oOrderArticle) {
                $blArtIdMatch     = $oOrderArticle->getFieldData('oxartid') == $oBasketItem->getProductId();
                $blAmountMatch    = $oOrderArticle->getFieldData('oxamount') == $oBasketItem->getAmount();
                $blPersParamMatch = (null == $oBasketItem->getPersParams() || $oOrderArticle->getFieldData('oxpersparam') == $oBasketItem->getPersParams());
                if ($blArtIdMatch && $blAmountMatch && $blPersParamMatch) {
                    $this->_oArticles->offsetGet($sArticleId)->assign(array('d3_galocator' => $oBasketItem->d3GetLocatorTitle()));
                }
            }
        }
    }

    /**
     * @return float
     */
    public function d3GetOrderPayVat()
    {
        return round(
            ($this->getFieldData('oxpaycost') / (1 + $this->getFieldData('oxpayvat') / 100))
            * ($this->getFieldData('oxpayvat')),
            $this->getOrderCurrency()->decimal
        ) / 100;
    }

    /**
     * @return float
     */
    public function d3GetOrderDelVat()
    {
        return round(
            ($this->getFieldData('oxdelcost') / (1 + $this->getFieldData('oxdelvat') / 100))
            * ($this->getFieldData('oxdelvat')),
            $this->getOrderCurrency()->decimal
        ) / 100;
    }

    /**
     * @return float
     */
    public function d3GetOrderWrapVat()
    {
        return round(
            ($this->getFieldData('oxwrapcost') / (1 + $this->getFieldData('oxwrapvat') / 100))
            * ($this->getFieldData('oxwrapvat')),
            $this->getOrderCurrency()->decimal
        ) / 100;
    }

    /**
     * @return float
     */
    public function d3GetOrderCardVat()
    {
        return round(
            ($this->getFieldData('oxcardcost') / (1 + $this->getFieldData('oxcardvat') / 100))
            * ($this->getFieldData('oxcardvat')),
            $this->getOrderCurrency()->decimal
        ) / 100;
    }

    /**
     * @return float
     */
    public function d3GetTaxTotal()
    {
        $dVat =  $this->getFieldData('oxartvatprice1')
            + $this->getFieldData('oxartvatprice2')
            + $this->d3GetOrderPayVat()
            + $this->d3GetOrderDelVat()
            + $this->d3GetOrderWrapVat()
            + $this->d3GetOrderCardVat();

        return sprintf('%.2f', $dVat);
    }
}
