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
 * @copyright (C) D3 Data Development
 */

class d3_oxcmp_utils_googleAnalytics extends d3_oxcmp_utils_googleAnalytics_parent
{
    private $_sModId = 'd3_googleanalytics';

    private $_oSet;

    /**
     * @return null
     */
    public function render()
    {
        $ret = parent::render();

        // load module config
        $this->_oSet = d3_cfg_mod::get($this->_sModId);

        /** @var $oParentView oxView */
        $oParentView = $this->getParent();
        $oParentView->addTplParam('blD3GoogleAnalyticsActive', $this->_oSet->getFieldData('oxactive'));
        $oParentView->addTplParam('oD3GASettings', $this->_oSet);

        return $ret;
    }
}