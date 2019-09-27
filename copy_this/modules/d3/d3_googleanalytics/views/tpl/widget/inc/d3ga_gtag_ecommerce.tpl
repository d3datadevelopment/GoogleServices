[{if $blIsImpressionViewList}]
    [{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
    gtag('event', '[{$sImpressionViewType}]', {
        "items": [
            [{foreach from=$aD3GAProdInfos name="itemlist" item="item"}]
                [{assign var="oPrice" value=$item->getPrice()}]
                [{assign var="oManufacturer" value=$item->getManufacturer()}]
                [{assign var="oCategory" value=$item->getCategory()}]
                [{include file="d3ga_gtag_ecommerceproduct.tpl" item=$item iteration=$smarty.foreach.itemlist.iteration listname=$sImpressionListType}]
            [{/foreach}]
        ]
    });
[{elseif $blIsCheckoutViewList}]
    [{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
    gtag('event', '[{$sImpressionViewType}]', {
        "items": [
            [{foreach from=$oBasket->getContents() name="itemlist" item="basketContent"}]
                [{assign var="item" value=$basketContent->getArticle()}]
                [{assign var="oPrice" value=$item->getPrice()}]
                [{assign var="oManufacturer" value=$item->getManufacturer()}]
                [{assign var="oCategory" value=$item->getCategory()}]
                [{include file="d3ga_gtag_ecommerceproduct.tpl" item=$item iteration=$smarty.foreach.itemlist.iteration listname=$sImpressionListType quantity=$basketContent->getAmount()}]
            [{/foreach}]
        ]
        [{if $oVoucherList && $oVoucherList->count()}]
            , "coupon": "
                [{foreach from=$oVoucherList item="oVoucher"}]
                    [{assign var="voucherSerie" value=$oVoucher->getSerie()}]
                    [{$voucherSerie->getFieldData('oxserienr')}],
                [{/foreach}]
            "
        [{/if}]
    });
[{elseif $blIsPurchasedList}]
    [{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
    [{assign var="oCurrency" value=$oOrder->getOrderCurrency()}]
    gtag('event', 'purchase', {
        "transaction_id": "[{$oOrder->getFieldData('oxordernr')}]",
        "affiliation": "[{$oShop->getFieldData('oxname')|escape:"quotes"}]",
        "value": [{$oOrder->getFieldData('oxtotalnetsum')}],
        "currency": "[{$oCurrency->name}]",
        "tax": [{$dVat}],
        "shipping": [{$oOrder->getFieldData('oxdelcost')}],
        "items": [
            [{foreach from=$oOrder->getOrderArticles() name="itemlist" item="oOrderArticle"}]
                [{assign var="oArticle" value=$oOrderArticle->getArticle()}]
                [{include file="d3ga_gtag_ecommerceproduct.tpl" item=$oArticle iteration=$smarty.foreach.itemlist.iteration listname="Purchase List" quantity=$oOrderArticle->getFieldData('oxamount')}]
            [{/foreach}]
        ]
        [{if $oVoucherList && $oVoucherList->count()}]
            , "coupon": "
            [{foreach from=$oVoucherList item="oVoucher"}]
                [{assign var="voucherSerie" value=$oVoucher->getSerie()}]
                [{$voucherSerie->getFieldData('oxserienr')}],
            [{/foreach}]
            "
        [{/if}]
    });
[{/if}]

[{if $blIsBasketAction}]
    [{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
    [{* add_to_cart + remove_from_cart *}]
    gtag('event', '[{$sBasketActionType}]', {
        "items": [
            [{foreach from=$aD3GABasketProdInfos name="itemlist" item="item"}]
                [{include file="d3ga_gtag_ecommerceproduct.tpl" item=$item iteration=$smarty.foreach.itemlist.iteration listname=$sImpressionListType quantity=$dAmount}]
            [{/foreach}]
        ]
    });
[{/if}]

[{if $blIsCheckoutViewList || $blIsPurchasedList}]
    [{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
    gtag('event', 'set_checkout_option', {
        "checkout_step": [{$iCheckoutStep}],
        "checkout_option": "Shipping + Payment",
        "value": "[{$checkoutOptionValue}]"
    });
[{/if}]