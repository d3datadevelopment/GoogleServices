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
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 */

class d3_oxcmp_utils_googleanalytics extends d3_oxcmp_utils_googleanalytics_parent
{
    private $_sModId = 'd3_googleanalytics';

    public $aD3GAPageTypes = array(
        'start'             => 'home',
        'search'            => 'searchresults',
        'alist'             => 'category',
        'manufacturerlist'  => 'category',
        'vendorlist'        => 'category',
        'details'           => 'product',
        'basket'            => 'cart',
        'order'             => 'purchase',
    );

    public $sD3GARemarketingSKUField = 'oxartnum';
    public $blD3GARemarketingUseBrutto = true;

    /**
     * @return null
     */
    public function render()
    {
        $ret = parent::render();

        $oSet = d3_cfg_mod::get($this->_d3getModId());

        /** @var $oParentView oxView */
        $oParentView = $this->getParent();
        $oParentView->addTplParam('blD3GoogleAnalyticsActive', $oSet->isActive());
        $oParentView->addTplParam('oD3GASettings', $oSet);
        $oParentView->addTplParam('sD3GATTpl', $this->d3getGATTpl());
        $oParentView->addTplParam('sD3GACreateParameter', $this->d3getCreateParameters());
        $oParentView->addTplParam('sD3GASendPageViewParameter', $this->d3getSendPageViewParameters());
        $oParentView->addTplParam('sD3CurrentShopUrl', oxRegistry::getConfig()->getActiveShop()->getFieldData('oxurl'));

        if ($oSet->getValue('blD3GASetRemarketing')) {
            $aInfos = $this->d3GetGAProdInfos();
            $oParentView->addTplParam('sD3GARemarketingProdId', $this->d3GetGAProdIdList($aInfos['aArtIdList']));
            $oParentView->addTplParam(
                'sD3GARemarketingPrice',
                $aInfos['dPrice'] > 0 ? number_format($aInfos['dPrice'], 2, '.', ''): ''
            );
            $oParentView->addTplParam('sD3GARemarketingPageType', $this->d3GetGAPageType());
        }


        return $ret;
    }

    /**
     * @return string
     */
    private function _d3getModId()
    {
        return $this->_sModId;
    }

    /**
     * @return string
     */
    public function d3getGATTpl()
    {
        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'async') {
            return 'd3_googleanalytics.tpl';
        }

        return 'd3ga_universal.tpl';
    }

    /**
     * @return string
     */
    public function d3getCreateParameters()
    {
        $aParameter = array();

        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName')) {
            $aParameter[] = "'cookieDomain': '".d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName')."'";
            $aParameter[] = "'legacyCookieDomain': '".
                d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName')."'";
        }
        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath')) {
            $aParameter[] = "'cookiePath': '".d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath')."'";
        }
        if (d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
            $aParameter[] = "'allowLinker': true";
        }
        if (d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate')) {
            $aParameter[] = "'siteSpeedSampleRate': ".
                d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate');
        }
        if (d3_cfg_mod::get($this->_sModId)->getValue('iD3GASampleRate')) {
            $aParameter[] = "'sampleRate': ".d3_cfg_mod::get($this->_sModId)->getValue('iD3GASampleRate');
        }

        if (count($aParameter)) {
            return ", {".implode(',', $aParameter)."}";
        }

        return '';
    }

    /**
     * @return string
     */
    public function d3getSendPageViewParameters()
    {
        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'async') {
            return $this->_d3getAsyncSendpageViewParameters();
        }

        return $this->_d3getUniversalSendPageViewParameters();
    }

    /**
     * @return string
     */
    protected function _d3getAsyncSendpageViewParameters()
    {
        $aParameter = array();

        /** @var oxUBase $oCurrentView */
        $oCurrentView = oxRegistry::getConfig()->getActiveView();
        $oCurrentView->getIsOrderStep();

        if ($oCurrentView->getIsOrderStep() ||
            strtolower($oCurrentView->getClassName()) == 'thankyou' ||
            $this->_d3HasNoPageParameter()
        ) {
            $aParameter[] = "'/{$oCurrentView->getClassName()}.html'";
        }

        if (count($aParameter)) {
            return ", " . implode(',', $aParameter) . "";
        }

        return '';
    }

    /**
     * @return string
     */
    protected function _d3getUniversalSendPageViewParameters()
    {
        $aParameter = array();

        /** @var oxUBase $oCurrentView */
        $oCurrentView = oxRegistry::getConfig()->getActiveView();
        $oCurrentView->getIsOrderStep();

        if ($oCurrentView->getIsOrderStep() || strtolower($oCurrentView->getClassName()) == 'thankyou') {
            $aParameter[] = "'page':  '/{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'title': 'Checkout: ".ucfirst($oCurrentView->getClassName())."'";
        } elseif ($this->_d3HasNoPageParameter()) {
            $aParameter[] = "'page':  '/{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'title': '".ucfirst($oCurrentView->getClassName())."'";
        }

        if (d3_cfg_mod::get($this->_sModId)->hasDebugMode()) {
            $aParameter[] = "
                'hitCallback': function() {
                    alert('analytics.js done sending data');
                }
            ";
        }

        if (count($aParameter)) {
            return ", {" . implode(',', $aParameter) . "}";
        }

        return '';
    }

    /**
     * @return bool
     */
    protected function _d3HasNoPageParameter()
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function d3GetGAPageType()
    {
        $oCurrentView = oxRegistry::getConfig()->getActiveView();

        if (is_array($this->aD3GAPageTypes) &&
            isset($this->aD3GAPageTypes[strtolower($oCurrentView->getClassName())])
        ) {
            return $this->aD3GAPageTypes[strtolower($oCurrentView->getClassName())];
        };

        return 'Siteview';
    }

    /**
     * @return string
     */
    public function d3GetGAProdInfos()
    {
        startProfile(__METHOD__);

        $oCurrentView = oxRegistry::getConfig()->getActiveView();

        $aArticleIds = array();
        $dPrice = 0;

        $sMethodName = '_d3GetGA'.$oCurrentView->getClassName()."ProdList";

        if (method_exists($this, $sMethodName)) {
            stopProfile(__METHOD__);
            return call_user_func(array($this, $sMethodName), $oCurrentView);
        }

        stopProfile(__METHOD__);

        return array('aArtIdList' => $aArticleIds, 'dPrice' => $dPrice);
    }

    /**
     * @param array $aArticleIds
     *
     * @return string
     */
    public function d3GetGAProdIdList($aArticleIds)
    {
        if (count($aArticleIds)) {
            return "['".implode("', '", $aArticleIds)."']";
        } else {
            return "''";
        }
    }

    /**
     * @param details $oView
     *
     * @return array
     */
    protected function _d3GetGAdetailsProdList($oView)
    {
        $aArticleList = array();
        $aArticleList[] = $oView->getProduct();
        return $this->_d3GetGAProdList($aArticleList);
    }

    /**
     * @param alist $oView
     *
     * @return array
     */
    protected function _d3GetGAalistProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_d3GetGAProdList($oArticleList);
    }

    /**
     * @param search $oView
     *
     * @return array
     */
    protected function _d3GetGAsearchProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_d3GetGAProdList($oArticleList);
    }

    /**
     * @param vendorlist $oView
     *
     * @return array
     */
    protected function _d3GetGAvendorlistProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_d3GetGAProdList($oArticleList);
    }

    /**
     * @param manufacturerlist $oView
     *
     * @return array
     */
    protected function _d3GetGAmanufacturerlistProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_d3GetGAProdList($oArticleList);
    }

    /**
     * @param basket $oView
     *
     * @return array
     */
    protected function _d3GetGAbasketProdList($oView)
    {
        $aArticleList = $oView->getBasketArticles();
        return $this->_d3GetGAProdList($aArticleList);
    }

    /**
     * @param order $oView
     *
     * @return array
     */
    protected function _d3GetGAorderProdList($oView)
    {
        $aArticleList = $oView->getBasketArticles();
        return $this->_d3GetGAProdList($aArticleList);
    }

    /**
     * @param compare $oView
     *
     * @return array
     */
    protected function _d3GetGAcompareProdList($oView)
    {
        $aArticleList = $oView->getCompArtList();
        return $this->_d3GetGAProdList($aArticleList);
    }

    /**
     * @param account_noticelist $oView
     *
     * @return array
     */
    protected function _d3GetGAaccount_noticelistProdList($oView)
    {
        $aArticleList = $oView->getNoticeProductList();
        return $this->_d3GetGAProdList($aArticleList);
    }

    /**
     * @param account_wishlist $oView
     *
     * @return array
     */
    protected function _d3GetGAaccount_wishlistProdList($oView)
    {
        $aArticleList = $oView->getWishProductList();
        return $this->_d3GetGAProdList($aArticleList);
    }

    /**
     * @param $aArticleList
     *
     * @return array
     */
    protected function _d3GetGAProdList($aArticleList)
    {
        $aArticleIds = array();
        $dPrice = 0;

        /** @var oxarticle $oArticle */
        if (isset($aArticleList)) {
            foreach ($aArticleList as $oArticle) {
                $aArticleIds[] = $oArticle->getFieldData($this->sD3GARemarketingSKUField);
                if ($this->blD3GARemarketingUseBrutto) {
                    $dPrice += $oArticle->getPrice()->getBruttoPrice();
                } else {
                    $dPrice += $oArticle->getPrice()->getNettoPrice();
                }
            }
        }

        return array('aArtIdList' => $aArticleIds, 'dPrice' => $dPrice);
    }
}
