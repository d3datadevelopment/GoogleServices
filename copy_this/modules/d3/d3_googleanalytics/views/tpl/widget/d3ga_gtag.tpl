[{if $blD3GoogleAnalyticsActive && $oD3GASettings->getValue('sD3GAId')}]
    [{capture name="d3GATrackCode"}]
        [{*strip*}]
            [{if $oD3GASettings->getValue('blD3GAUseOptOut')}]
                [{block name="d3ga_optoutscript"}]
                    <script type="text/javascript">
                        let gaProperty = '[{$oD3GASettings->getValue('sD3GAId')}]';
                        let disableStr = 'ga-disable-' + gaProperty;
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/ *}]
[{* Global site tag (gtag.js) - Google Analytics *}]
            <script async src="https://www.googletagmanager.com/gtag/js?id=[{$oD3GASettings->getValue('sD3GAId')}]"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/setting-values *}]
                gtag('set', {
                    'currency': '[{$oD3GAActCurrency->name}]',
                });

                gtag(
                    'config', '[{$oD3GASettings->getValue('sD3GAId')}]',
                    {
[{* https://developers.google.com/analytics/devguides/collection/gtagjs/pages *}]
                        'page_title' : '[{$sD3GAPageTitle}]',
                        'page_location' : '[{$sD3GAPageLocation}]',
                        'page_path': '/[{$sD3GAPagePath}]',

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/cookies-user-id *}]
                        [{if $oD3GASettings->getValue('sD3GACookiePrefix')}]
                            'cookie_prefix': '[{$oD3GASettings->getValue('sD3GACookiePrefix')}]',
                        [{/if}]
                        [{if $oD3GASettings->getValue('sD3GACookieDomain')}]
                            'cookie_domain': '[{$oD3GASettings->getValue('sD3GACookieDomain')}]',
                        [{/if}]
                        [{if $oD3GASettings->getValue('sD3GACookieExpiration')}]
                            'cookie_expires': [{$oD3GASettings->getValue('sD3GACookieExpiration')}],  // in seconds
                        [{/if}]

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/cookies-user-id *}]
                        [{if $sD3GAUserId}]
                            'user_id': '[{$sD3GAUserId}]',
                        [{/if}]

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/cross-domain *}]
                        [{assign var="crossDomains" value=$oD3GASettings->getValue('sD3GACrossDomainDomain')}]
                        [{if $crossDomains|@count}]
                            'linker': { 'domains': ['[{"', '"|implode:$crossDomains}]'] },
                        [{/if}]

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/custom-dims-mets
    siehe auch Event *}]
                        [{assign var="dimensionList" value=$oD3GASettings->getValue('sD3GADimensionList')}]
                        [{if $dimensionList|@count || $oD3GASettings->getValue('blD3GATrackPageLoadTime')}]
                            'custom_map': {
                                [{if $oD3GASettings->getValue('blD3GATrackPageLoadTime')}]
                                    'metric1': 'pageLoadTime',
                                [{/if}]
                                [{if $dimensionList|@count}]
                                    [{foreach name="dimensions" from=$dimensionList item="dimensionTitle"}]
                                        'dimension[{$smarty.foreach.dimensions.iteration}]': '[{$dimensionTitle}]',
                                    [{/foreach}]
                                [{/if}]
                            },
                        [{/if}]

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/ip-anonymization *}]
                        [{if $oD3GASettings->getValue('blD3GAAnonymizeIP')}]
                            'anonymize_ip': true,
                        [{/if}]
                    }
                );

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/ *}]
[{* https://developers.google.com/gtagjs/devguide/snippet *}]
                [{assign var="additionalProperties" value=$oD3GASettings->getValue('sD3GAAdditionalProperties')}]
                [{if $additionalProperties|@count}]
                    [{foreach from=$additionalProperties item="addProp"}]
                        gtag('config', '[{$addProp}]');
                    [{/foreach}]
                [{/if}]

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/user-timings *}]
                [{if $oD3GASettings->getValue('blD3GATrackPageLoadTime')}]
                    // Feature detects Navigation Timing API support.
                    if (window.performance) {
                        // Gets the number of milliseconds since page load
                        // (and rounds the result since the value must be an integer).
                        let timeSincePageLoad = Math.round(performance.now());

                        // Sends the timing event to Google Analytics.
                        gtag('event', 'timing_complete', {
                            'name': 'load',
                            'value': timeSincePageLoad
                        });
                    }
                [{/if}]

                [{if $oD3GASettings->getValue('blD3GATrackPageLoadTime')}]
                    [{block name="d3ga_trackpageloadtime"}]
                        let perfData = window.performance.timing;
                        let pageLoadTime =
                            Math.round(
                                (
                                    (perfData.domComplete > 0 ? perfData.domComplete : perfData.responseEnd) - perfData.navigationStart
                                ) / 1000
                            );

                        gtag('event', 'trackPageLoadTime', {
                            'pageLoadTime': pageLoadTime
                        });
                    [{/block}]
                [{/if}]


                [{* bounce optimization*}]
                [{block name="d3ga_bounceoptimization"}]
                    [{if $oD3GASettings->getValue('blUseBounceRateOptimization')}]
                        setTimeout("gtag('event', 'NoBounce', {" +
                            "'event_category': 'Over defined seconds'" +
                            "})",[{$iD3GASendNoBounceEventTime}]);

                        [{if $oD3GASettings->getValue('blSendNoBounceEventScroll')}]
                            window.addEventListener ?
                                window.addEventListener('scroll', testScroll, false) :
                                window.attachEvent('onscroll', testScroll);

                            let scrollCount = 0;
                            function testScroll() {
                                ++scrollCount;
                                if (scrollCount === 2) {
                                    gtag('event', 'NoBounce', {
                                        'event_category': 'window scrolled'
                                    });
                                }
                            }
                        [{/if}]
                    [{/if}]
                [{/block}]

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/events *}]
[{* login, logout, toBasket, fromBasket, sendContact *}]
gtag('event', 'ACTION', { 'event_category': 'CATEGORY', 'event_label': 'LABEL', 'value': 'VALUE' });


[{* https://developers.google.com/analytics/devguides/collection/gtagjs/custom-dims-mets *}]
                gtag ('event', 'age_dimension', {'age': 12});

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/ecommerce *}]
[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
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

[{* https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-ecommerce *}]
                gtag('event', 'set_checkout_option', {
                    "checkout_step": 1,
                    "checkout_option": "shipping method",
                    "value": "USPS"
                });


            </script>

---------------------------------------------------------------------

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

                [{include file="d3ga_universal_adwords.tpl"}]

                [{include file="d3ga_universal_custom.tpl"}]

                [{*[{include file="d3ga_universal_ecommerce.tpl"}]*}]
            </script>

        [{*/strip*}]
    [{/capture}]

    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        [{$oView->logCode($smarty.capture.d3GATrackCode)}]
    [{/if}]

    [{$smarty.capture.d3GATrackCode}]
[{/if}]