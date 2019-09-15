[{if $blD3GoogleAnalyticsActive && $oD3GASettings->getValue('sD3GAId')}]
    [{capture name="d3GATrackCode"}]
        [{strip}]
            [{if $oD3GASettings->getValue('blD3GAUseOptOut')}]
                [{block name="d3ga_optoutscript"}]
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
                [{/block}]
            [{/if}]

## nach head ## https://developers.google.com/analytics/devguides/collection/gtagjs/
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

## https://developers.google.com/analytics/devguides/collection/gtagjs/setting-values
                gtag('set', {
                    'currency': 'USD',
                    'country': 'US'
                });

                gtag(
                    'config', 'GA_MEASUREMENT_ID',
                    {
## https://developers.google.com/analytics/devguides/collection/gtagjs/pages
                        'page_title' : 'homepage',
                        'page_path': '/home',

## https://developers.google.com/analytics/devguides/collection/gtagjs/cookies-user-id
                        'cookie_prefix': 'MyCookie',
                        'cookie_domain': 'blog.example.com',
                        'cookie_expires': 28 * 24 * 60 * 60  // 28 days, in seconds

## https://developers.google.com/analytics/devguides/collection/gtagjs/cookies-user-id !!! Anonymize
                        'user_id': 'USER_ID'

## https://developers.google.com/analytics/devguides/collection/gtagjs/cross-domain
                        'linker': { 'domains': ['example-1.com', 'example-2.com'] }
## https://developers.google.com/analytics/devguides/collection/gtagjs/cross-domain
                        'linker': { 'accept_incoming': true }

## https://developers.google.com/analytics/devguides/collection/gtagjs/custom-dims-mets
## siehe auch Event
                        'custom_map': {'dimension2': 'age'}

## https://developers.google.com/analytics/devguides/collection/gtagjs/ip-anonymization
                        'anonymize_ip': true
                    }
                );

## https://developers.google.com/analytics/devguides/collection/gtagjs/
                gtag('config', 'GA_MEASUREMENT_ID_2');

## https://developers.google.com/gtagjs/devguide/snippet
                gtag('config', 'AW-CONVERSION_ID');

## https://developers.google.com/gtagjs/devguide/snippet
                gtag('config', 'DC-FLOODLIGHT_ID');

## https://developers.google.com/analytics/devguides/collection/gtagjs/events
                gtag('event', <action>, { 'event_category': <category>, 'event_label': <label>, 'value': <value> });

## https://developers.google.com/analytics/devguides/collection/gtagjs/user-timings
                // Feature detects Navigation Timing API support.
                if (window.performance) {
                    // Gets the number of milliseconds since page load
                    // (and rounds the result since the value must be an integer).
                    var timeSincePageLoad = Math.round(performance.now());

                    // Sends the timing event to Google Analytics.
                    gtag('event', 'timing_complete', {
                        'name': 'load',
                        'value': timeSincePageLoad,
                        'event_category': 'JS Dependencies'
                    });
                }

## https://developers.google.com/analytics/devguides/collection/gtagjs/exceptions
                gtag('event', 'exception', {
                    'description': 'error_description',
                    'fatal': false   // set to true if the error is fatal
                });

## https://developers.google.com/analytics/devguides/collection/gtagjs/custom-dims-mets
                gtag ('event', 'age_dimension', {'age': 12});

## https://developers.google.com/analytics/devguides/collection/gtagjs/ecommerce
## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
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

## https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce
                gtag('event', 'set_checkout_option', {
                    "checkout_step": 1,
                    "checkout_option": "shipping method",
                    "value": "USPS"
                });


            </script>

---------------------------------------------------------------------

            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=[{$oD3GASettings->getValue('sD3GAId')}]"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '[{$oD3GASettings->getValue('sD3GAId')}]' [{$sD3GACreateParameter}]);

                [{include file="d3ga_gtag_ecommerce.tpl"}]
            </script>

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

                [{include file="d3ga_universal_adwords.tpl"}]

                [{include file="d3ga_universal_custom.tpl"}]

                [{if $oD3GASettings->getValue('blD3GAUseRemarketing')}]
                    ga('require', 'displayfeatures');
                [{/if}]

                [{* bounce optimization*}]
                [{block name="d3ga_bounceoptimization"}]
                    [{if $oD3GASettings->getValue('blUseBounceRateOptimization')}]
                        setTimeout('ga(\'send\', \'event\', \'NoBounce\', \'Over defined seconds\')',[{$iD3GASendNoBounceEventTime}]);

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
                    [{/if}]
                [{/block}]

                ga('send', 'pageview' [{$sD3GASendPageViewParameter}]);

                [{*[{include file="d3ga_universal_ecommerce.tpl"}]*}]

                [{if $oD3GASettings->getValue('blD3GATrackPageLoadTime')}]
                    [{block name="d3ga_trackpageloadtime"}]
                        var perfData = window.performance.timing;
                        var pageLoadTime =
                            Math.round(
                                (
                                    (perfData.domComplete > 0 ? perfData.domComplete : perfData.responseEnd) - perfData.navigationStart
                                ) / 1000
                            );

                        ga('set', 'metric1', pageLoadTime);
                        [{*ga('send', 'event', 'Page Load Time', loadTime, {'nonInteraction': true});*}]
                    [{/block}]
                [{/if}]
            </script>

        [{/strip}]
    [{/capture}]

    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        [{$oView->logCode($smarty.capture.d3GATrackCode)}]
    [{/if}]

    [{$smarty.capture.d3GATrackCode}]
[{/if}]