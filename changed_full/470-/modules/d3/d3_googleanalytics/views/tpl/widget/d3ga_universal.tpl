[{if $blD3GoogleAnalyticsActive && $oD3GASettings->getValue('sD3GAId')}]
    [{capture name="d3GATrackCode"}]
        [{strip}]
            <script type="text/javascript">
                (function(i,s,o,g,r,a,m){
                    i['GoogleAnalyticsObject']=r;
                    i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)
                    },
                    i[r].l=1*new Date();
                    a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];
                    a.async=1;
                    a.src=g;
                    m.parentNode.insertBefore(a,m)
                })(
                    window,document,'script','//www.google-analytics.com/analytics.js','d3ga'
                );

                d3ga('create', '[{$oD3GASettings->getValue('sD3GAId')}]', '[{$sD3CurrentShopUrl}]' [{$sD3GACreateParameter}]);

                [{if $oD3GASettings->getValue('blD3GAAnonymizeIP')}]
                    d3ga('set', 'anonymizeIp', true);
                [{/if}]

                [{include file="d3ga_universal_campaigns.tpl"}]

                [{include file="d3ga_universal_custom.tpl"}]

                [{if $oD3GASettings->getValue('blD3GAUseRemarketing')}]
                    d3ga('require', 'displayfeatures');
                [{/if}]

                d3ga('send', 'pageview' [{$sD3GASendPageViewParameter}]);

                [{if $oD3GASettings->getValue('blD3GATrackPageLoadTime')}]
                    var perfData = window.performance.timing;
                    var pageLoadTime = perfData.domComplete - perfData.navigationStart;
                    var loadTime = "";

                    if (pageLoadTime < 1000) { loadTime = "0-1 seconds"; }
                    else if (pageLoadTime < 2000) { loadTime = "1-2 seconds"; }
                    else if (pageLoadTime < 3000) { loadTime = "2-3 seconds"; }
                    else if (pageLoadTime < 4000) { loadTime = "3-4 seconds"; }
                    else if (pageLoadTime < 5000) { loadTime = "4-5 seconds"; }
                    else if (pageLoadTime < 6000) { loadTime = "5-6 seconds"; }
                    else if (pageLoadTime < 10000) { loadTime = "6-10 seconds"; }
                    else { loadTime = "10+ seconds"; }

                    d3ga('send', 'event', 'Page Load Time', loadTime, {'nonInteraction': 1});
                [{/if}]

                [{include file="d3ga_universal_ecommerce.tpl"}]
            </script>

            [{include file="d3ga_universal_campaigncode.tpl"}]

        [{/strip}]
    [{/capture}]

    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        [{$oView->logCode($smarty.capture.d3GATrackCode)}]
    [{/if}]

    [{$smarty.capture.d3GATrackCode}]
[{/if}]