[{strip}][{if $oD3GASettings->getValue('blD3GASetConversionTracking') &&
    $oD3GASettings->getValue('sD3GAAdWordConversionId') && $oViewConf->getActiveClassName() == 'thankyou'}]

        [{block name="UniversalAdwordsCode"}]
            [{capture name="d3AdWordsCode"}]
                [{assign var="order" value=$oView->getOrder()}]
                [{assign var="currate" value=$order->oxorder__oxcurrate->value}]

                [{if $oD3GASettings->getValue('blD3GAUseNetto')}]
                    [{math equation="s / r" s=$order->getOrderNetSum() r=$currate assign="sTotal"}]   [{* // total - required - has to be gross sum *}]
                [{else}]
                    [{math equation="s / r" s=$order->getTotalOrderSum() r=$currate assign="sTotal"}] [{* // total - required *}]
                [{/if}]

                <!-- Google Code for Conversion Page -->
                <script type="text/javascript">
                    /* <![CDATA[ */
                    var google_conversion_id = [{$oD3GASettings->getValue('sD3GAAdWordConversionId')}];
                    var google_conversion_language = "de";
                    var google_conversion_format = "3";
                    var google_conversion_color = "ffffff";
                    var google_conversion_label = "[{$oD3GASettings->getValue('sD3GAAdWordConversionLabel')}]";
                    var google_conversion_value = [{$sTotal}];
                    var google_remarketing_only = false;
                    /* ]]> */
                </script>

                <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                </script>

                <noscript>
                    <div style="display:inline;">
                        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/[{$oD3GASettings->getValue('sD3GAAdWordConversionId')}]/?value=[{$sTotal}]&amp;label=[{$oD3GASettings->getValue('sD3GAAdWordConversionLabel')}]&amp;guid=ON&amp;script=0"/>
                    </div>
                </noscript>
            [{/capture}]

            [{$oView->logCode($smarty.capture.d3AdWordsCode)}]

            [{$smarty.capture.d3AdWordsCode}]
        [{/block}]

    [{/if}]
[{/strip}]