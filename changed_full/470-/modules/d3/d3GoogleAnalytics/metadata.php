<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'd3_googleanalytics',
    'title'        => (class_exists('d3utils')?d3utils::getInstance()->getD3Logo():'D&sup3;').' Google Analytics Schnittstelle',
    'description'  => array(
            'de'   => 'Dieses Modul stellt Ihnen die schnelle und unkomplizierte Einbindung Ihres Google-Analytics-Kontos in Ihren Shop zur Verf&uuml;gung.
                       Hierbei werden &uuml;ber standardisierte Schnittstellen die Besucherdaten und eCommerce-Daten zu Google &uuml;bertragen.
                       Ebenfalls &uuml;bermittelt werden Daten der Website-Suche.
                       Dem Modul liegen angepa&szlig;te Templates bei, mit denen auch die Trichter ordentlich protokolliert werden.',
            'en'   => 'Provides a quick and easy integration with your Google Analytics account to your shop.',
    ),
    'thumbnail'    => 'picture.png',
    'version'      => '3.0.0.0',
    'author'       => 'D&sup3; Data Development',
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'oxcmp_utils' => 'd3/d3GoogleAnalytics/modules/components/d3_oxcmp_utils_googleanalytics',
        'oxorder'     => 'd3/d3GoogleAnalytics/modules/models/d3_oxorder_googleanalytics',
    ),
    'files' => array(
        'd3_cfg_googleanalytics'           => 'd3/d3GoogleAnalytics/controllers/admin/d3_cfg_googleanalytics.php',
        'd3_cfg_googleanalytics_campaigns' => 'd3/d3GoogleAnalytics/controllers/admin/d3_cfg_googleanalytics_campaigns.php',
        'd3_cfg_googleanalytics_licence'   => 'd3/d3GoogleAnalytics/controllers/admin/d3_cfg_googleanalytics_licence.php',
        'd3_cfg_googleanalytics_list'      => 'd3/d3GoogleAnalytics/controllers/admin/d3_cfg_googleanalytics_list.php',
        'd3_cfg_googleanalytics_main'      => 'd3/d3GoogleAnalytics/controllers/admin/d3_cfg_googleanalytics_main.php',
    ),
    'templates' => array(
        'd3_googleanalytics.tpl'                => 'd3/d3GoogleAnalytics/views/tpl/widget/d3_googleanalytics.tpl',
        'd3_cfg_googleanalytics_main.tpl'       => 'd3/d3GoogleAnalytics/views/admin/tpl/d3_cfg_googleanalytics_main.tpl',
        'd3_cfg_googleanalytics_campaigns.tpl'  => 'd3/d3GoogleAnalytics/views/admin/tpl/d3_cfg_googleanalytics_campaigns.tpl',
    ),
    'events'       => array(
        'onActivate'                      => 'd3install::checkUpdateStart',
        //'onDeactivate' => 'd3_::onDeactivate'
    ),
	'blocks' => array(
        array(  'template' => 'layout/footer.tpl',
                'block'=>'footer_main',
                'file'=>'/views/blocks/layout/d3_footer_main_googleanalytics.tpl'),
    ),
);