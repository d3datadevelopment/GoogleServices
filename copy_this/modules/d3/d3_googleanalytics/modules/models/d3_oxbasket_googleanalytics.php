<?php
 /**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright © D³ Data Development, Thomas Dartsch
 * @author    D³ Data Development - Daniel Seifert <ds@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_oxbasket_googleanalytics extends d3_oxbasket_googleanalytics_parent
{
    /**
     * @return string
     */
    public function d3GetCurrentLocatorTitle()
    {
        $sTitle = '';
        $oView = oxRegistry::getConfig()->getActiveView();

        if (method_exists($oView, 'getBreadCrumb') &&
            ($aPaths = $oView->getBreadCrumb())
        ) {
            foreach ($aPaths as $aPath) {
                $sTitle .= "/".$aPath['title'];
            }
        } elseif ($oView->getClassName() == 'details' &&
            (
                ($oCatPath = $oView->getCategoryTree()->getPath()) ||
                ($oCatPath = $oView->getManufacturerTree()->getPath())
            )
        ) {
            foreach ($oCatPath as $oCat) {
                $sTitle .= "/".$oCat->getFieldData('oxtitle');
            }
        } else {
            $sTitle = "page: ".ucfirst($oView->getClassName());
        }

        return $sTitle;
    }

    /**
     * @param string $sProductID
     * @param float  $dAmount
     * @param null   $aSel
     * @param null   $aPersParam
     * @param bool   $blOverride
     * @param bool   $blBundle
     * @param null   $sOldBasketItemId
     *
     * @return object
     */
    public function addToBasket(
        $sProductID,
        $dAmount,
        $aSel = null,
        $aPersParam = null,
        $blOverride = false,
        $blBundle = false,
        $sOldBasketItemId = null
    ) {
        $oBasketItem = parent::addToBasket(
            $sProductID,
            $dAmount,
            $aSel,
            $aPersParam,
            $blOverride,
            $blBundle,
            $sOldBasketItemId
        );

        if ($oBasketItem) {
            $oBasketItem->d3SetLocatorTitle($this->d3GetCurrentLocatorTitle());
        }

        return $oBasketItem;
    }
}
