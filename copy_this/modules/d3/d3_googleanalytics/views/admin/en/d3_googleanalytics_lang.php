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
    'charset'                                                      => 'ISO-8859-15',
    'd3mxgoogleanalytics'                                          => 'Google Analytics',
    'd3mxgoogleanalytics_settings'                                 => 'Settings',
    'd3tbclgoogleanalytics_main'                                   => 'Analytics',
    'd3tbclgoogleanalytics_adwords'                                => 'AdWords',

    'D3_GOOGLEANALYTICS_CFG_TITLE'                                 => 'Google Analytics Connector - Settings',

    'D3_GOOGLEANALYTICS_MAIN'                                      => 'Main Settings',
    'D3_GOOGLEANALYTICS_MAIN_DEBUG'                                => 'Aktivieren Sie mit dem Schalter den Debugmodus.'.
        ' Nach dem erfolgreichen &Uuml;bertragen des Trackingcodes erhalten Sie eine Meldung im Browser gezeigt. '.
        'Deaktivieren Sie die Funktion f&uuml;r den Livebetrieb.',
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
    'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC'                     => 'Die IP-Adressen Ihrer Shopbesucher werden '.
        'anonymisiert. Zwar werden dadurch die Gebietszuordnungen etwas ungenauer. Jedoch k&ouml;nnen Sie nur mit '.
        'dieser Einstellung den Datenschutzvorschriften in Deutschland entsprechen.',
    'D3_GOOGLEANALYTICS_MAIN_SAMPLERATE'                           => "Tracking auswerten bei...",
    'D3_GOOGLEANALYTICS_MAIN_SAMPLERATE_DESC'                      => 'Im Regelfall werden die &uuml;bertragenen '.
        'Daten f&uuml;r alle Seitenbesucher ausgewertet und aufbereitet. Shops mit sehr hohem Besucheraufkommen '.
        'geraten hiermit jedoch m&ouml;glicherweise an Limitierungen, die von Google gesetzt werden. Mit diesem Wert '.
        'k&ouml;nnen Sie einstellen, wieviel Prozent der Besucherdaten von Google tats&auml;chlich ausgewertet werden '.
        'sollen. Reduzieren Sie die Zahl, um Beschr&auml;nkungen zu umgehen.',
    'D3_GOOGLEANALYTICS_MAIN_SAMPLERATE_1'                         => "% aller Besucher",
    'D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME'                    => 'Seitenladezeit mit &uuml;bertragen',
    'D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME_DESC'               => 'Die Ladezeit Ihrer Seite ist, speziell auch in '.
        'Hinblick auf verschiedene L&auml;nder, durchaus ein Faktor, der in das Ranking Ihrer Page einfliesst.<br><br>'.
        'Bei Universal-Analytics wird die Seitenladezeit generell &uuml;bertragen. Durch die Aktivierung dieser Option'.
        ' wird eine genauere Auswertung zus&auml;tzlich als Event &uuml;bergeben.',
    'D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE'                  => "Seitengeschwindigkeit messen bei...",
    'D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE_DESC'             => 'Die Seitenladegeschwindigkeit wird nicht bei '.
        'jedem Seitenaufruf gemessen. Bei wenig frequentierten Seiten verzerrt dies jedoch das Ergebnis. Soll der '.
        'Standardwert von 1% ge&auml;ndert werden, tragen Sie den gew&uuml;nschten Wert hier ein. F&uuml;r Webseiten '.
        'mit mehr als 1 Million Besuchern pro Tag wird dieser Wert von Google fix auf 1% gestellt.',
    'D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE_1'                => "% aller Besucher",
    'D3_GOOGLEANALYTICS_MAIN_USEREMARKETING'                       => 'Remarketing-Auswertung erm&ouml;glichen',
    'D3_GOOGLEANALYTICS_MAIN_USEREMARKETING_DESC'                  => 'Wenn Sie sich entschlie&szlig;en, Remarketing '.
        'zu nutzen, setzen Sie diesen Haken. Nachdem Sie diese &Auml;nderung vorgenommen haben, '.
        'erfasst und analysiert Google Analytics neben den &uuml;blichen Informationen auch das DoubleClick-Cookie, '.
        'sofern vorhanden. Das DoubleClick-Cookie erm&ouml;glicht Remarketing im Google Display-Netzwerk f&uuml;r '.
        'Produkte wie AdWords. Je nach verwendetem Tracking-Typ muss die Erfassung von Informationen aus dem Display-'.
        'Netzwerk im Analytics-Konto aktiviert werden.',

    'D3_GOOGLEANALYTICS_ECOMMERCE'                                 => 'eCommerce settings',
    'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA'                        => 'eCommerce-Daten &uuml;bertragen',
    'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA_DESC'                   => 'Mit dieser Einstellung werden Warenkorbdaten '.
        'Ihrer Kunden an Analytics &uuml;bertragen. Damit k&ouml;nnen Sie z.B. die Produktleistung und Umsatzzahlen '.
        'ermitteln. Diese Option muss auch in Ihrem Analytics-Konto aktiviert werden.',
    'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO'                        => 'Netto-Preise &uuml;bertragen, wenn '.
        'verf&uuml;gbar',
    'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO_DESC'                   => 'Betreiben Sie einen B2B-Shop, &uuml;bertragen '.
        'Sie Ihre Artikelpreise netto an Analytics, wenn diese auch im Shop ohne Steuer zur Verf&uuml;gung stehen. ',

    'D3_GOOGLEANALYTICS_DOMAIN'                                    => 'Multi-Domain-Einstellungen',
    'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER'                     => 'Trackingdaten von unterschiedlichen Domains '.
        'verwenden',
    'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER_DESC'                => 'Cross Domain Tracking erlaubt das Sammeln von '.
        'Trackinginformationen auch &uuml;ber verschiedene Domains hinweg. <br><br>Weitere Informationen finden Sie '.
        '<a href="https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory#'.
        '_gat.GA_Tracker_._setAllowLinker" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME'                      => 'fixiert das Tracking-Cookie auf die angegebene '.
        'Domain (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME_DESC'                 => 'Lassen Sie dieses Feld leer, ist das Tacking-'.
        'Cookie f&uuml;r unterschiedliche Seiten g&uuml;ltig. Wenn Sie statt dessen eine Domain angeben, ist das '.
        'gesetzte Cookie nur f&uuml;r Seiten unter dieser Domain g&uuml;ltig. Andere zu trackende Seiten setzen dann '.
        'ein neues Cookie.<br><br>Der Eintrag sollte hier so aussehen: .yourDomainName.com<br><br>Weitere '.
        'Informationen finden Sie <a href="https://developers.google.com/analytics/devguides/collection/gajs/methods/'.
        'gaJSApiDomainDirectory#_gat.GA_Tracker_._setDomainName" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH'                      => 'Tracking nur auf ein Verzeichnis '.
        'beschr&auml;nken (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH_DESC'                 => 'Ein Eintrag hier sollte so aussehen: /myStore/'.
        '<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/'.
        'gaTrackingSite.html" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY'                     => 'Cookie Informationen werden in das Verzeichnis '.
        'der selben Domain kopiert (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY_DESC'                => 'Ein Eintrag hier sollte so aussehen: /myCart/'.
        '<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/'.
        'gaTrackingSite.html" target="gahelp">hier</a>. Diese Option ist nur f&uuml;r den asynchronen Trackingcode '.
        'verf&uuml;gbar.',

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
    'D3_GOOGLEANALYTICS_ADWORDS_CONVID'                            => 'Conversion-ID',
    'D3_GOOGLEANALYTICS_ADWORDS_CONVLABEL'                         => 'Conversion-Label',

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

    'D3_GOOGLEANALYTICS_ADWORDSREMARKETING'                        => 'Remarketing',
    'D3_GOOGLEANALYTICS_ADWORDS_SETREMARKETING'                    => 'Remarketing-Code aktivieren',
    'D3_GOOGLEANALYTICS_ADWORDS_REMARKETINGCONVID'                 => 'Conversion-ID',
    'D3_GOOGLEANALYTICS_ADWORDS_REMARKETINGCONVID_DESC'            => 'Tragen Sie hier die zu Ihrem eingerichteten '.
        'Remarketing zugehörige Conversion-ID ein. Diese kann mit Ihrer AdWords-Conversion-Tracking-ID identisch '.
        'sein. Auch Abweichungen sind möglich.',
    'D3_GOOGLEANALYTICS_ADWORDS_REMARKETINGCONVLABEL'              => 'Conversion-Label (optional)',

    'd3tbclgoogleanalytics_campaigns'                              => 'andere Kampagnen',
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

    'D3_GOOGLEANALYTICS_METADATA_TITLE'                            => 'Google Analytics Schnittstelle',
    'D3_GOOGLEANALYTICS_METADATA_DESC'                             => 'Dieses Modul stellt Ihnen die schnelle und '.
        'unkomplizierte Einbindung Ihres Google-Analytics-Kontos in Ihren Shop zur Verf&uuml;gung. Hierbei werden '.
        '&uuml;ber standardisierte Schnittstellen die Besucherdaten und eCommerce-Daten zu Google &uuml;bertragen. '.
        'Ebenfalls &uuml;bermittelt werden Daten der Website-Suche. Dem Modul liegen angepa&szlig;te Templates bei, '.
        'mit denen auch die Trichter ordentlich protokolliert werden.',
);


/*

[{ oxmultilang ident="GENERAL_YOUWANTTODELETE" }]

*/
