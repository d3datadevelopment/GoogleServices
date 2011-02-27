[{if $d3GoogleAnalyticsActive && $d3GoogleAnalyticsId}]
    [{strip}]
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '[{ $d3GoogleAnalyticsId }]']);
            [{if $d3GoogleAnalyticsAnonymizeIP}]_gaq.push(['_gat._anonymizeIp']);[{/if}]
            _gaq.push(['_setDomainName', 'none']);
            [{if d3GoogleAnalyticsXDomain}]_gaq.push(['_setAllowLinker', true]);[{/if}]
            _gaq.push(['_trackPageview']);

            [{if $d3GoogleAnalyticsSendECommerce && $oViewConf->getActiveClassName() == 'thankyou'}]
                _gaq.push(['_addTrans',
                    '[{ $order->oxorder__oxordernr->value }]',          // order ID - required
                    '[{ $oxcmp_shop->oxshops__oxname->value}]',         // affiliation or store name
                    '[{ $order->getTotalOrderSum() }]',                 // total - required
                    '',                                                 // tax
                    '[{ $order->oxorder__oxdelcost->value }]',          // shipping
                    '[{ $order->oxorder__oxbillcity->value }]',         // city
                    '[{ $order->oxorder__oxbillstate->value }]',        // state or province
                    '[{ $order->oxorder__oxbillcountry->value }]'       // country
                ]);

                [{foreach from=$order->getOrderArticles() item=oOrderArticle}]
                    _gaq.push(['_addItem',
                        '[{ $order->oxorder__oxordernr->value }]',                      // order ID - required
                        '[{ $oOrderArticle->oxorderarticles__oxartnum->value }]',       // SKU/code
                        '[{ $oOrderArticle->oxorderarticles__oxtitle->value }]',        // product name
                        '[{ $oOrderArticle->oxorderarticles__oxselvariant->value }]',   // category or variation
                        '[{ $oOrderArticle->oxorderarticles__oxprice->value }]',        // unit price - required
                        '[{ $oOrderArticle->oxorderarticles__oxamount->value }]'        // quantity - required
                    ]);
                [{/foreach}]

                _gaq.push(['_trackTrans']);

            [{/if}]

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    [{/strip}]
[{/if}]