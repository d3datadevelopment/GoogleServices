[{if $oD3GASettings->getValue('blD3GASendECommerce') && $oViewConf->getActiveClassName() == 'thankyou'}][{strip}]
    [{assign var="order" value=$oView->getOrder()}]

    ga('require', 'ecommerce', 'ecommerce.js');

    [{assign var="currate" value=$order->oxorder__oxcurrate->value}]
    [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
        [{math equation="s / r" s=$order->getOrderNetSum() r=$currate format="%.2f" assign="sTotal"}]   [{* // total - required - has to be gross sum *}]
    [{else}]
        [{math equation="s / r" s=$order->getTotalOrderSum() r=$currate format="%.2f" assign="sTotal"}] [{* // total - required *}]
    [{/if}]
    [{math equation="s - r" s=$order->getTotalOrderSum() r=$order->getOrderNetSum() format="%.2f" assign="sTax"}]
    [{math equation="s / r" s=$order->oxorder__oxdelcost->value r=$currate format="%.2f" assign="sShipping"}]

    ga('ecommerce:addTransaction', {
        'id':           '[{$order->oxorder__oxordernr->value}]',        [{* Transaction ID. Required *}]
        'affiliation':  '[{$oxcmp_shop->oxshops__oxname->value}]',      [{* Affiliation or store name *}]
        'revenue':      '[{$sTotal}]',                                  [{* Gesamtwert *}]
        'shipping':     '[{$sShipping}]',                               [{* Versand *}]
        'tax':          '[{$sTax}]'                                     [{* Steuer *}]
    });

    [{foreach from=$order->getOrderArticles() item=oOrderArticle}]

        [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
            [{assign var="oPrice" value=$oOrderArticle->getPrice()}]
            [{math equation="s / r" s=$oPrice->getNettoPrice() r=$currate format="%.2f" assign="sPrice"}]
        [{else}]
            [{assign var="sPrice" value=$oOrderArticle->oxorderarticles__oxprice->value}]
        [{/if}]

        ga('ecommerce:addItem', {
            'id': '[{$order->oxorder__oxordernr->value}]',                          [{* Transaktions-ID *}]
            'name': '[{$oOrderArticle->oxorderarticles__oxtitle->value}]',          [{* Produktname *}]
            'sku': '[{$oOrderArticle->oxorderarticles__oxartnum->value}]',          [{* SKU/Code *}]
            'category': '[{$oOrderArticle->oxorderarticles__d3_galocator->value}]', [{* Kategorie oder Ausführung *}]
            [{*'category': '[{$oOrderArticle->oxorderarticles__oxselvariant->value}]', [{* Kategorie oder Ausführung *}]
            'price': '[{$sPrice}]',                                                 [{* Preis pro Einheit *}]
            'quantity': '[{$oOrderArticle->oxorderarticles__oxamount->value}]'      [{* Menge *}]
        });
    [{/foreach}]

    ga('ecommerce:send');
[{/strip}][{/if}]