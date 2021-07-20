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

use OxidEsales\Eshop\Application\Model\Article as Article;

/**
 * Smarty plugin
 * -------------------------------------------------------------
 * add [{d3getArticleFromOrderArticle aid="articleid"}] where you want to display content
 * -------------------------------------------------------------
 *
 * @param array  $params  params
 * @param Smarty &$smarty clever simulation of a method
 *
 * @return string
 */
function smarty_function_d3getArticleFromOrderArticle( $params, $smarty )
{
    $sArtId = $params['aid'];
    $oArticle = oxNew( Article::class);
    $oArticle->load($sArtId);

    if (isset($params['assign']) && $params['assign']) {
        $smarty->assign($params['assign'], $oArticle);
    }

    return "use assign param";
}
