[{if $blD3GoogleAnalyticsActive && $oD3GASettings->getValue('sD3GAId')}]
    [{capture name="d3GATrackCode"}]
        [{strip}]
            [{if $oD3GASettings->getValue('blD3GAUseOptOut')}]
                <script type="text/javascript">
                    var gaProperty = '[{$oD3GASettings->getValue('sD3GAId')}]';
                    var disableStr = 'ga-disable-' + gaProperty;
                    if (document.cookie.indexOf(disableStr + '=true') > -1) {
                        window[disableStr] = true;
                    }

                    function gaOptout() {
                        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
                        window[disableStr] = true;
                    }
                </script>
            [{/if}]

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
                    window,document,'script','//www.google-analytics.com/analytics.js','ga'
                );

                ga('create', '[{$oD3GASettings->getValue('sD3GAId')}]', '[{$sD3CurrentShopUrl}]' [{$sD3GACreateParameter}]);

                [{if $oD3GASettings->getValue('blD3GAAllowDomainLinker')}]
                    ga('require', 'linker');
                    ga('linker:autoLink', [[{$sAFEGetMoreUrls}]]);
                [{/if}]

                [{if $oD3GASettings->getValue('blD3GAAnonymizeIP')}]
                    ga('set', 'anonymizeIp', true);
                [{/if}]

                [{include file="d3ga_universal_adwords.tpl"}]

                [{include file="d3ga_universal_custom.tpl"}]

                [{if $oD3GASettings->getValue('blD3GAUseRemarketing')}]
                    ga('require', 'displayfeatures');
                [{/if}]

                [{* bounce optimization*}]
                setTimeout('ga(\'send\', \'event\', \'NoBounce\', \'Over defined seconds\')',[{$oD3GASettings->getValue('iSendNoBounceEventTime')}]);

                [{if $oD3GASettings->getValue('blSendNoBounceEventScroll')}]
                    window.addEventListener ?
                        window.addEventListener('scroll', testScroll, false) :
                        window.attachEvent('onscroll', testScroll);

                    var scrollCount = 0;
                    function testScroll() {
                        ++scrollCount;
                        if (scrollCount == 2) {
                            ga('send', 'event', 'window', 'scrolled');
                        }
                    }
                [{/if}]

                ga('send', 'pageview' [{$sD3GASendPageViewParameter}]);

                [{include file="d3ga_universal_ecommerce.tpl"}]

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

                    ga('set', 'metric1', loadTime);
                    [{*ga('send', 'event', 'Page Load Time', loadTime, {'nonInteraction': true});*}]
                [{/if}]
            </script>

        [{/strip}]
    [{/capture}]

    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        [{$oView->logCode($smarty.capture.d3GATrackCode)}]
    [{/if}]

    [{$smarty.capture.d3GATrackCode}]
[{/if}]