<?php

/**
 *    This module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This module is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    For further informations, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxidmodule.com
 * @link      http://www.shopmodule.com
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 */

$sLangName = "English";

// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                                                      => 'UTF-8',
    'd3mxgoogleanalytics'                                          => "<i class='fa fa-google'></i> Google Services",
    'd3mxgoogleanalytics_settings'                                 => 'Settings',
    'd3tbclgoogleanalytics_main'                                   => 'Analytics',
    'd3tbclgoogleanalytics_adwords'                                => 'AdWords',
    'd3tbclgoogleanalytics_trustedstore'                           => 'Trusted Store',

    'D3_GOOGLEANALYTICS_CFG_TITLE'                                 => 'Google Services Connector - Settings',

    'D3_GOOGLEANALYTICS_MAIN'                                      => 'Main Settings',
    'D3_GOOGLEANALYTICS_MAIN_DEBUG'                                => 'Aktivieren Sie mit dem Schalter den Debugmodus.'.
        ' Nach dem erfolgreichen &Uuml;bertragen des Trackingcodes erhalten Sie eine Meldung im Browser gezeigt. '.
        'Deaktivieren Sie die Funktion f&uuml;r den Livebetrieb.',

    'D3_GOOGLEANALYTICS_DESC'                                      => 'Diese Einstellungen betreffen den Dienst '.
        '<a href="http://www.google.com/analytics/" target="_blank">"Google Analytics"</a>. '.
        'Möchten Sie diesen nutzen, melden Sie sich auf der Webseite dafür an.',
    'D3_GOOGLEANALYTICS_DESC1'                                     => 'Während der Anmeldung werden Sie aufgefordert, '.
        'einen Trackingcode in den Quelltext Ihrer Seite einzukopieren. Dies erledigt das vorliegende Modul für Sie. '.
        'Die Einstellungen zum Trackingcode nehmen Sie ebenfalls hier vor.',
    'D3_GOOGLEANALYTICS_MAIN_GATYPE'                               => 'Tracking code type',
    'D3_GOOGLEANALYTICS_MAIN_GATYPE_UNIVERSAL'                     => 'Universal',
    'D3_GOOGLEANALYTICS_MAIN_GATYPE_UNIVERSAL_DESC'                => 'F&uuml;r den Wechsel auf den Universal-'.
        'Analytics-Trackingcode sind vorab &Auml;nderungen in Ihrem Analytics-Konto durchzuf&uuml;hren. Bitte '.
        'konsultieren Sie vorab den Analytics-Migrationsleitfaden. Den Link finden Sie im Erkl&auml;rungstext '.
        'dieser Option.\\n\\nBitte beachten Sie, dass mit Wechsel des Trackingcodes m&ouml;glicherweise andere '.
        'Optionen im Modul verf&uuml;gbar sind. Kontrollieren Sie diese bitte noch einmal.',
    'D3_GOOGLEANALYTICS_MAIN_GATYPE_ASYNC'                         => 'asynchron',
    'D3_GOOGLEANALYTICS_MAIN_GATYPE_ASYNC_DESC'                    => 'Ein Wechsel vom neuen Universal-Analytics-'.
        'Trackingcode zum bisherigen asynchronen Trackingcode wird von Google nicht angeboten. &Auml;ndern Sie diese '.
        'Einstellung nur, wenn Ihr Analytics-Account noch auf dem asynchronen Trackingcode basiert.\\n\\nBitte '.
        'beachten Sie, dass mit Wechsel des Trackingcodes m&ouml;glicherweise andere Optionen im Modul verf&uuml;gbar '.
        'sind. Kontrollieren Sie diese bitte noch einmal.',
    'D3_GOOGLEANALYTICS_MAIN_GATYPE_DESC'                          => 'Aktuell priorisiert Google den Trackingtyp '.
        '"Universal". Setzen Sie hier den Typ, den Sie in Ihrem Analytics-Konto auch verwenden. Nutzen Sie noch den '.
        'asynchronen Trackingcode, lesen Sie vor der Umstellung den <a href="'.
        'https://support.google.com/analytics/answer/3450662?hl=de" target="gahelp">Leitfaden</a> zum Wechsel.<br><br>'.
        'Manche der folgenden Optionen stehen Ihnen nur f&uuml;r einen Tracking-Typ zur Verf&uuml;gung und sind daher '.
        'm&ouml;glicherweise ausgegraut.',
    'D3_GOOGLEANALYTICS_MAIN_GAID'                                 => 'Analyics id',
    'D3_GOOGLEANALYTICS_MAIN_GAID_DESC'                            => 'F&uuml;gen Sie hier die Google Analytics '.
        'Konto-ID ein. Diese finden Sie in Ihrem GA-Konto und beginnt im Normalfall mit "UA-".',
    'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP'                          => 'IP-Adressen anonymisiert &uuml;bertragen '.
        '(dringend empfohlen)',
    'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC'                     => '<p>Die IP-Adressen Ihrer Shopbesucher werden '.
        'anonymisiert. Zwar werden dadurch die Gebietszuordnungen etwas ungenauer. Jedoch k&ouml;nnen Sie nur mit '.
        'dieser Einstellung den Datenschutzvorschriften in Deutschland entsprechen.</p><p>Weitere Informationen zu '.
        'dieser Option finden Sie in der '.
        '<a href="https://www.google.de/search?q=Analytics+anonymizeIp" target="gahelp">Google-Suche</a>.</p>',
    'D3_GOOGLEANALYTICS_MAIN_SAMPLERATE'                           => "Tracking auswerten bei...",
    'D3_GOOGLEANALYTICS_MAIN_SAMPLERATE_DESC'                      => '<p>Im Regelfall werden die &uuml;bertragenen '.
        'Daten f&uuml;r alle Seitenbesucher ausgewertet und aufbereitet. Shops mit sehr hohem Besucheraufkommen '.
        'geraten hiermit jedoch m&ouml;glicherweise an Limitierungen, die von Google gesetzt werden. Mit diesem Wert '.
        'k&ouml;nnen Sie einstellen, wieviel Prozent der Besucherdaten von Google tats&auml;chlich ausgewertet werden '.
        'sollen. Reduzieren Sie die Zahl, um Beschr&auml;nkungen zu umgehen.</p><p>Weitere Informationen zu '.
        'dieser Option finden Sie in der <a href="https://www.google.de/search?q=Analytics+sampleRate+-siteSpeed" '.
        'target="gahelp">Google-Suche </a>.</p>',
    'D3_GOOGLEANALYTICS_MAIN_SAMPLERATE_1'                         => "% aller Besucher",
    'D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME'                    => 'Seitenladezeit mit &uuml;bertragen',
    'D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME_DESC'               => '<p>Die Ladezeit Ihrer Seite ist, speziell auch '.
        'in Hinblick auf verschiedene L&auml;nder, durchaus ein Faktor, der in das Ranking Ihrer Page einfliesst.<br>'.
        '<br>Bei Universal-Analytics wird die Seitenladezeit generell &uuml;bertragen. Durch die Aktivierung dieser '.
        'Option wird eine genauere Auswertung zus&auml;tzlich als Event &uuml;bergeben.</p><p>Weitere Informationen '.
        'zu dieser Option finden Sie in der <a href="https://www.google.de/search?q=Analytics+track+page+load+time" '.
        'target="gahelp">Google-Suche </a>.</p>',
    'D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE'                  => "Seitengeschwindigkeit messen bei...",
    'D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE_DESC'             => '<p>Die Seitenladegeschwindigkeit wird nicht '.
        'bei jedem Seitenaufruf gemessen. Bei wenig frequentierten Seiten verzerrt dies jedoch das Ergebnis. Soll der '.
        'Standardwert von 1% ge&auml;ndert werden, tragen Sie den gew&uuml;nschten Wert hier ein. F&uuml;r Webseiten '.
        'mit mehr als 1 Million Besuchern pro Tag wird dieser Wert von Google fix auf 1% gestellt.</p><p>Weitere '.
        'Informationen zu dieser Option finden Sie in der '.
        '<a href="https://www.google.de/search?q=Analytics+site+speed+sample+rate" target="gahelp">Google-Suche </a>.'.
        '</p>',
    'D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE_1'                => "% aller Besucher",
    'D3_GOOGLEANALYTICS_MAIN_USEREMARKETING'                       => 'Remarketing-Auswertung erm&ouml;glichen',
    'D3_GOOGLEANALYTICS_MAIN_USEREMARKETING_DESC'                  => '<p>Wenn Sie sich entschlie&szlig;en, '.
        'Remarketing zu nutzen, setzen Sie diesen Haken. Nachdem Sie diese &Auml;nderung vorgenommen haben, '.
        'erfasst und analysiert Google Analytics neben den &uuml;blichen Informationen auch das DoubleClick-Cookie, '.
        'sofern vorhanden. Das DoubleClick-Cookie erm&ouml;glicht Remarketing im Google Display-Netzwerk f&uuml;r '.
        'Produkte wie AdWords. Je nach verwendetem Tracking-Typ muss die Erfassung von Informationen aus dem Display-'.
        'Netzwerk im Analytics-Konto aktiviert werden.</p><p>Weitere '.
        'Informationen zu dieser Option finden Sie in der '.
        '<a href="https://www.google.de/search?q=Analytics+require+displayfeatures" target="gahelp">Google-Suche </a>.'.
        '</p>',

    'D3_GOOGLEANALYTICS_BOUNCEOPT'                                 => 'Bounce rate optimzation',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SWITCH'                          => 'Absprungdaten-Optimierung aktivieren',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SWITCH_DESC'                     => 'Analytics wertet jeden Benutzer, der nicht '.
        'innerhalb der Seite einen Link anklickt, als Abbrecher. Mit dieser Option kann der Wert optimiert werden.',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SENDTIMEEVENT1'                  => 'Seitenbesucher nicht als Abbrecher werten nach',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SENDTIMEEVENT2'                  => 'Millisekunden (1000 = 1 Sekunde)',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SENDTIMEEVENT_DESC'              => '<p>Analytics wertet alle Seitenbucher, die '.
        'sich nur eine Seite angesehen habe und dann den Shop verlassen, automatisch als Abbrecher. Zur '.
        'Informationsbeschaffung reicht dem Kunden jedoch möglicherweise dieser eine Seitenbesuch aus. Sein Ziel '.
        'konnte er erreichen. Demnach ist er eigentlich kein Abbrecher. Das Modul sendet automatisch nach der '.
        'angegebenen Sekundenzahl ein EventTracking. Damit wertet Analytics diesen Besucher nur als Abbrecher, wenn '.
        'er den Shop vor Ablauf dieser Zeit wieder verlässt. Verweilt er länger im Shop, wird der Besuch dann als '.
        'Erfolg gewertet.</p><p>Diese Tracking-Veränderung stellt die Absprungrate daher im Analytics wesentlich '.
        'genauer dar. Der Standardwert ist auf 10 Sekunden gesetzt. Ändern Sie bei Bedarf diese Angabe.</p><p>Weitere '.
        'Informationen zu dieser Option finden Sie in der '.
        '<a href="https://www.google.de/search?q=Analytics+_trackEvent+noBounce" target="gahelp">Google-Suche</a>.</p>',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SENDSCROLLEVENT'                 => 'Seitenbesucher nicht als Abbrecher werten, '.
        'wenn gescrollt wurde',
    'D3_GOOGLEANALYTICS_BOUNCEOPT_SENDSCROLLEVENT_DESC'            => '<p>Analytics wertet alle Seitenbucher, die '.
        'sich nur eine Seite angesehen habe und dann den Shop verlassen, automatisch als Abbrecher. Zur '.
        'Informationsbeschaffung reicht dem Kunden jedoch möglicherweise dieser eine Seitenbesuch aus. Sein Ziel '.
        'konnte er erreichen. Demnach ist er eigentlich kein Abbrecher. Das Modul sendet automatisch ein '.
        'EventTracking, wenn der Besucher die Seite gescrollt hat. Damit wertet Analytics diesen Besucher nur als '.
        'Abbrecher, wenn er den Shop ohne Scrollen wieder verlässt.</p><p>Diese Tracking-Veränderung stellt die '.
        'Absprungrate daher im Analytics wesentlich genauer dar.</p><p>Weitere Informationen zu dieser Option finden '.
        'Sie in der <a href="https://www.google.de/search?q=_trackEvent+noBounce+scroll" target="gahelp">Google-Suche'.
        '</a>.</p>',

    'D3_GOOGLEANALYTICS_ECOMMERCE'                                 => 'eCommerce settings',
    'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA'                        => 'eCommerce-Daten &uuml;bertragen',
    'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA_DESC'                   => '<p>Mit dieser Einstellung werden '.
        'Warenkorbdaten Ihrer Kunden an Analytics &uuml;bertragen. Damit k&ouml;nnen Sie z.B. die Produktleistung und '.
        'Umsatzzahlen ermitteln. Diese Option muss auch in Ihrem Analytics-Konto aktiviert werden.</p><p>Weitere '.
        'Informationen zu dieser Option finden Sie in der '.
        '<a href="https://www.google.de/search?q=Analytics+ecommerce+tracking" target="gahelp">Google-Suche </a>.</p>',
    'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO'                        => 'Netto-Preise &uuml;bertragen, wenn '.
        'verf&uuml;gbar',
    'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO_DESC'                   => 'Betreiben Sie einen B2B-Shop, &uuml;bertragen '.
        'Sie Ihre Artikelpreise netto an Analytics, wenn diese auch im Shop ohne Steuer zur Verf&uuml;gung stehen. ',

    'D3_GOOGLEANALYTICS_DOMAIN'                                    => 'Multi-Domain-Einstellungen',
    'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER'                     => 'Trackingdaten von unterschiedlichen Domains '.
        'verwenden',
    'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER_DESC'                => '<p>Cross Domain Tracking erlaubt das Sammeln '.
        'von Trackinginformationen auch &uuml;ber verschiedene Domains hinweg.</p><p>Weitere Informationen finden '.
        'Sie <a href="https://www.google.de/search?q=Analytics+_setAllowLinker" target="gahelp">hier</a>.</p>',
    'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME'                      => 'fixiert das Tracking-Cookie auf die angegebene '.
        'Domain (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME_DESC'                 => '<p>Lassen Sie dieses Feld leer, ist das '.
        'Tacking-Cookie f&uuml;r unterschiedliche Seiten g&uuml;ltig. Wenn Sie statt dessen eine Domain angeben, ist '.
        'das gesetzte Cookie nur f&uuml;r Seiten unter dieser Domain g&uuml;ltig. Andere zu trackende Seiten setzen '.
        'dann ein neues Cookie.<br><br>Der Eintrag sollte hier so aussehen: .yourDomainName.com</p><p>Weitere '.
        'Informationen finden Sie <a href="https://www.google.de/search?q=Analytics+_setDomainName" target="gahelp">'.
        'hier</a>.</p>',
    'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH'                      => 'Tracking nur auf ein Verzeichnis '.
        'beschr&auml;nken (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH_DESC'                 => '<p>Ein Eintrag hier sollte so aussehen: '.
        '/myStore/</p><p>Weitere Informationen finden Sie '.
        '<a href="https://www.google.de/search?q=Analytics+set+Cookie+Path" target="gahelp">hier</a>.</p>',
    'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY'                     => 'Cookie Informationen werden in das Verzeichnis '.
        'der selben Domain kopiert (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY_DESC'                => '<p>Ein Eintrag hier sollte so aussehen: '.
        '/myStore/<br>Diese Option ist nur f&uuml;r den asynchronen Trackingcode verf&uuml;gbar.</p><p>Weitere '.
        'Informationen finden Sie <a href="https://www.google.de/search?q=Analytics+set+Cookie+Path" target="gahelp">'.
        'hier</a>.</p>',

    'D3_GOOGLEANALYTICS_BROWSER'                                   => 'Browser-Daten',
    'D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO'                     => '<span style="font-weight: bold;">Deaktiviert'.
        '</span> die Erkennung von Browserdaten (z.B. Name und Version). Diese Einstellung steht f&uuml;r Universal '.
        'Analytics nicht mehr zur Verf&uuml;gung',
    'D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO_DESC'                => 'Weitere Informationen finden Sie '.
        '<a href="https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiWebClient?hl=es#'.
        '_gat.GA_Tracker_._getClientInfo" target="gahelp">hier</a>. Diese Einstellung steht f&uuml;r Universal '.
        'Analytics nicht mehr zur Verf&uuml;gung',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH'                    => '<span style="font-weight: bold;">Unterbindet'.
        '</span> die Erkennung, ob beim Kunden das Flash-Plugin installiert ist.',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH_DESC'               => 'Weitere Informationen finden Sie '.
        '<a href="https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiWebClient?hl=es#'.
        '_gat.GA_Tracker_._setDetectFlash" target="gahelp">hier</a>. Diese Einstellung steht f&uuml;r Universal '.
        'Analytics nicht mehr zur Verf&uuml;gung',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE'                    => '<span style="font-weight: bold;">Verhindert'.
        '</span> die Erkennung des Seitentitels.',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE_DESC'               => 'Weitere Informationen finden Sie '.
        '<a href="https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiWebClient?hl=es#'.
        '_gat.GA_Tracker_._setDetectTitle" target="gahelp">hier</a>. Diese Einstellung steht f&uuml;r Universal '.
        'Analytics nicht mehr zur Verf&uuml;gung',

    'D3_GOOGLEANALYTICS_ANALYTICSREMARKETING'                      => 'Remarketing (via Analytics)',
    'D3_GOOGLEANALYTICS_ANALYTICSREMARKETING_TRANSMIT'             => 'Remarketingdaten als individuelle Daten &uuml;bertragen',
    'D3_GOOGLEANALYTICS_ANALYTICSREMARKETING_TRANSMIT_DESC'        => 'Aktivieren Sie die Option, wenn Sie die '.
        'Remarketingdaten au&szlig;erhalb von AdWords &uuml;bertragen m&ouml;chten. Diese werden dann als '.
        'individuelle Daten gesendet. Richten Sie die Dimensionen so ein, wie dies unter '.
        '<a href="https://support.google.com/analytics/answer/3455600?hl=de&ref_topic=3455490" target="gahelp">dem '.
        'Google-Beitrag</a> beschrieben ist.<br>Zus&auml;tzliche &quot;individuelle Daten&quot; werden dann ab der '.
        '4. Dimension &uuml;bermittelt.',

    'D3_GOOGLEANALYTICS_CUSTOMVARS'                                => 'individuelle Daten',
    'D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT'                       => 'individuelle Daten &uuml;bertragen',
    'D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT_DESC'                  => 'Mit individuellen Daten k&ouml;nnen Sie '.
        'Parameter &uuml;bermitteln, die sonst im Rahmen des Trackingcodes nicht gesammelt werden. Erg&auml;nzen Sie '.
        'den entsprechenden Abschnitt im Template "modules/d3/d3_googleanalytics/views/tpl/widget/'.
        'd3_googleanalytics.tpl" (f&uuml;r Async) oder "modules/d3/d3_googleanalytics/views/tpl/widget/inc/'.
        'd3ga_universal_custom.tpl" (f&uuml;r Universal) um die gew&uuml;nschten Daten. Details F&uuml;r die '.
        'Einrichtung der Datenaufzeichnung bei Analytics entnehmen Sie bitte der Moduldokumentation.<br><br>Weitere '.
        'Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/'.
        'gaTrackingCustomVariables.html" target="gahelp">hier</a>.<br>Auf Anregung durch <a href="http://'.
        'www.commodule.de/blog/tracking/zahlungsarten-in-google-analytics-tracken/" target="Commodule">Commodule-Blog'.
        '</a> haben wir nun noch weitere Beispiele hinterlegt. Vielen Dank f&uuml;r diese Unterst&uuml;tzung!',

    'D3_GOOGLEANALYTICS_SECURITYINFORMATIONS'                      => 'Im CMS-Baustein "Analytics_Security_'.
        'Informations" ist ein Text hinterlegt, den Sie Ihren Kunden unter Ihrer Datenschutzerkl&auml;rung '.
        'verf&uuml;gbar machen sollten. Kl&auml;ren Sie jedoch bitte vor Verwendung von Google Analytics Tracking und '.
        'diesem Hinweistext ab, ob beides mit den Datenschutzbestimmung Ihres Landes konform geht. '.
        'Ausschlie&szlig;lich der Shopbetreiber haftet f&uuml;r Verst&ouml;&szlig;e. Beraten Sie sich im Zweifel mit '.
        'Ihrem Rechtsanwalt.<br><br>Nach Aktivierung des Tracking-Codes dauert es in der Regel ca. 24 Stunden, bis '.
        'die ersten Tracking-Daten in Analytics zur Verf&uuml;gung stehen.',

    'D3_GOOGLEANALYTICS_ADWORDSGENERAL'                            => 'Conversion-Tracking',
    'D3_GOOGLEANALYTICS_ADWORDS_SETCONVERSIONTRACKING'             => 'Conversion-Tracking-Code aktivieren',
    'D3_GOOGLEANALYTICS_ADWORDS_SETCONVERSIONTRACKING_DESC'        => 'Diese Option aktiviert den AdWords-Code. Dann '.
        'ist die Eingabe der Conversion-ID und des Conversion-Labels obligatorisch.',
    'D3_GOOGLEANALYTICS_ADWORDS_CONVID'                            => 'Conversion-ID',
    'D3_GOOGLEANALYTICS_ADWORDS_CONVID_DESC'                       => '<p>Diese ID finden Sie in Ihrem AdWords-Konto.'.
        '</p><p>Weitere Informationen zu '.
        'dieser Option finden Sie in der <a href="https://www.google.de/search?q=AdWords+conversion+id" '.
        'target="gahelp">Google-Suche</a>.</p>',
    'D3_GOOGLEANALYTICS_ADWORDS_CONVLABEL'                         => 'Conversion-Label',
    'D3_GOOGLEANALYTICS_ADWORDS_CONVLABEL_DESC'                    => '<p>Weitere Informationen zu '.
        'dieser Option finden Sie in der <a href="https://www.google.de/search?q=AdWords+conversion+label" '.
        'target="gahelp">Google-Suche</a>.</p>',

    'D3_GOOGLEANALYTICS_ADWORDS_DESC'                              => 'Diese Einstellungen betreffen den Dienst '.
        '<a href="http://www.google.de/AdWords" target="_blank">"Google Adwords"</a>. '.
        'Möchten Sie diesen nutzen, melden Sie sich auf der Webseite dafür an.',
    'D3_GOOGLEANALYTICS_ADWORDS_DESC1'                             => 'Während der Anmeldung werden Sie aufgefordert, '.
        'einen Trackingcode in den Quelltext Ihrer Seite einzukopieren. Dies erledigt das vorliegende Modul für Sie. '.
        'Die Einstellungen zum Trackingcode nehmen Sie ebenfalls hier vor.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN'                               => 'Kampagnen-Tracking',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK'              => 'AdWords-Kampagnendaten <span style="'.
        'font-weight: bold;">nicht</span> &uuml;bertragen',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK_DESC'         => 'Das Kampagnentracking ist im Standard '.
        'aktiviert. Setzen Sie diesen Haken, um die Kampagnen&uuml;bertragung zu deaktivieren.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT'      => 'Kampagnenlaufzeit (optional, sonst 6 Monate) - '.
        'nur f&uuml;r Async-Code',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_DESC' => 'Geben Sie hier eine optionale Laufzeit dieser '.
        'Kampagne in Millisekunden an.<br><br>30 Tage = 2592000000<br>365 Tage = 31536000000<br><br>F&uuml;r '.
        'Universal Analytics tragen Sie diesen Wert bitte in Ihrem Analytics-Konto nach.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_MS'   => 'Millisekunden',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY'                  => 'erzwinge Verwendung der folgenden Kampagne',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY_DESC'             => 'die hier festgelegte Kampagne wird zwingend '.
        'verwendet, auch wenn die Cookie-Einstellungen schon eine andere Kampagne liefern.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPIDKEY'                  => 'Kampagnen-ID (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPIDKEY_DESC'             => 'Geben Sie hier die ID dieser Kamapagne an.<br>'.
        '<br>Weitere Informationen finden Sie hier: <ul><li>Universal: <a href="https://developers.google.com/'.
        'analytics/devguides/collection/analyticsjs/field-reference#campaignId" target="gahelp">hier</a></li></ul>'.
        'Diese Angabe ist nur in Universal Analytics verf&uuml;gbar.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY'                => 'Kampagnenname (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY_DESC'           => 'Unter diesem Namen sehen Sie die Auswertung '.
        'der Daten aus dieser Shopkampagne in Analytics.<br><br>Weitere Informationen finden Sie hier: <ul><li>Async: '.
        '<a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._'.
        'setCampNameKey" target="gahelp">hier</a></li><li>Universal: <a href="https://developers.google.com/analytics/'.
        'devguides/collection/analyticsjs/field-reference#campaignName" target="gahelp">hier</a></li></ul>',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY'              => 'Kampagnenmedium (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY_DESC'         => 'Definieren Sie das Medium dieser Kampagne '.
        '(z.B. Werbebanner, Mailkampagne oder auch Klickkampagne). Diese Einstellung finden Sie in der Kampagnen'.
        'auswertung unter "Keywords".<br><br>Weitere Informationen finden Sie hier: <ul><li>Async: <a href="http://'.
        'code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampMediumKey" '.
        'target="gahelp">hier</a></li><li>Universal: <a href="https://developers.google.com/analytics/devguides/'.
        'collection/analyticsjs/field-reference#campaignMedium" target="gahelp">hier</a></li></ul>',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY'              => 'Kampagnenquelle (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY_DESC'         => 'Benennen Sie hier die Quelle der Shopkampagne, '.
        'vergeben Sie zum Beispiel den Webseiten-Name oder den Firmenname.<br><br>Weitere Informationen finden Sie '.
        'hier: <ul><li>Async: <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#'.
        '_gat.GA_Tracker_._setCampSourceKey" target="gahelp">hier</a></li><li>Universal: <a href="https://developers.'.
        'google.com/analytics/devguides/collection/analyticsjs/field-reference#campaignSource" target="gahelp">hier'.
        '</a></li></ul>',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY'                => 'Schl&uuml;sselwort(e) Ihrer Kampagne (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY_DESC'           => 'Auch diese Keywords erscheinen in Analytics '.
        'unter "Keywords".<br><br>Weitere Informationen finden Sie hier: <ul><li>Async: <a href="http://code.google.'.
        'com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampTermKey" target="gahelp">'.
        'hier</a></li><li>Universal: <a href="https://developers.google.com/analytics/devguides/collection/analyticsjs'.
        '/field-reference#campaignKeyword" target="gahelp">hier</a></li></ul>',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY'             => 'Inhaltsbeschreibung der Kampagne (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY_DESC'        => 'Den beschrieben Inhalt finden Sie in der '.
        'Auswertung als "Ad Content".<br><br>Weitere Informationen finden Sie hier: <ul><li>Async: <a href="http://'.
        'code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampContentKey" '.
        'target="gahelp">hier</a></li><li>Universal: <a href="https://developers.google.com/analytics/devguides/'.
        'collection/analyticsjs/field-reference#campaignContent" target="gahelp">hier</a></li></ul>',

    'D3_GOOGLEANALYTICS_ADWORDSREMARKETING'                        => 'Remarketing (via AdWords)',
    'D3_GOOGLEANALYTICS_ADWORDS_SETREMARKETING'                    => 'Remarketing-Code aktivieren',
    'D3_GOOGLEANALYTICS_ADWORDS_SETREMARKETING_DESC'               => 'Die Option aktiviert den Remarketing-Code. '.
        'Dann ist die Eingabe der Conversion-ID obligatorisch.',
    'D3_GOOGLEANALYTICS_ADWORDS_REMARKETINGCONVID'                 => 'Remarketing Conversion-ID',
    'D3_GOOGLEANALYTICS_ADWORDS_REMARKETINGCONVID_DESC'            => 'Tragen Sie hier die zu Ihrem eingerichteten '.
        'Remarketing zugehörige Conversion-ID ein. Diese kann mit Ihrer AdWords-Conversion-Tracking-ID identisch '.
        'sein. Auch Abweichungen sind möglich.',
    'D3_GOOGLEANALYTICS_ADWORDS_REMARKETINGCONVLABEL'              => 'Remarketing Conversion-Label (optional)',

    'd3tbclgoogleanalytics_campaigns'                              => 'andere Kampagnen',
    'D3_GOOGLEANALYTICS_CAMPAIGNS_DESC'                            => 'Diese Einstellungen betreffen andere (auch '.
        'google-fremde) Kampagnen, die mit den Leistungen des Moduls nicht abgedeckt sind. Details zu den Kampagnen '.
        'und dessen Implementierung erhalten Sie beim jeweiligen Anbieter.',
    'D3_GOOGLEANALYTICS_CAMPAIGNS_DESC1'                           => 'Während der Anmeldung werden Sie aufgefordert, '.
        'einen Trackingcode in den Quelltext Ihrer Seite einzukopieren. Konfigurieren Sie diesen bei Ihem '.
        'Kampagnenanbieter und tragen Sie diesen dann hier ein das Eingabefeld ein.',
    'D3_GOOGLEANALYTICS_CAMPAIGNSETTINGS'                          => 'Kampagnen-Einstellungen',
    'D3_GOOGLEANALYTICS_SETCAMPAIGNTRACK'                          => 'Kampagnencode übertragen',
    'D3_GOOGLEANALYTICS_SETCAMPAIGNTRACK_DESC'                     => 'Nur mit dieser Option wird der eingegebene '.
        'Kampagnencode ausgeliefert',
    'D3_GOOGLEANALYTICS_SETCAMPAIGNTHANKYOUONLY'                   => 'Kampagnendaten nur in Bestellabschlussseite '.
        'verwenden',
    'D3_GOOGLEANALYTICS_SETCAMPAIGNTHANKYOUONLY_DESC'              => 'Ist dieser Haken nicht gesetzt, wird der '.
        'Kampagnencode shopweit eingef&uuml;gt. Ob diese Einstellung notwendig ist, erfahren Sie bei Ihrem Conversion '.
        'Tracking Anbieter.',
    'D3_GOOGLEANALYTICS_CAMPAIGNCODE_CODE'                         => 'Code',
    'D3_GOOGLEANALYTICS_CAMPAIGNCODE_CODE_DESC'                    => 'Kopieren Sie hier den Kampagnen-Tracking-Code '.
        'ein, den Sie vom Anbieter erhalten haben. Kopieren Sie auch ein eventuell vorhandenes "script"-Tag mit. '.
        'Dieser Code wird 1:1 in den Seitenquelltext eingef&uuml;gt und nicht geparst.',

    'D3_GOOGLEANALYTICS_TS_DESC'                                   => 'Diese Einstellungen betreffen den Dienst '.
        '<a href="http://www.google.com/trustedstores/" target="_blank">"Google Zertifizierter Händler"</a>. '.
        'Möchten Sie diesen nutzen, melden Sie sich auf der Webseite dafür an.',
    'D3_GOOGLEANALYTICS_TS_DESC1'                                  => 'Während der Aktivierung werden Sie '.
        'aufgefordert, einen Trackingcode in den Quelltext Ihrer Seite einzukopieren. Dieser wird von unserem Modul '.
        'eingebunden. Damit können Sie die Qualifizierungsphase starten. Erst nach erfolgreicher Beendigung sehen Sie '.
        'das "Google Zertifizierter Händler"-Siegel. Über dessen Darstellung entscheidet allein Google.',
    'D3_GOOGLEANALYTICS_TS_ACTIVE'                                 => 'activate "Trusted Store" in shop',
    'D3_GOOGLEANALYTICS_TS_ACTIVE_DESC'                            => 'Dieser Haken bindet die nötigen Trackingcodes '.
        'in den Quelltext Ihres Shops ein. Ob Sie das Gütesiegel im Shop sehen, entscheidet jedoch nur Google intern. '.
        'Sind Sie der Meinung, das Siegel sollte angezeigt werden, wenden Sie sich bitte an Ihren Betreuer bei Google.',
    'D3_GOOGLEANALYTICS_TS_ID'                                     => 'account id',
    'D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER'                       => 'Zeitraum vom Bestelleingang bis zum Versand '.
        'bei lagernden Artikeln',
    'D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_DAYS'                  => 'Werktag(e)',
    'D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_DESC'                  => '<p>Google teilt Ihrem Kunden per Mail mit, '.
        'nach welchem Zeitraum ausgehend vom Bestelleingang die bestellten Artikel versendet werden. Geben Sie hier '.
        'den für am Lager befindlicher Artikel im Normalfall größten Zeitraum bis zum Versand in Tagen an (z.B. 3 bei '.
        '"1 bis 3 Tage"). Nach dem voraussichtlichen Versanddatum erhält der Kunde eine Umfrage zum abgeschlossenen '.
        'Kauf.</p><p>Fällt der errechnete Termin auf ein Wochenende oder einen festen Feiertag, wird der '.
        'nächstmögliche Termin verwendet. Bewegliche und regionale Feiertage werden nicht berücksichtigt. Um die '.
        'Liste der Ausnahmen anzupassen, erweitern Sie die Überladung der thankyou-Klasse entsprechend.</p><p>Die '.
        'Unterscheidung zwischen lagernden und nicht lagernden Artikeln wird nur bei aktivierter '.
        'Lagerstandsverwaltung getroffen. Sonst werden alle Artikel als "lagernd" angesehen.</p>',
    'D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_OUTOFSTOCK'            => 'Zeitraum vom Bestelleingang bis zum Versand '.
        'bei <b>nicht</b> lagernden Artikeln',
    'D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTEROUTOFSTOCK_DESC'        => '<p>Google teilt Ihrem Kunden per Mail mit, '.
        'nach welchem Zeitraum ausgehend vom Bestelleingang die bestellten Artikel versendet werden. Geben Sie hier '.
        'den für <b>nicht</b> am Lager befindlicher Artikel im Normalfall größten Zeitraum bis zum Versand in Tagen '.
        'an (z.B. 3 bei "1 bis 3 Tage"). Nach dem voraussichtlichen Versanddatum erhält der Kunde eine Umfrage zum '.
        'abgeschlossenen Kauf.</p><p>Fällt der errechnete Termin auf ein Wochenende oder einen festen Feiertag, '.
        'wird der nächstmögliche Termin verwendet. Bewegliche und regionale Feiertage werden nicht berücksichtigt. '.
        'Um die Liste der Ausnahmen anzupassen, erweitern Sie die Überladung der thankyou-Klasse entsprechend.</p>',
    'D3_GOOGLEANALYTICS_TS_ESTDELDATEAFTER'                        => 'Zeitraum vom Versand bis zur Lieferung beim '.
        'Empfänger',
    'D3_GOOGLEANALYTICS_TS_ESTDELDATEAFTER_DAYS'                   => 'Werktag(e)',
    'D3_GOOGLEANALYTICS_TS_ESTDELDATEAFTER_DESC'                   => '<p>Google teilt Ihrem Kunden per Mail mit, '.
        'nach welchem Zeitraum die bestellten Artikel in der Regel beim Kunden eintreffen. Geben Sie hier den für '.
        'Normalfälle größten Zeitraum für die Lieferung in Tagen an (z.B. 4 bei "1 bis 4 Tage"). Der errechnete '.
        'Termin wird dem Kunden per Mail mitgeteilt.</p><p>Fällt der errechnete Termin auf ein Wochenende oder einen '.
        'festen Feiertag, wird der nächstmögliche Termin verwendet. Bewegliche und regionale Feiertage werden nicht '.
        'berücksichtigt. Um die Liste der Ausnahmen anzupassen, erweitern Sie die Überladung der thankyou-Klasse '.
        'entsprechend.</p>',
    'D3_GOOGLEANALYTICS_TS_SHOPPING'                               => 'Verbindung zu Google Shopping',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGACTIVE'                         => 'zusätzliche Daten aus Google Shopping '.
        'übertragen',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGACTIVE_DESC'                    => 'Verwenden Sie Google Shopping und möchten '.
        'zusätzliche Daten zur Identifizierung übertragen, setzen Sie diesen Haken. Die folgenden Angaben sind dann '.
        'ebenfalls erforderlich.',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGACCOUNTID'                      => 'Google Shopping Kontonummer',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGACCOUNTID_DESC'                 => 'Tragen Sie hier die Kontonummer (Account ID) '.
        'aus Google Shopping ein.',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGCOUNTRY'                        => 'Kürzel des Landes Ihres Google Shopping-Kontos',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGCOUNTRY_DESC'                   => 'Geben Sie hier das Land Ihres Google Shopping '.
        'Kontos an. Erwartet wird der ISO-3166-Ländercode (z.B.: DE, CH, AT, FR).',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGLANGUAGE'                       => 'Kürzel der Sprache Ihres Google Shopping-Kontos',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGLANGUAGE_DESC'                  => 'Geben Sie hier die Sprache Ihres Google '.
        'Shopping Kontos an. Erwartet wird der ISO-639-1-Sprachcode (z.B.: de, en, fr).',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGARTID'                          => 'Identifikation Ihrer Artikel bei Google '.
        'Shopping',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGARTID_ARTNUM'                   => 'Artikelnummer (oxartnum)',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGARTID_OXID'                     => 'interne Ident-Nummer (oxid)',
    'D3_GOOGLEANALYTICS_TS_SHOPPINGARTID_DESC'                     => 'Über welches Feld kann Google Shopping die '.
        'dort hinterlegten Artikel identfizieren?',

    'D3_GOOGLEANALYTICS_METADATA_TITLE'                            => 'Google Services Schnittstelle',
    'D3_GOOGLEANALYTICS_METADATA_DESC'                             => 'Dieses Modul stellt Ihnen die schnelle und '.
        'unkomplizierte Einbindung Ihres Google-Analytics-Kontos in Ihren Shop zur Verf&uuml;gung. Hierbei werden '.
        '&uuml;ber standardisierte Schnittstellen die Besucherdaten und eCommerce-Daten zu Google &uuml;bertragen. '.
        'Ebenfalls &uuml;bermittelt werden Daten der Website-Suche.',
    'D3_GOOGLEANALYTICS_MAIN_USEOPTOUT'                            => 'Opt Out anbieten',
    'D3_GOOGLEANALYTICS_MAIN_USEOPTOUT_DESC'                       => '<p>Wird dieser Haken gesetzt, wird im Frontend '.
        'ein Opt-Out-Bereich im Header angezeigt. In dem Bereich kann der Benutzer einen Link anklicken, '.
        'mit dem das Tracking für diese Seite deaktiviert wird.</p><p>Weitere Informationen zu dieser Option finden '.
        'Sie in der <a href="https://www.google.de/search?q=Analytics+_opt+out+script" target="gahelp">Google-Suche'.
        '</a>.</p>',

    'D3_GOOGLEANALYTICS_ADBLOCKER' => 'AdBlocker detected - Please deactivate it for this page, because otherwise '.
        'parts of the admin area can not be loaded correctly.',

    // Erweiterung des Links in der Fussnote "Hilfe Starten"
    'D3_GOOGLEANALYTICS_HELPLINK' => 'Fragen-zu-speziellen-Modulen/Google-Analytics/',
);


/*
[{oxmultilang ident="GENERAL_YOUWANTTODELETE"}]
*/
