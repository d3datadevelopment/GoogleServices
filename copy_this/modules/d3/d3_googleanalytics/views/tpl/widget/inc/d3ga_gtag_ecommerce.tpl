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
