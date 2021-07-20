<?php

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

class d3_oxutilsview_googleanalytics extends d3_oxutilsview_googleanalytics_parent
{
    /**
     * @param object $oSmarty
     *
     * @return null|void
     */
    protected function _fillCommonSmartyProperties($smarty)
    {
        parent::_fillCommonSmartyProperties($smarty);

        $smarty->plugins_dir[] =
            Registry::getConfig()->getActiveView()->getViewConfig()->getModulePath('d3_googleanalytics').
            'core/smarty/plugins';
    }
}
