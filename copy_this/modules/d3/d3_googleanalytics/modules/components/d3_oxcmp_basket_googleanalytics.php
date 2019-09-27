<?php

use OxidEsales\Eshop\Core\Registry;

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

class d3_oxcmp_basket_googleanalytics extends d3_oxcmp_basket_googleanalytics_parent
{
    public function toBasket($sProductId = null, $dAmount = null, $aSel = null, $aPersParam = null, $blOverride = false)
    {
        $sProductId = $sProductId ? $sProductId : \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('aid');
        $dAmount = isset($dAmount) ? $dAmount : \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('am');

        $oGAAction = oxNew(stdClass::class);
        $oGAAction->action = __FUNCTION__;
        $oGAAction->product = $sProductId;
        $oGAAction->amount  = $dAmount;

        Registry::getSession()->setVariable('d3GABasketAction', $oGAAction);

        $sRedirectUrl = parent::toBasket($sProductId, $dAmount, $aSel, $aPersParam, $blOverride);

        return $sRedirectUrl;
    }

    // changeBasket for removing
}