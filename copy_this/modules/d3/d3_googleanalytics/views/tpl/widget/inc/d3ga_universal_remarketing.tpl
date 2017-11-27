[{if $oD3GASettings->getValue('blD3GASetRemarketing') &&
    $oD3GASettings->getValue('sD3GARemarketingConversionId')}]

    [{block name="UniversalAdwordsRemarketing"}]
        [{*-- Google Code für ein Remarketing-Tag --
            --------------------------------------------------
            Remarketing-Tags dürfen nicht mit personenbezogenen Daten verknüpft oder auf Seiten platziert werden,
            die sensiblen Kategorien angehören. Weitere Informationen und Anleitungen zur Einrichtung des Tags
            erhalten Sie unter: http://google.com/ads/remarketingsetup
        ---------------------------------------------------*}]

        <script type="text/javascript">
            var google_tag_params = {
                ecomm_prodid: [{$sD3GARemarketingProdId}],
                ecomm_pagetype: '[{$sD3GARemarketingPageType}]',
                ecomm_totalvalue: '[{$sD3GARemarketingPrice}]'
            };
        </script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = [{$oD3GASettings->getValue('sD3GARemarketingConversionId')}];
            [{if $oD3GASettings->getValue('sD3GARemarketingConversionLabel')}]
                var google_conversion_label = "[{$oD3GASettings->getValue('sD3GARemarketingConversionLabel')}]";
            [{/if}]
            var google_custom_params = window.google_tag_params;
            var google_remarketing_only = true;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/[{$oD3GASettings->getValue('sD3GARemarketingConversionId')}]/?value=0[{if $oD3GASettings->getValue('sD3GARemarketingConversionLabel')}]&amp;label=[{$oD3GASettings->getValue('sD3GARemarketingConversionLabel')}][{/if}]&amp;guid=ON&amp;script=0"/>
            </div>
        </noscript>
    [{/block}]
[{/if}]