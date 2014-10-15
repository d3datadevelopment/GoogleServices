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
 * @link      http://www.oxidmodule.com
 * @link      http://www.shopmodule.com
 * @link      http://www.aikme.de
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch) & aikme GmbH
 */

class d3_thankyou_googleanalytics extends d3_thankyou_googleanalytics_parent
{
    private $_sModCfgId = 'd3_googleanalytics';

    /**
     * @return int
     */
    public function isNewCustomer()
    {
        $iIsNewCustomer = oxRegistry::getSession()->getVariable("iD3GANewCustomer");
        oxRegistry::getSession()->deleteVariable("iD3GANewCustomer");

        return $iIsNewCustomer;
    }

    /**
     * @param $sGACode
     */
    public function logCode($sGACode)
    {
        d3_cfg_mod::get($this->_sModCfgId)->d3getLog()->log(
            d3log::NOTICE,
            __CLASS__,
            __FUNCTION__,
            __LINE__,
            'GA TrackingCode',
            $sGACode
        );
    }

    /**
     * @return oxcountry
     */
    public function d3GAGetUserCountry()
    {
        $sCountryId = $this->getOrder()->getFieldData('oxbillcountryid');
        /** @var oxcountry $oCountry */
        $oCountry = oxNew('oxcountry');
        $oCountry->load($sCountryId);

        return $oCountry;
    }

    /**
     * @return string
     */
    public function d3GAgetEstimatedShippingDate()
    {
        return $this->d3GAgetEstimatedDate('iEstShippingTimeValue');
    }

    /**
     * @return string
     */
    public function d3GAgetEstimatedDeliveryDate()
    {
        return $this->d3GAgetEstimatedDate('iEstDeliveryTimeValue');
    }

    /**
     * @param $sModCfgVarName
     *
     * @return string
     */
    public function d3GAgetEstimatedDate($sModCfgVarName)
    {
        $iTimeValue = d3_cfg_mod::get($this->_sModCfgId)->getValue($sModCfgVarName);

        return date(
            'Y-m-d',
            strtotime('+ '.$iTimeValue.' day')
        );
    }

    /**
     * @return string
     */
    public function d3GAhasBackorderPreorder()
    {
        if (oxRegistry::getConfig()->getConfigParam('blUseStock')) {
            /** @var oxorderarticle $oOrderArticle */
            foreach ($this->getOrder()->getOrderArticles() as $oOrderArticle) {
                /** @var oxarticle $oArticle */
                $oArticle = $oOrderArticle->getArticle();

                if ($oArticle->getFieldData('oxstockflag') != 4         // Fremdlager
                    && $oOrderArticle->getFieldData('oxamount') > $oOrderArticle->getFieldData('oxstock')
                ) {
                    return 'Y';
                }
            };
        }

        return 'N';
    }

    /**
     * @return string
     */
    public function d3GAhasDigitalGoods()
    {
        if (oxRegistry::getConfig()->getConfigParam('blUseStock')) {
            /** @var oxorderarticle $oOrderArticle */
            foreach ($this->getOrder()->getOrderArticles() as $oOrderArticle) {
                /** @var oxarticle $oArticle */
                $oArticle = $oOrderArticle->getArticle();
                $aArticleFiles = $oArticle->getArticleFiles();

                if ($oArticle->getFieldData('oxisdownloadable')
                    && count($aArticleFiles)
                ) {
                    /** @var oxfile $oArticleFile */
                    foreach ($aArticleFiles as $oArticleFile) {
                        if ($oArticleFile->getFieldData('oxpurchasedonly')) {
                            return 'Y';
                        }
                    }
                }
            };
        }

        return 'N';
    }

    /**
     * @param oxorderarticle $oOrderArticle
     *
     * @return string
     */
    public function d3GAgetProductId($oOrderArticle)
    {
        switch (d3_cfg_mod::get($this->_sModCfgId)->getValue('sD3GATSShoppingArtId')) {
            case 'oxartnum':
                return $oOrderArticle->getFieldData('oxartnum');
            case 'oxid':
                return $oOrderArticle->getFieldData('oxartid');
        };

        return $oOrderArticle->getFieldData(d3_cfg_mod::get($this->_sModCfgId)->getValue('sD3GATSShoppingArtId'));
    }
}
