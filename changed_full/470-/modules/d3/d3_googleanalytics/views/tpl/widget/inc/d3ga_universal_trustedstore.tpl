[{* https://support.google.com/trustedstoresmerchant/answer/6063080?hl=de&ref_topic=6063044 *}]
<!-- BEGIN: Google Certified Shops -->
<script type="text/javascript">
    var gts = gts || [];

    gts.push(["id", "[{$oD3GASettings->getValue('sD3GATSId')}]"]);
    gts.push(["badge_position", "BOTTOM_RIGHT"]);
    gts.push(["locale", "[{$sD3CurrentGTSLang}]"]);
[{*
    gts.push(["google_base_offer_id", "foo"]);
    gts.push(["google_base_subaccount_id", "foo"]);
    gts.push(["google_base_country", "foo"]);
    gts.push(["google_base_language", "foo"]);
*}]

    (function() {
        var gts = document.createElement("script");
        gts.type = "text/javascript";
        gts.async = true;
        gts.src = "https://www.googlecommerce.com/trustedstores/api/js";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(gts, s);
    })();
</script>
<!-- END: Google Certified Shops -->

[{if $oViewConf->getActiveClassName() == 'thankyou'}]
    [{* https://support.google.com/trustedstoresmerchant/answer/6063087?hl=de&ref_topic=6063044 *}]

    [{assign var="oOrder" value=$oView->getOrder()}]
    [{assign var="oOrderCurrency" value=$oOrder->getOrderCurrency()}]
    [{assign var="oUser" value=$oOrder->getOrderUser()}]
    [{assign var="oUserCountry" value=$oD3GACountry}]
    [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
        [{assign var="sTotal" value=$oOrder->getOrderNetSum()}]   [{* // total - required - has to be gross sum *}]
    [{else}]
        [{assign var="sTotal" value=$oOrder->getTotalOrderSum()}] [{* // total - required *}]
    [{/if}]

    <!-- START Google Trusted Stores Order -->
        <div id="gts-order" style="display:none;" translate="no">
            <!-- start order and merchant information -->
                <span id="gts-o-id">[{$oOrder->getFieldData('oxordernr')}]</span>
                <span id="gts-o-domain">[{$oxcmp_shop->oxshops__oxurl->value}]</span>
                <span id="gts-o-email">[{$oUser->getFieldData('oxusername')}]</span>
                <span id="gts-o-country">[{$oUserCountry->getFieldData('oxisoalpha2')}]</span>
                <span id="gts-o-currency">[{$oOrderCurrency->name}]</span>
                <span id="gts-o-total">[{$sTotal|string_format:"%.2f"}]</span>
                <span id="gts-o-discounts">-[{$oOrder->getFieldData('oxdiscount')}]</span>
                <span id="gts-o-shipping-total">[{$oOrder->getFieldData('oxdelcost')}]</span>
                <span id="gts-o-tax-total">[{math equation="fi + se + th + fo" fi=$oOrder->getFieldData('oxartvatprice1') se=$oOrder->getFieldData('oxartvatprice2') th=$oOrder->getFieldData('oxpayvat') fo=$oOrder->getFieldData('oxdelvat') format="%.2f"}]</span>
                <span id="gts-o-est-ship-date">has_completed</span>
                <span id="gts-o-est-delivery-date">has_completed</span>
                <span id="gts-o-est-has-preorder">has_completed</span>
                <span id="gts-o-est-has-digital">has_completed</span>
            <!-- end order and merchant information -->

            <!-- start repeated item specific information -->
            [{foreach from=$order->getOrderArticles() item=oOrderArticle}]
                [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
                    [{assign var="oPrice" value=$oOrderArticle->getPrice()}]
                    [{assign var="sPrice" value=$oPrice->getNettoPrice()}]
                [{else}]
                    [{assign var="sPrice" value=$oOrderArticle->oxorderarticles__oxprice->value}]
                [{/if}]

                <span class="gts-item">
                    <span class="gts-i-name">[{$oOrderArticle->oxorderarticles__oxtitle->value|escape:"quotes"}]</span>
                    <span class="gts-i-price">[{$sPrice|string_format:"%.2f"}]</span>
                    <span class="gts-i-quantity">[{$oOrderArticle->getFieldData('oxamount')}]</span>
[{*
                    <span class="gts-i-prodsearch-id">ITEM_NAME</span>
                    <span class="gts-i-prodsearch-store-id">ITEM_NAME</span>
                    <span class="gts-i-prodsearch-country">ITEM_NAME</span>
                    <span class="gts-i-prodsearch-language">ITEM_NAME</span>
*}]
                </span>
            [{/foreach}]
            <!-- end repeated item specific informations -->
        </div>
    <!-- END Google Trusted Stores Order -->
[{/if}]