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

    /**
     * @return null
     */
    public function render()
    {
        $ret = parent::render();

        /** @var $oParentView oxView */
        $oParentView = $this->getParent();
        $oParentView->addTplParam('blD3GoogleAnalyticsActive', d3_cfg_mod::get($this->_d3getModId())->isActive());
        $oParentView->addTplParam('oD3GASettings', d3_cfg_mod::get($this->_d3getModId()));
        $oParentView->addTplParam('sD3GATTpl', $this->d3getGATTpl());
        $oParentView->addTplParam('sD3GACreateParameter', $this->d3getCreateParameters());
        $oParentView->addTplParam('sD3GASendPageViewParameter', $this->d3getSendPageViewParameters());
        $oParentView->addTplParam('sD3CurrentShopUrl', oxRegistry::getConfig()->getActiveShop()->getFieldData('oxurl'));

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
            $aParameter[] = "'siteSpeedSampleRate': ".d3_cfg_mod::get($this->_sModId)->getValue('iD3GASiteSpeedSampleRate');
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

        if ($oCurrentView->getIsOrderStep()) {
            $aParameter[] = "'{$oCurrentView->getClassName()}.html'";
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

        if ($oCurrentView->getIsOrderStep()) {
            $aParameter[] = "'page':  '{$oCurrentView->getClassName()}.html'";
            $aParameter[] = "'title': 'Checkout: ".ucfirst($oCurrentView->getClassName())."'";
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
}
