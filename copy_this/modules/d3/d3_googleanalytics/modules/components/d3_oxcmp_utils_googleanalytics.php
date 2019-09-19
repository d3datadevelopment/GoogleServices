<?php

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Application\Model\ArticleList;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

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
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws StandardException
     */
    public function render()
    {
        $ret = parent::render();

        $oSet = d3_cfg_mod::get($this->_d3getModId());

        if ($oSet->isActive()) {
            /** @var $oParentView FrontendController */
            $oParentView = $this->getParent();
            $oParentView->addTplParam('blD3GoogleAnalyticsActive', $oSet->isActive());
            $oParentView->addTplParam('oD3GASettings', $oSet);
            $oParentView->addTplParam('oD3GAActCurrency', Registry::getConfig()->getActShopCurrencyObject());
            $oParentView->addTplParam('sD3GAPageLocation', $oParentView->getBaseLink());
            $oParentView->addTplParam('sD3GAPagePath', str_replace(Registry::getConfig()->getShopUrl(), '', $oParentView->getBaseLink()));
            // prevent overwriting with empty title from later loaded widgets
            if ($oParentView->getTitle() && false == $oParentView->getViewDataElement('sD3GAPageTitle')) {
                $oParentView->addTplParam('sD3GAPageTitle', $oParentView->getTitle());
            }
            if (Registry::getSession()->getUser() && ($sUserId = Registry::getSession()->getUser()->getId())) {
                $oParentView->addTplParam('sD3GAUserId', md5($sUserId));
            }


            $oParentView->addTplParam('sAFEGetMoreUrls', $this->afGetMoreUrls());
            $oParentView->addTplParam('sD3GASendPageViewParameter', $this->d3getSendPageViewParameters());
            $oParentView->addTplParam('sD3CurrentShopUrl', $this->d3GetCreateCurrentShopUrl());
            $oParentView->addTplParam('blD3GAIsMobile', $this->d3isMobile());
            $oParentView->addTplParam('iD3GASendNoBounceEventTime', $this->d3GetSendNoBounceEventTime());

            if ($oSet->getValue('sD3GATSActive')) {
                $oParentView->addTplParam('sD3CurrentGTSLang', $this->d3GetGTSLang());
            }

            $this->setECommerceParams();

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
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function setECommerceParams()
    {
        /** @var $oParentView FrontendController */
        $oParentView = $this->getParent();

        $oSet = d3_cfg_mod::get($this->_d3getModId());

        if ($oSet->getValue('blD3GASendECommerce')) {
            $oParentView->addTplParam('blIsImpressionViewList', false);

            if ($this->isImpressionViewList()) {
                $oParentView->addTplParam('blIsImpressionViewList', true);
                $oParentView->addTplParam('aD3GAProdInfos', $this->d3GAGetProdInfos());
                $oParentView->addTplParam('sImpressionListType', $this->d3GAGetImpressionListType());
            }
        }

    }

    public function isImpressionViewList()
    {
// ToDo: has to be completed
        $impressionViews = ['search', 'start', 'alist', 'vendorlist', 'manufacturerlist'];
        $oCurrentView = Registry::getConfig()->getActiveView();

        return in_array($oCurrentView->getClassKey(), $impressionViews);
    }

    public function d3GAGetImpressionListType()
    {
        $oCurrentView = Registry::getConfig()->getActiveView();
// ToDo: has to be completed
        switch ($oCurrentView->getClassKey()) {
            case 'search':
                return "Search Results";
            case 'start':
                return "Start Page Results";
            case 'alist':
                return "Category Results";
            case 'vendorlist':
                return "Vendor List Results";
            case 'manufacturerlist':
                return "Manufacturer List Results";
        }
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
    public function d3GetCreateCurrentShopUrl()
    {
        if (d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
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
        if (false == d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
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
        /** @var d3str $oD3Str */
        $oD3Str = oxNew('d3str');

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
    public function d3getSendPageViewParameters()
    {
        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'async') {
            return $this->_d3getAsyncSendpageViewParameters();
        } elseif (d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'universal') {
            return $this->_d3getUniversalSendPageViewParameters();
        } elseif (d3_cfg_mod::get($this->_sModId)->getValue('sD3GAType') == 'gtag') {
            return $this->_d3getGtagSendPageViewParameters();
        }
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

    protected function _d3getGtagSendPageViewParameters()
    {
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

        $oCurrentView = Registry::getConfig()->getActiveView();

        $aArticleIds = array();

        $sMethodName = 'get'.ucfirst($oCurrentView->getClassKey())."ProdList";
        $oArticleLister = oxNew('d3_google_trustedstore_articlelister');

        if (method_exists($oArticleLister, $sMethodName)) {
            stopProfile(__METHOD__);
            return call_user_func(array($oArticleLister, $sMethodName), $oCurrentView);
        }

        stopProfile(__METHOD__);

        return array('aArtIdList' => $aArticleIds);
    }

    /**
     * @return ArticleList
     */
    public function d3GAGetProdInfos()
    {
        startProfile(__METHOD__);

        $oCurrentView = Registry::getConfig()->getActiveView();

        $aArticleIds = array();

        $sMethodName = 'get'.ucfirst($oCurrentView->getClassKey())."ProdList";
        $oArticleLister = oxNew('d3_google_articlelister');

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
     * @return string
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
        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName')) {
            $aParameter[] = "'cookieDomain': '" . d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName') . "'";
            $aParameter[] = "'legacyCookieDomain': '" .
                d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName') . "'";

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
        if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath')) {
            $aParameter[] = "'cookiePath': '" . d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath') . "'";

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
        if (d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
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
        if (d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate')) {
            $aParameter[] = "'siteSpeedSampleRate': " .
                d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate');

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
        if (d3_cfg_mod::get($this->_sModId)->getValue('iD3GASampleRate')) {
            $aParameter[] = "'sampleRate': " . d3_cfg_mod::get($this->_sModId)->getValue('iD3GASampleRate');

            return $aParameter;
        }

        return $aParameter;
    }

    /**
     * @param $aParameter
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _d3getCreateAnonymizeIpParameter($aParameter)
    {
        if (d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAnonymizeIP')) {
            $aParameter[] = "'anonymize_ip': true'";
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
    protected function _d3getGtagSendPageViewPageParameter($oCurrentView, $aParameter)
    {
        if ($oCurrentView->getIsOrderStep() || strtolower($oCurrentView->getClassName()) == 'thankyou') {
            $aParameter[] = "'page_path':  '/{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'page_title': 'Checkout: " . ucfirst($oCurrentView->getClassName()) . "'";
        } elseif ($this->_d3HasNoPageParameter()) {
            $aParameter[] = "'page_path':  '/{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'page_title': '" . ucfirst($oCurrentView->getClassName()) . "'";
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
        if (d3_cfg_mod::get($this->_sModId)->hasDebugMode()) {
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
        $iTime = d3_cfg_mod::get($this->_sModId)->getValue('iSendNoBounceEventTime');

        if (isset($iTime) && is_int($iTime)) {
            return $iTime;
        }

        return 10000;
    }
}
