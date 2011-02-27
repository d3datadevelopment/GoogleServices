<?php

class d3_oxcmp_utils_googleAnalytics extends d3_oxcmp_utils_googleAnalytics_parent
{
    private $_sModId = 'd3_googleanalytics';
    
    private $_oSet;
    
    public function render()
    {
        $ret = parent::render();

        // load module config
        $this->_oSet = oxNew('d3_cfg_mod');
        $this->_oSet->Load($this->_oSet->getModOxid($this->_sModId), true);
        
        $this->_oParent->addTplParam('d3GoogleAnalyticsActive', $this->_oSet->getFieldData('oxactive'));
        $this->_oParent->addTplParam('d3GoogleAnalyticsId', $this->_oSet->getValue('sD3GAId'));
        $this->_oParent->addTplParam('d3GoogleAnalyticsAnonymizeIP', $this->_oSet->getValue('blD3GAAnonymizeIP'));
        $this->_oParent->addTplParam('d3GoogleAnalyticsSendECommerce', $this->_oSet->getValue('blD3GASendECommerce'));
        $this->_oParent->addTplParam('d3GoogleAnalyticsXDomain', $this->_oSet->getValue('blD3GAAllowDomainLinker'));

        return $ret;
    }
}