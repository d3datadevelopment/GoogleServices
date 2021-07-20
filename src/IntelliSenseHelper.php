<?php

use OxidEsales\Eshop\Application\Component\UtilsComponent;
use OxidEsales\Eshop\Application\Controller\OrderController;
use OxidEsales\Eshop\Application\Controller\ThankYouController;
use OxidEsales\Eshop\Application\Model\Basket as Basket;
use OxidEsales\Eshop\Application\Model\BasketItem;
use OxidEsales\Eshop\Application\Model\Order as Order;
use OxidEsales\Eshop\Core\UtilsView;

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

class d3_oxcmp_utils_googleanalytics_parent extends UtilsComponent {}

/** */
class d3_oxorder_googleanalytics_parent extends Order
{}

/** */
class d3_thankyou_googleanalytics_parent extends ThankYouController {}

/** */
class d3_order_googleanalytics_parent extends OrderController {}

/** */
class d3_oxutilsview_googleanalytics_parent extends UtilsView {}

/** */
class d3_oxbasket_googleanalytics_parent extends Basket
{}

/** */
class d3_oxbasketitem_googleanalytics_parent extends BasketItem {}