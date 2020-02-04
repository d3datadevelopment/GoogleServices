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

class d3_oxbasketitem_googleanalytics extends d3_oxbasketitem_googleanalytics_parent
{
    protected $_sD3LocatorTitle;

    /**
     * @param $sLocatorTitle
     */
    public function d3SetLocatorTitle($sLocatorTitle)
    {
        if (false == $this->_sD3LocatorTitle) {
            $this->_sD3LocatorTitle = $sLocatorTitle;
        }
    }

    /**
     * @return string
     */
    public function d3GetLocatorTitle()
    {
        return $this->_sD3LocatorTitle;
    }
}
