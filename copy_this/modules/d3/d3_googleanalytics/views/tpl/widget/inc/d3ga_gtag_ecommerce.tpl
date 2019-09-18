[{* https://developers.google.com/analytics/devguides/collection/gtagjs/ecommerce *}]
[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'purchase', {
    "transaction_id": "24.031608523954162",
    "affiliation": "Google online store",
    "value": 23.07,
    "currency": "USD",
    "tax": 1.24,
    "shipping": 0,
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": '2.0'
        },
        {
            "id": "P67890",
            "name": "Flame challenge TShirt",
            "list_name": "Search Results",
            "brand": "MyBrand",
            "category": "Apparel/T-Shirts",
            "variant": "Red",
            "list_position": 2,
            "quantity": 1,
            "price": '3.0'
        }
    ]
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'view_item_list', {
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": 2
        },
        {
            "id": "P67890",
            "name": "Flame challenge TShirt",
            "list_name": "Search Results",
            "brand": "MyBrand",
            "category": "Apparel/T-Shirts",
            "variant": "Red",
            "list_position": 2,
            "quantity": 1,
            "price": 3
        }
    ]
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'view_item', {
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": '2.0'
        }
    ]
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'add_to_cart', {
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": '2.0'
        }
    ]
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'remove_from_cart', {
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": '2.0'
        }
    ]
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'begin_checkout', {
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": '2.0'
        }
    ],
    "coupon": ""
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'checkout_progress', {
    "items": [
        {
            "id": "P12345",
            "name": "Android Warhol T-Shirt",
            "list_name": "Search Results",
            "brand": "Google",
            "category": "Apparel/T-Shirts",
            "variant": "Black",
            "list_position": 1,
            "quantity": 2,
            "price": '2.0'
        }
    ],
    "coupon": "SUMMER_DISCOUNT"
});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
gtag('event', 'set_checkout_option', {
    "checkout_step": 1,
    "checkout_option": "shipping method",
    "value": "USPS"
});


[{* ============================================================ *}]


[{if $oD3GASettings->getValue('blD3GASendECommerce') && $oViewConf->getActiveClassName() == 'thankyou'}][{strip}]
    [{block name="UniversalEcommerceOrder"}]
        [{assign var="order" value=$oView->getOrder()}]

        [{assign var="currate" value=$order->oxorder__oxcurrate->value}]
        [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
            [{math equation="s / r" s=$order->getOrderNetSum() r=$currate format="%.2f" assign="sTotal"}]   [{* // total - required - has to be gross sum *}]
        [{else}]
            [{math equation="s / r" s=$order->getTotalOrderSum() r=$currate format="%.2f" assign="sTotal"}] [{* // total - required *}]
        [{/if}]
        [{math equation="s - r" s=$order->getTotalOrderSum() r=$order->getOrderNetSum() format="%.2f" assign="sTax"}]
        [{math equation="s / r" s=$order->oxorder__oxdelcost->value r=$currate format="%.2f" assign="sShipping"}]

        gtag('event', 'purchase', {
            "transaction_id": "[{$order->oxorder__oxordernr->value}]",
            "affiliation": "[{$oxcmp_shop->oxshops__oxname->value|escape:"quotes"}]",
            "value": [{$sTotal}],
            "currency": "[{$order->getFieldData('oxcurrency')}]",
            "tax": [{$sTax}],
            "shipping": [{$sShipping}],
            "items": [

            [{foreach from=$order->getOrderArticles() item=oOrderArticle name="artList"}]
                [{block name="UniversalEcommerceOrderArticle"}]
                    [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
                        [{assign var="oPrice" value=$oOrderArticle->getPrice()}]
                        [{math equation="s / r" s=$oPrice->getNettoPrice() r=$currate format="%.2f" assign="sPrice"}]
                    [{else}]
                        [{assign var="sPrice" value=$oOrderArticle->oxorderarticles__oxprice->value}]
                    [{/if}]
                    {
                        "id": "[{$order->oxorder__oxordernr->value}]",
                        "name": "[{$oOrderArticle->oxorderarticles__oxtitle->value|escape:"quotes"}]",
                        "list_name": "Search Results",
                        "brand": "Google",
                        "category": "[{$oOrderArticle->oxorderarticles__d3_galocator->value|escape:"quotes"}]",
                        "variant": "[{$oOrderArticle->oxorderarticles__oxselvariant->value}]",
                        "list_position": [{$smarty.foreach.artList.index}],
                        "quantity": [{$oOrderArticle->oxorderarticles__oxamount->value}],
                        "price": '[{$sPrice}]'
                    },
                [{/block}]
            [{/foreach}]
        });
    [{/block}]
[{/strip}][{/if}]
