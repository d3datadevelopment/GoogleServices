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
    'description'  => array(),
    'thumbnail'    => 'picture.png',
    'version'      => '3.0.0.0',
    'author'       => 'D&sup3; Data Development',
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'extend'       => array(
        'oxcmp_utils' => 'd3GoogleAnalytics/views/d3_oxcmp_utils_googleanalytics',
        'oxorder'     => 'd3GoogleAnalytics/core/d3_oxorder_googleanalytics',
    ),
    'files'        => array(
        'd3_cfg_googleanalytics'                    => 'd3\d3GoogleAnalytics\controllers\admin\d3_cfg_googleanalytics.php',
        'd3_cfg_googleanalytics_campaigns'          => 'd3\d3GoogleAnalytics\controllers\admin\d3_cfg_googleanalytics_campaigns.php',
        'd3_cfg_googleanalytics_licence'            => 'd3\d3GoogleAnalytics\controllers\admin\d3_cfg_googleanalytics_licence.php',
        'd3_cfg_googleanalytics_list'               => 'd3\d3GoogleAnalytics\controllers\admin\d3_cfg_googleanalytics_list.php',
        'd3_cfg_googleanalytics_main'               => 'd3\d3GoogleAnalytics\controllers\admin\d3_cfg_googleanalytics_main.php',
    ),
    'templates'    => array(
        'd3_cfg_googleanalytics_campaigns.tpl'      => 'd3\d3GoogleAnalytics\views\admin\tpl\d3_cfg_googleanalytics_campaigns.tpl',
        'd3_cfg_googleanalytics_main.tpl'           => 'd3\d3GoogleAnalytics\views\admin\tpl\d3_cfg_googleanalytics_main.tpl',
    ),
    'events'       => array(),
    'blocks'       => array(),
);