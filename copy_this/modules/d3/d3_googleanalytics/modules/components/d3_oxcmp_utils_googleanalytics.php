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
        'oxwarticledetails' => 'product',
        'basket'            => 'cart',
        'user'              => 'cart',
        'payment'           => 'cart',
        'order'             => 'cart',
        'thankyou'          => 'purchase',
    );

    /**
     * @return null
     */
    public function render()
    {
        $ret = parent::render();

        $oSet = \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_d3getModId());

        if ($oSet->isActive()) {
            /** @var $oParentView oxView */
            $oParentView = $this->getParent();
            $oParentView->addTplParam('blD3GoogleAnalyticsActive', $oSet->isActive());
            $oParentView->addTplParam('oD3GASettings', $oSet);
            $oParentView->addTplParam('sD3GATTpl', $this->d3getGATTpl());
            $oParentView->addTplParam('sD3GACreateParameter', $this->d3getCreateParameters());
            $oParentView->addTplParam('sAFEGetMoreUrls', $this->afGetMoreUrls());
            $oParentView->addTplParam('sD3GASendPageViewParameter', $this->d3getSendPageViewParameters());
            $oParentView->addTplParam('sD3CurrentShopUrl', $this->d3GetCreateCurrentShopUrl());
            $oParentView->addTplParam('blD3GAIsMobile', $this->d3isMobile());
            $oParentView->addTplParam('iD3GASendNoBounceEventTime', $this->d3GetSendNoBounceEventTime());

            if ($oSet->getValue('sD3GATSActive')) {
                $oParentView->addTplParam('sD3CurrentGTSLang', $this->d3GetGTSLang());
            }

            if ($oSet->getValue('sD3GATSActive') && $oSet->getValue('sD3GATSShoppingActive')) {
                $aInfos = $this->d3GATSGetProdInfos();
                $oParentView->addTplParam('sD3GATSProdId', $this->d3GATSGetProdIdList($aInfos['aArtIdList']));
            }

            if ($oSet->getValue('blD3GASetRemarketing') || $oSet->getValue('blD3GAUseAnalyticsRemarketing')) {
                $aInfos = $this->d3GetGAProdInfos();
                $oParentView->addTplParam('sD3GARemarketingProdId', $this->d3GetGAProdIdList($aInfos['aArtIdList']));
                $oParentView->addTplParam('sD3GARemarketingProdId2', $this->d3GetGAProdIdList($aInfos['aArtIdList'], false));
                $oParentView->addTplParam(
                    'sD3GARemarketingPrice',
                    $aInfos['dPrice'] > 0 ? number_format($aInfos['dPrice'], 2, '.', ''): ''
                );
                $oParentView->addTplParam('sD3GARemarketingPageType', $this->d3GetGAPageType());
            }
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
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'async') {
            return 'd3_googleanalytics.tpl';
        }

        return 'd3ga_universal.tpl';
    }

    /**
     * @return string
     */
    public function d3GetCreateCurrentShopUrl()
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
            return 'auto';
        }

        return $this->d3GetCurrentShopUrl();
    }

    /**
     * @return string
     */
    public function d3GetCurrentShopUrl()
    {
        return oxRegistry::getConfig()->getActiveShop()->getFieldData('oxurl');
    }

    /**
     * @return string
     */
    public function afGetMoreUrls()
    {
        if (false == \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
            return '';
        }

        $sSeparator = ',';

        return implode($sSeparator, $this->_d3GetNonBaseLanguageUrls());
    }

    /**
     * @return array
     */
    protected function _d3GetNonBaseLanguageUrls()
    {
        $myConfig = oxRegistry::getConfig();
        $aLanguageUrls = $myConfig->getConfigParam('aLanguageURLs');
        $aSslLanguageUrls = $myConfig->getConfigParam('aLanguageSSLURLs');

        $aUrls = array();
        if ($myConfig->getConfigParam('bl_perfLoadLanguages')) {
            $aLanguages = oxRegistry::getLang()->getLanguageArray(null, true, true);
            reset($aLanguages);
            foreach ($aLanguages as $oVal) {
                $this->_d3AddLanguageUrlsToList($aLanguageUrls, $oVal, $aSslLanguageUrls, $aUrls);
            }
        }

        $this->_d3UnsetCurrentUrl($aUrls);

        return $aUrls;
    }

    /**
     * @param $aLanguageUrls
     * @param $oVal
     * @param $aSslLanguageUrls
     * @param $aUrls
     *
     * @return array
     */
    protected function _d3AddLanguageUrlsToList($aLanguageUrls, $oVal, $aSslLanguageUrls, &$aUrls)
    {
        $blIsSsl = oxRegistry::getConfig()->isSsl();

        if ($this->_d3CheckLanguageUrlsToList($aLanguageUrls, $oVal, $blIsSsl)) {
            $sUrl    = $this->_d3GANormalizeUrl($aLanguageUrls[$oVal->id]);
            $aUrls[md5($sUrl)] = "'" . $sUrl . "'";
        }

        if ($this->_d3CheckLanguageUrlsToList($aSslLanguageUrls, $oVal, !$blIsSsl)) {
            $sSslUrl = $this->_d3GANormalizeUrl($aLanguageUrls[$oVal->id]);
            $aUrls[md5($sSslUrl)] = "'" . $sSslUrl . "'";
        }

        return $aUrls;
    }

    /**
     * @param $sUrl
     *
     * @return string
     */
    protected function _d3GANormalizeUrl($sUrl)
    {
        $sPattern = "^http(s?)://";
        /** @var \D3\ModCfg\Application\Model\d3str $oD3Str */
        $oD3Str = oxNew(\D3\ModCfg\Application\Model\d3str::class);

        return preg_replace('@'.$sPattern.'@', '', $oD3Str->untrailingslashit($sUrl));
    }

    /**
     * @param $aUrls
     */
    protected function _d3UnsetCurrentUrl(&$aUrls)
    {
        unset($aUrls[md5($this->_d3GANormalizeUrl(oxRegistry::getConfig()->getCurrentShopUrl()))]);
    }

    /**
     * @param $aLanguageUrls
     * @param $oVal
     * @param $blIsSsl
     *
     * @return bool
     */
    protected function _d3CheckLanguageUrlsToList($aLanguageUrls, $oVal, $blIsSsl)
    {
        return $blIsSsl || $aLanguageUrls[$oVal->id] != $aLanguageUrls[oxRegistry::getLang()->getBaseLanguage()];
    }

    /**
     * @return string
     */
    public function d3getCreateParameters()
    {
        $aParameter = array();

        $aParameter = $this->_d3getCreateDomainNameParameter($aParameter);
        $aParameter = $this->_d3getCreateCookiePathParameter($aParameter);
        $aParameter = $this->_d3getCreateDomainLinkerParameter($aParameter);
        $aParameter = $this->_d3getCreateSpeedSamplerateParameter($aParameter);
        $aParameter = $this->_d3getCreateSamplerateParameter($aParameter);

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
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'async') {
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

        $aParameter = $this->_d3getAsynchSendpageViewClassParameter($oCurrentView, $aParameter);

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

        $aParameter = $this->_d3getUniversalSendPageViewPageParameter($oCurrentView, $aParameter);
        $aParameter = $this->_d3getUniversalSendPageViewDebugParameter($aParameter);

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
     * Indicates the type of page that the tag is on. Valid values:
     *
     *  home - Used on the home page or landing page of your site.
     *  searchresults - Used on pages where the results of a user's search are displayed.
     *  category - Used on pages that list multiple items within a category, for example a page showing all shoes in a given style.
     *  product - Used on individual product pages.
     *  cart - Used on the cart/basket/checkout page.
     *  purchase - Used on the page shown once a user has purchased (and so converted), for example a "Thank You" or confirmation page.
     *  other - Used where the page does not fit into the other types of page, for example a "Contact Us" or "About Us" page.
     *
     * @link https://developers.google.com/adwords-remarketing-tag/parameters#retail-sites
     * @return string
     */
    public function d3GetGAPageType()
    {
        $oCurrentView = oxRegistry::getConfig()->getActiveView();

        $key = strtolower($oCurrentView->getClassName());
        if (array_key_exists($key, $this->aD3GAPageTypes)) {
            return $this->aD3GAPageTypes[$key];
        };

        return 'other';
    }

    /**
     * @return string
     */
    public function d3GetGTSLang()
    {
        $aHomeCountries = oxRegistry::getConfig()->getConfigParam('aHomeCountry');
        $aKeys          = array_keys($aHomeCountries);
        $sHomeCountryId = $aHomeCountries[current($aKeys)];
        /** @var oxcountry $oCountry */
        $oCountry = oxNew('oxcountry');
        $oCountry->load($sHomeCountryId);

        return strtolower(oxRegistry::getLang()->getLanguageAbbr()).'_'.
            strtoupper($oCountry->getFieldData('OXISOALPHA2'));
    }

    /**
     * @return array
     */
    public function d3GATSGetProdInfos()
    {
        startProfile(__METHOD__);

        $oCurrentView = oxRegistry::getConfig()->getActiveView();

        $aArticleIds = array();

        $sMethodName = 'get'.ucfirst($oCurrentView->getClassName())."ProdList";
        $oArticleLister = oxNew('d3_google_trustedstore_articlelister');

        if (method_exists($oArticleLister, $sMethodName)) {
            stopProfile(__METHOD__);
            return call_user_func(array($oArticleLister, $sMethodName), $oCurrentView);
        }

        stopProfile(__METHOD__);

        return array('aArtIdList' => $aArticleIds);
    }

    /**
     * @param array $aArticleIds
     *
     * @return string
     */
    public function d3GATSGetProdIdList($aArticleIds)
    {
        if (count($aArticleIds)) {
            $aKeys = array_keys($aArticleIds);

            return $aArticleIds[current($aKeys)];
        } else {
            return "not_set";
        }
    }

    /**
     * @return array
     */
    public function d3GetGAProdInfos()
    {
        startProfile(__METHOD__);

        $oCurrentView = oxRegistry::getConfig()->getActiveView();

        $aArticleIds = array();
        $dPrice = 0;

        $sMethodName = 'get'.ucfirst($oCurrentView->getClassName())."ProdList";
        $oArticleLister = oxNew('d3_google_remarketing_articlelister');

        if (method_exists($oArticleLister, $sMethodName)) {
            stopProfile(__METHOD__);
            $aRet = call_user_func(array($oArticleLister, $sMethodName), $oCurrentView);
            stopProfile(__METHOD__);
            return $aRet;
        }

        stopProfile(__METHOD__);

        return array('aArtIdList' => $aArticleIds, 'dPrice' => $dPrice);
    }

    /**
     * @param array $aArticleIds
     *
     * @return string
     */
    public function d3GetGAProdIdList($aArticleIds, $blFormatArray = true)
    {
        if (count($aArticleIds)) {
            return $blFormatArray ?
                "['".implode("', '", $aArticleIds)."']" :
                "'".implode(", ", $aArticleIds)."'";
        } else {
            return $blFormatArray ?
                "''" :
                false;
        }
    }

    /**
     * @param $aParameter
     *
     * @return array
     */
    protected function _d3getCreateDomainNameParameter($aParameter)
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName')) {
            $aParameter[] = "'cookieDomain': '" . \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName') . "'";
            $aParameter[] = "'legacyCookieDomain': '" .
                \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName') . "'";

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param $aParameter
     *
     * @return array
     */
    protected function _d3getCreateCookiePathParameter($aParameter)
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath')) {
            $aParameter[] = "'cookiePath': '" . \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath') . "'";

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param $aParameter
     *
     * @return array
     */
    protected function _d3getCreateDomainLinkerParameter($aParameter)
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
            $aParameter[] = "'allowLinker': true";

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param $aParameter
     *
     * @return array
     */
    protected function _d3getCreateSpeedSamplerateParameter($aParameter)
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate')) {
            $aParameter[] = "'siteSpeedSampleRate': " .
                \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate');

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param $aParameter
     *
     * @return array
     */
    protected function _d3getCreateSamplerateParameter($aParameter)
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('iD3GASampleRate')) {
            $aParameter[] = "'sampleRate': " . \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('iD3GASampleRate');

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param oxUBase $oCurrentView
     * @param array $aParameter
     *
     * @return array
     */
    protected function _d3getAsynchSendpageViewClassParameter($oCurrentView, $aParameter)
    {
        if ($oCurrentView->getIsOrderStep() ||
            strtolower($oCurrentView->getClassName()) == 'thankyou' ||
            $this->_d3HasNoPageParameter()
        ) {
            $aParameter[] = "'/{$oCurrentView->getClassName()}.html'";

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param oxUBase $oCurrentView
     * @param array $aParameter
     *
     * @return array
     */
    protected function _d3getUniversalSendPageViewPageParameter($oCurrentView, $aParameter)
    {
        if ($oCurrentView->getIsOrderStep() || strtolower($oCurrentView->getClassName()) == 'thankyou') {
            $aParameter[] = "'page':  '/{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'title': 'Checkout: " . ucfirst($oCurrentView->getClassName()) . "'";

            return $aParameter;
        } elseif ($this->_d3HasNoPageParameter()) {
            $aParameter[] = "'page':  '/{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'title': '" . ucfirst($oCurrentView->getClassName()) . "'";

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param $aParameter
     *
     * @return array
     */
    protected function _d3getUniversalSendPageViewDebugParameter($aParameter)
    {
        if (\D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->hasDebugMode()) {
            $aParameter[] = "
                'hitCallback': function() {
                    alert('analytics.js done sending data');
                }
            ";

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @return bool
     */
    public function d3isMobile()
    {
        if (class_exists('oeThemeSwitcherThemeManager')) {
            /** @var oeThemeSwitcherThemeManager $oThemeManager */
            $oThemeManager = oxNew('oeThemeSwitcherThemeManager');

            return $oThemeManager->isMobileThemeRequested();
        }

        return false;
    }

    /**
     * @return int
     */
    public function d3GetSendNoBounceEventTime()
    {
        $iTime = \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get($this->_sModId)->getValue('iSendNoBounceEventTime');

        if (isset($iTime) && is_int($iTime)) {
            return $iTime;
        }

        return 10000;
    }
}
