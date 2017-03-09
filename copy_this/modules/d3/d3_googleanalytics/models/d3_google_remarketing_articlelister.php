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

class d3_google_remarketing_articlelister
{
    public $sD3GARemarketingSKUField = 'oxartnum';

    public $blD3GARemarketingUseBrutto = true;

    public $aStartListMethodNames = array(
        'getArticleList',
        'getTopArticleList',
        'getNewestArticles',
        'getFirstArticle',
        'getCatOfferArticleList',
    );

    /**
     * @param start $oView
     *
     * @return array
     */
    public function getStartProdList($oView)
    {
        /** @var oxArticleList $oArticleList */
        $oArticleList = oxNew('oxarticlelist');

        if (is_array($this->aStartListMethodNames) && count($this->aStartListMethodNames)) {
            foreach ($this->aStartListMethodNames as $sListName) {
                /** @var oxArticleList $oList */
                $mList = call_user_func(array($oView, $sListName));

                if ($mList instanceof oxArticleList) {
                    if ($mList->count()) {
                        foreach ($mList->getArray() as $sID => $oArticle) {
                            $oArticleList->offsetSet($sID, $oArticle);
                        }
                    }
                }
            }
        }

        return $this->_getProductList($oArticleList);
    }

    /**
     * @param details $oView
     *
     * @return array
     */
    public function getDetailsProdList($oView)
    {
        $aArticleList = array();
        $aArticleList[] = $oView->getProduct();
        return $this->_getProductList($aArticleList);
    }

    /**
     * @param oxwArticleDetails $oView
     *
     * @return array
     */
    public function getOxwarticledetailsProdList($oView)
    {
        $aArticleList = array();
        $aArticleList[] = $oView->getProduct();
        return $this->_getProductList($aArticleList);
    }

    /**
     * @param alist $oView
     *
     * @return array
     */
    public function getAlistProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_getProductList($oArticleList);
    }

    /**
     * @param search $oView
     *
     * @return array
     */
    public function getSearchProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_getProductList($oArticleList);
    }

    /**
     * @param vendorlist $oView
     *
     * @return array
     */
    public function getVendorlistProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_getProductList($oArticleList);
    }

    /**
     * @param manufacturerlist $oView
     *
     * @return array
     */
    public function getManufacturerlistProdList($oView)
    {
        $oArticleList = $oView->getArticleList();
        return $this->_getProductList($oArticleList);
    }

    /**
     * @param basket $oView
     *
     * @return array
     */
    public function getBasketProdList($oView)
    {
        $aArticleList = $oView->getBasketArticles();
        return $this->_getProductList($aArticleList);
    }

    /**
     * @param order $oView
     *
     * @return array
     */
    public function getOrderProdList($oView)
    {
        $aArticleList = $oView->getBasketArticles();
        return $this->_getProductList($aArticleList);
    }

    /**
     * @param compare $oView
     *
     * @return array
     */
    public function getCompareProdList($oView)
    {
        $aArticleList = $oView->getCompArtList();
        return $this->_getProductList($aArticleList);
    }

    /**
     * don't change method name, it was dynamically generated
     * @param account_noticelist $oView
     *
     * @return array
     */
    public function getAccount_noticelistProdList($oView)
    {
        $aArticleList = $oView->getNoticeProductList();
        return $this->_getProductList($aArticleList);
    }

    /**
     * don't change method name, it was dynamically generated
     * @param account_wishlist $oView
     *
     * @return array
     */
    public function getAccount_wishlistProdList($oView)
    {
        $aArticleList = $oView->getWishProductList();
        return $this->_getProductList($aArticleList);
    }

    /**
     * @param $aArticleList
     *
     * @return array
     */
    protected function _getProductList($aArticleList)
    {
        $aArticleIds = array();
        $dPrice = 0;

        /** @var oxarticle $oArticle */
        if (isset($aArticleList)) {
            foreach ($aArticleList as $oArticle) {
                $aArticleIds[] = $oArticle->getFieldData($this->sD3GARemarketingSKUField);
                if ($this->blD3GARemarketingUseBrutto) {
                    $dPrice += $oArticle->getPrice()->getBruttoPrice();
                } else {
                    $dPrice += $oArticle->getPrice()->getNettoPrice();
                }
            }
        }

        return array('aArtIdList' => $aArticleIds, 'dPrice' => $dPrice);
    }
}
