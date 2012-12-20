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
    'extend'      => array(
        'oxcmp_utils' => 'd3GoogleAnalytics/views/d3_oxcmp_utils_googleanalytics',
        'oxorder'     => 'd3GoogleAnalytics/core/d3_oxorder_googleanalytics',
    )
);