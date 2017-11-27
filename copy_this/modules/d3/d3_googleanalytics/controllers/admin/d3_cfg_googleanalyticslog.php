<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */
class d3_cfg_googleanalyticslog extends D3\ModCfg\Application\Controller\Admin\Log\d3_cfg_log
{
    protected $_sModId = 'd3_googleanalytics';

    /**
     * @return string
     */
    public function d3getAdditionalUrlParams()
    {
        $sRet = parent::d3getAdditionalUrlParams();

        if ($this->_sModId) {
            $sRet .= '&sD3ModId='.$this->_sModId;
        }

        return $sRet;
    }
}
