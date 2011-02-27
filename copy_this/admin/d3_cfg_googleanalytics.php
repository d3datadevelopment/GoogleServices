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
 * @link http://www.oxidmodule.com
 * @link http://www.shopmodule.com
 * @copyright (C) D3 Data Development
 */

class d3_cfg_multivariants extends d3_cfg_mod_
{

    public function render()
    {
        $this->_aViewData['sListClass'] = 'd3_cfg_googleanalytics_list';
        $this->_aViewData['sMainClass'] = 'd3_cfg_googleanalytics_main';
        return parent::render();
    }
}