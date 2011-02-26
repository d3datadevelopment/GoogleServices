<?php

class d3_oxcmp_utils_googleAnalytics extends d3_oxcmp_utils_googleAnalytics_parent
{
    public function render()
    {
        $ret = parent::render();

        $this->_oParent->addTplParam('d3GoogleAnalyticsId', $this->getConfig()->getConfigParam('sD3GoogleAnalyticsId'));

        return $ret;
    }
}