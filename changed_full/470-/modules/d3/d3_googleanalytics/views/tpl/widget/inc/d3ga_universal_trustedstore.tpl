[{* https://support.google.com/trustedstoresmerchant/answer/6063080?hl=de&ref_topic=6063044 *}]
<!-- BEGIN: Google Certified Shops -->
<script type="text/javascript">
    var gts = gts || [];

    gts.push(["id", "[{$oD3GASettings->getValue('sD3GATSId')}]"]);
    gts.push(["badge_position", "BOTTOM_RIGHT"]);
    gts.push(["locale", "de_DE"]);
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
    <!-- START Google Trusted Stores Order -->
        <div id="gts-order" style="display:none;" translate="no">
            <!-- start order and merchant information -->
                <span id="gts-o-id">MERCHANT_ORDER_ID</span>
                <span id="gts-o-domain">MERCHANT_ORDER_ID</span>
                <span id="gts-o-email">MERCHANT_ORDER_ID</span>
                <span id="gts-o-country">MERCHANT_ORDER_ID</span>
                <span id="gts-o-currency">MERCHANT_ORDER_ID</span>
                <span id="gts-o-total">MERCHANT_ORDER_ID</span>
                <span id="gts-o-discounts">MERCHANT_ORDER_ID</span>
                <span id="gts-o-shipping-total">MERCHANT_ORDER_ID</span>
                <span id="gts-o-tax-total">MERCHANT_ORDER_ID</span>
                <span id="gts-o-est-ship-date">MERCHANT_ORDER_ID</span>
                <span id="gts-o-est-delivery-date">MERCHANT_ORDER_ID</span>
                <span id="gts-o-est-has-preorder">MERCHANT_ORDER_ID</span>
                <span id="gts-o-est-has-digital">MERCHANT_ORDER_ID</span>
            <!-- end order and merchant information -->

            <!-- start repeated item specific information -->
            <!-- item example: this area repeated for each item in the order -->
                <span class="gts-item">
                    <span class="gts-i-name">ITEM_NAME</span>
                    <span class="gts-i-price">ITEM_NAME</span>
                    <span class="gts-i-quantity">ITEM_NAME</span>
[{*
                    <span class="gts-i-prodsearch-id">ITEM_NAME</span>
                    <span class="gts-i-prodsearch-store-id">ITEM_NAME</span>
                    <span class="gts-i-prodsearch-country">ITEM_NAME</span>
                    <span class="gts-i-prodsearch-language">ITEM_NAME</span>
*}]
                </span>
            <!-- end item 1 example -->
            <!-- end repeated item specific informations -->
        </div>
    <!-- END Google Trusted Stores Order -->
[{/if}]