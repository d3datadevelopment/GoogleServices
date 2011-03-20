<?php

$sLangName  = "Deutsch";
$iLangNr    = 0;
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
'charset'                                           => 'ISO-8859-15',
'd3mxd3modules'                                     => 'D� Module',
'd3mxgoogleanalytics'                               => 'Google Analytics',
'd3mxgoogleanalytics_settings'                      => 'Einstellungen',
'd3tbclgoogleanalytics_main'                        => 'Analytics',
'd3tbclgoogleanalytics_adwords'                     => 'Kampagnen (z.B. AdWords)',

'D3_GOOGLEANALYTICS_CFG_TITLE'                      => 'Google Analytics Schnittstelle - Einstellungen',

'D3_GOOGLEANALYTICS_MAIN'                           => 'Grundeinstellungen',
'D3_GOOGLEANALYTICS_MAIN_GAID'                      => 'Analyics-ID',
'D3_GOOGLEANALYTICS_MAIN_GAID_DESC'                 => 'F�gen Sie hier die Google Analytics Konto-ID ein. Diese finden Sie in Ihrem GA-Konto und beginnt im Normalfall mit "UA-".',
'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP'               => 'IP-Adressen anonymisiert �bertragen (dringend empfohlen)',
'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC'          => 'Die IP-Adressen Ihrer Shopbesucher werden anonymisiert. Zwar werden dadurch die Gebietszuordnungen etwas ungenauer. Jedoch k�nnen Sie nur mit dieser Einstellung den Datenschutzvorschriften in Deutschland entsprechen.',

'D3_GOOGLEANALYTICS_ECOMMERCE'                      => 'eCommerce-Einstellungen',
'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA'             => 'eCommerce-Daten �bertragen',
'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA_DESC'        => 'Mit dieser Einstellung werden Warenkorbdaten Ihrer Kunden an Analytics �bertragen. Damit k�nnen Sie z.B. die Produktleistung und Umsatzzahlen ermitteln.',
'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO'             => 'Netto-Preise �bertragen, wenn verf�gbar / TODO',
'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO_DESC'        => 'Betreiben Sie einen B2B-Shop, �bertragen Sie Ihre Artikelpreise netto an Analytics, wenn diese auch im Shop ohne Steuer zur Verf�gung stehen. ',

'D3_GOOGLEANALYTICS_DOMAIN'                         => 'Multi-Domain-Einstellungen',
'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER'          => 'Trackingdaten von unterschiedlichen Domains verwenden / TODO',
    // TODO: further description required
'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME'           => 'fixiert das Tracking-Cookie auf die angegebene Domain (optional)',
'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME_DESC'      => 'Lassen Sie dieses Feld leer, ist das Tacking-Cookie f�r unterschiedliche Seiten g�ltig. Wenn Sie statt dessen eine Domain angeben, ist das gesetzte Cookie nur f�r Seiten unter dieser Domain g�ltig. Andere zu trackende Seiten setzen dann ein neues Cookie.<br><br>Der Eintrag sollte hier so aussehen: .yourDomainName.com<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/concepts/gaConceptsCookies.html#significanceOfName" target="gahelp">hier</a>.',
'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH'           => 'Tracking nur auf ein Verzeichnis beschr�nken (optional)',
'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH_DESC'      => 'Ein Eintrag hier sollte so aussehen: /myStore/<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/gaTrackingSite.html" target="gahelp">hier</a>.',
'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY'          => 'Cookie Informationen werden in das Verzeichnis der selben Domain kopiert (optional)',
'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY_DESC'      => 'Ein Eintrag hier sollte so aussehen: /myCart/<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/gaTrackingSite.html" target="gahelp">hier</a>.',

'D3_GOOGLEANALYTICS_BROWSER'                        => 'Browser-Daten',
'D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO'          => '<b>Deaktiviert</b> die Erkennung von Browserdaten (z.B. Name und Version)',
'D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH'         => '<b>Unterbindet</b> die Erkennung, ob beim Kunden das Flash-Plugin installiert ist.',
'D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE'         => '_setDetectTitle / TODO',
    // TODO: further description required

'D3_GOOGLEANALYTICS_CUSTOMVARS'                     => 'individuelle Daten',
'D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT'            => 'individuelle Daten �bertragen',
'D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT_DESC'       => 'Mit individuellen Daten k�nnen Sie Parameter �bermitteln, die sonst im Rahmen des Trackingcodes nicht gesammelt werden. Erg�nzen Sie den entsprechenden Abschnitt im Template "inc/d3GoogleAnalytics.tpl" um die gew�nschten Daten. Als Beispiel ist die �bertragung des Kundengeschlechts angelegt.<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/gaTrackingCustomVariables.html" target="gahelp">hier</a>.',

'D3_GOOGLEANALYTICS_SECURITYINFORMATIONS'           => 'Im CMS-Baustein "Analytics_Security_Informations" ist ein Text hinterlegt, den Sie Ihren Kunden unter Ihrer Datenschutzerkl�rung verf�gbar machen sollten. Kl�ren Sie jedoch bitte vor Verwendung von Google Analytics Tracking und diesem Hinweistext ab, ob beides mit den Datenschutzbestimmung Ihres Landes konform geht. Ausschlie�lich der Shopbetreiber haftet f�r Verst��e. Beraten Sie sich im Zweifel mit Ihrem Rechtsanwalt. / TODO<br><br>Nach Aktivierung des Tracking-Codes dauert es in der Regel ca. 24 Stunden, bis die ersten Tracking-Daten in Analytics zur Verf�gung stehen.',
    // TODO: add content to package

'D3_GOOGLEANALYTICS_ADWORDSGENERAL'                                 => 'Kampagnen Grundeinstellungen',
'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK'                   => 'Kampagnendaten <b>nicht</b> �bertragen',
'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK_DESC'              => 'Das Kampagnentracking ist im Standard aktiviert. Setzen Sie diesen Haken, um die Kampagnen�bertragung zu deaktivieren.',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT'           => 'Kampagnenlaufzeit (optional, sonst 6 Monate)',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_DESC'      => 'Geben Sie hier eine optionale Laufzeit dieser Kampagne in Millisekunden an.<br><br>30 Tage = 2592000000<br>365 Tage = 31536000000',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_MS'        => 'Millisekunden',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY'                       => '_setCampNoKey',

'D3_GOOGLEANALYTICS_ADWORDSCODE'                    => 'Kampagnen-Code',
'D3_GOOGLEANALYTICS_ADWORDSCODE_CODE'               => 'AdWords-Code',
'D3_GOOGLEANALYTICS_ADWORDSCODE_CODE_DESC'          => 'Kopieren Sie hier den Kampagnen-Tracking-Code ein, den Sie auf Ihrer AdWords-Seite finden. Kopieren Sie auch das "script"-Tag mit.',

'D3_GOOGLEANALYTICS_ADWORDSMAIN'                        => 'Individualisierung der Kampagnentrackings',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY'         => 'Kampagnenname (optional)',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY_DESC'    => 'Unter diesem Namen sehen Sie die Auswertung der Daten aus dieser Shopkampagne in Analytics.<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampNameKey" target="gahelp">hier</a>.',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY'       => 'Kampagnenmedium (optional)',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY_DESC'  => 'Definieren Sie das Medium dieser Kampagne (z.B. Werbebanner, Mailkampagne oder auch Klickkampagne). Diese Einstellung finden Sie in der Kampagnenauswertung unter "Keywords".<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampMediumKey" target="gahelp">hier</a>.',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY'       => 'Kampagnenquelle (optional)',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY_DESC'  => 'Benennen Sie hier die Quelle der Shopkampagne, vergeben Sie zum Beispiel den Webseiten-Name oder den Firmenname.<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampSourceKey" target="gahelp">hier</a>.',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY'         => 'Schl�sselwort(e) Ihrer Kampagne (optional)',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY_DESC'    => 'Auch diese Keywords erscheinen in Analytics unter "Keywords".<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampTermKey" target="gahelp">hier</a>.',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY'      => 'Inhaltsbeschreibung der Kampagne (optional)',
'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY_DESC' => 'Den beschrieben Inhalt finden Sie in der Auswertung als "Ad Content".<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampContentKey" target="gahelp">hier</a>.',

);


/*

[{ oxmultilang ident="GENERAL_YOUWANTTODELETE" }]

*/