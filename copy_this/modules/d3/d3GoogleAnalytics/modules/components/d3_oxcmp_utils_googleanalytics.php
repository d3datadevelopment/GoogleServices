<?php

class d3_oxcmp_utils_googleAnalytics extends d3_oxcmp_utils_googleAnalytics_parent
{
    private $_sModId = 'd3_googleanalytics';

    private $_oSet;

    public function render()
    {
        $ret = parent::render();

        // load module config
        $this->_oSet = d3_cfg_mod::get($this->_sModId);

        $this->getParent()->addTplParam('blD3GoogleAnalyticsActive', $this->_oSet->getFieldData('oxactive'));
        $this->getParent()->addTplParam('oD3GASettings', $this->_oSet);

        return $ret;
    }
}