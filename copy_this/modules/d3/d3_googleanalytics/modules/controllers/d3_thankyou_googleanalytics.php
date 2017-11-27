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

    public $aD3GAWeekendDays = array(
        6,  // Samstag
        7,  // Sonntag
    );

    /**
     * Format Tag-Monat (jeweils mit führenden Nullen)
     * @var array
     */
    public $aD3GAfixFeastDays = array(
        '01-01',    // Neujahr
        '01-05',    // Tag der Arbeit
        '03-10',    // Tag der deutschen Einheit
        '25-12',    // 1. Weihnachtsfeiertag
        '26-12',    // 2. Weihnachtsfeiertag
    );

    protected $_blD3GADateChanged = false;

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
        \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModCfgId)->d3getLog()->log(
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
        startProfile(__METHOD__);
        $iTimeStamp = $this->_d3GAgetEstimatedDate('iEstShippingTimeValue', time());
        stopProfile(__METHOD__);

        return $iTimeStamp;
    }

    /**
     * @return string
     */
    public function d3GAgetEstimatedDeliveryDate()
    {
        startProfile(__METHOD__);
        $iShippingDate = $this->d3GAgetEstimatedShippingDate();
        $iTimeStamp = $this->_d3GAgetEstimatedDate('iEstDeliveryTimeValue', $iShippingDate);
        stopProfile(__METHOD__);

        return $iTimeStamp;
    }

    /**
     * @param string $sModCfgVarName
     * @param int $iTimestamp
     *
     * @return int
     */
    protected function _d3GAgetEstimatedDate($sModCfgVarName, $iTimestamp)
    {
        // change shipping time for not on stock articles
        if ($sModCfgVarName == 'iEstShippingTimeValue' && $this->hasOutOfStockArticles()) {
            $sModCfgVarName = 'iEstShippingTimeValueOutOfStock';
        }

        $iTimeValue = \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModCfgId)->getValue($sModCfgVarName);

        for ($i = 0; $i < $iTimeValue; $i++) {
            $iTimestamp += 86400;

            // check, if transportation day is a working day, else transportation has a break
            do {
                $this->_blD3GADateChanged = false;
                $iTimestamp = $this->_d3GAskipIdlePeriod($iTimestamp);
            } while ($this->_blD3GADateChanged === true);
        }

        return $iTimestamp;
    }

    /**
     * @param $iTimestamp
     *
     * @return int
     */
    protected function _d3GAskipIdlePeriod($iTimestamp)
    {
        startProfile(__METHOD__);
        $iWeekday = date('N', $iTimestamp);

        if (in_array($iWeekday, $this->aD3GAWeekendDays)) {
            $iOffset = 8 - $iWeekday;
            $iTimestamp += $iOffset * 86400;
            $this->_blD3GADateChanged = true;
        }

        stopProfile(__METHOD__);

        return $this->_d3GAskipFeastDays($iTimestamp);
    }

    /**
     * @param $iTimestamp
     *
     * @return int
     */
    protected function _d3GAskipFeastDays($iTimestamp)
    {
        startProfile(__METHOD__);

        while (in_array(date('d-m', $iTimestamp), $this->aD3GAfixFeastDays)) {
            $iTimestamp += 86400;
            $this->_blD3GADateChanged = true;
        }

        stopProfile(__METHOD__);

        return $iTimestamp;
    }

    /**
     * @return string
     */
    public function d3GAhasBackorderPreorder()
    {
        return $this->hasOutOfStockArticles() ? 'Y' : 'N';
    }

    /**
     * @param oxorderarticle $oOrderArticle
     *
     * @return bool
     */
    protected function _d3GAhasArticleBackorderPreorder(oxorderarticle $oOrderArticle)
    {
        /** @var oxarticle $oArticle */
        $oArticle = $oOrderArticle->getArticle();

        if ($oArticle->getFieldData('oxstockflag') != 4         // Fremdlager
            && $oOrderArticle->getFieldData('oxamount') > $oOrderArticle->getFieldData('oxstock')
        ) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function d3GAhasDigitalGoods()
    {
        /** @var oxorderarticle $oOrderArticle */
        foreach ($this->getOrder()->getOrderArticles() as $oOrderArticle) {
            if ($this->_d3GAhasArticleDigitalGoods($oOrderArticle)) {
                return 'Y';
            }
        };

        return 'N';
    }

    /**
     * @param oxorderarticle $oOrderArticle
     *
     * @return bool
     */
    protected function _d3GAhasArticleDigitalGoods(oxorderarticle $oOrderArticle)
    {
        /** @var oxarticle $oArticle */
        $oArticle = $oOrderArticle->getArticle();
        $oArticleFileList = $oArticle->getArticleFiles();

        if ($oArticle->getFieldData('oxisdownloadable')
            && $oArticleFileList->count()
        ) {
            if ($this->_d3GAhasArticlePurchasedDownload($oArticleFileList)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param oxList $oArticleFileList
     *
     * @return bool
     */
    protected function _d3GAhasArticlePurchasedDownload(oxList $oArticleFileList)
    {
        /** @var oxfile $oArticleFile */
        foreach ($oArticleFileList->getArray() as $oArticleFile) {
            if ($oArticleFile->getFieldData('oxpurchasedonly')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param oxorderarticle $oOrderArticle
     *
     * @return string
     */
    public function d3GAgetProductId($oOrderArticle)
    {
        switch (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModCfgId)->getValue('sD3GATSShoppingArtId')) {
            case 'oxartnum':
                return $oOrderArticle->getFieldData('oxartnum');
            case 'oxid':
                return $oOrderArticle->getFieldData('oxartid');
        };

        return $oOrderArticle->getFieldData(\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModCfgId)->getValue('sD3GATSShoppingArtId'));
    }

    /**
     * @return bool
     */
    public function hasOutOfStockArticles()
    {
        if (oxRegistry::getConfig()->getConfigParam('blUseStock')) {
            foreach ($this->getOrder()->getOrderArticles() as $oOrderArticle) {
                if ($this->_d3GAhasArticleBackorderPreorder($oOrderArticle)) {
                    return true;
                }
            }
        }

        return false;
    }
}
