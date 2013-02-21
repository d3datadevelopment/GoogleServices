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
 * @author    D3 Data Development - Daniel Seifert <ds@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_googleanalytics_update extends d3install_updatebase
{
    public $sModKey = 'd3_googleanalytics';
    public $sModName = 'Google Analytics Schnittstelle';
    public $sModVersion = '3.0.0.0';
    public $sModRevision = '78';
    public $sBaseConf = 'vUrWmloMytUSWhDL3c4eit4MmRUMHFlQU8xODV6QThqaitaajdRTUhyL08yZStjcU01TThTOWV3YnNNd
UwzRUd6RCtrZ0dHTFZEbmlMZ3pPbkhubysxVndaUkNVUDFLSmZDdUM3a0wycS9NdzVzM0lzQnJTaXJlW
UNpeVQ0akwyZVpDdFlSUEV2UkloR29zMFowZlRVdXhjc0I0bGpkbXVPWXFJc2tXODcrcDRWd2ZicVlzd
0srdlM1Zk1XN2JvTFJNTHpsTHpsTnRPR0haaFd4MXJ5NXd0YjRwekxYbDV4dTBWL2diMENQL2VNNVE4M
XVrbndtcEZQL2pCVlUwRHZrZzEwSmpZZFZDWnZKZ0RaNlhuTGZiS3dRQ0xua1JUdUV6eVJRcXZ1TVlEb
jQ9';
    public $sRequirements = '';
    public $sBaseValue = '';

    protected $_aUpdateMethods = array(
        array('check' => 'checkModCfgItemExist',
              'do'    => 'updateModCfgItemExist'),
        array('check' => 'checkContentGANoticeItemExist',
              'do'    => 'updateContentGANoticeItemExist'),
        array('check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision'),
    );

    protected $_aRefreshMetaModuleIds = array('d3_googleanalytics');

    /**
     * @return bool
     */
    public function checkModCfgItemExist()
    {
        $blRet = FALSE;
        foreach ($this->_getShopList() as $oShop)
        {
            /** @var $oShop oxshop */
            $aWhere = array(
                'oxmodid'       => $this->sModKey,
                'oxnewrevision' => $this->sModRevision,
                'oxshopid'      => $oShop->getId(),
            );

            $blRet = $this->_checkTableItemExist('d3_cfg_mod', $aWhere);

            if ($blRet)
            {
                return $blRet;
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     */
    public function updateModCfgItemExist()
    {
        $blRet = FALSE;

        if ($this->checkModCfgItemExist())
        {
            foreach ($this->_getShopList() as $oShop)
            {
                /** @var $oShop oxshop */
                $aWhere = array(
                    'oxmodid'       => $this->sModKey,
                    'oxnewrevision' => $this->sModRevision,
                    'oxshopid'      => $oShop->getId(),
                );
                if ($this->_checkTableItemExist('d3_cfg_mod', $aWhere))
                {
                    $aInsertFields = array(
                        'OXID'           => "md5('" . $this->sModKey . " " . $oShop->getId() . " de')",
                        'OXSHOPID'       => "'" . $oShop->getId() . "'",
                        'OXMODID'        => "'" . $this->sModKey . "'",
                        'OXNAME'         => "'" . $this->sModName . "'",
                        'OXACTIVE'       => "0",
                        'OXBASECONFIG'   => "'" . $this->sBaseConf . "'",
                        'OXINSTALLDATE'  => "NOW()",
                        'OXVERSION'      => "'" . $this->sModVersion . "'",
                        'OXSHOPVERSION'  => "'" . oxRegistry::getConfig()->getEdition() . "'",
                        'OXREQUIREMENTS' => "'" . $this->sRequirements . "'",
                        'OXVALUE'        => "'" . $this->sBaseValue . "'",
                        'OXNEWREVISION'  => "'" . $this->sModRevision . "'",
                    );
                    $aRet          = $this->_setTableItem('d3_cfg_mod', $aInsertFields);
                    $blRet         = $aRet['blRet'];

                    $this->_setActionLog('SQL', $aRet['sql'], __METHOD__);
                    $this->_setUpdateBreak(FALSE);

                    if ($this->getStepByStepMode())
                    {
                        break;
                    }
                }
            }
        }
        return $blRet;
    }

    /**
     * @return bool
     */
    public function checkContentGANoticeItemExist()
    {
        $blRet = FALSE;
        foreach ($this->_getShopList() as $oShop)
        {
            /** @var $oShop oxshop */
            $aWhere = array(
                'oxloadid' => 'Analytics_Security_Informations',
                'oxshopid' => $oShop->getId(),
            );

            $blRet = $this->_checkTableItemExist('oxcontents', $aWhere);

            if ($blRet)
            {
                return $blRet;
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     */
    public function updateContentGANoticeItemExist()
    {
        $blRet = FALSE;

        if ($this->checkContentGANoticeItemExist())
        {
            foreach ($this->_getShopList() as $oShop)
            {
                /** @var $oShop oxshop */
                $aWhere = array(
                    'oxloadid' => 'Analytics_Security_Informations',
                    'oxshopid' => $oShop->getId(),
                );

                if ($this->_checkTableItemExist('oxcontents', $aWhere))
                {
                    $aInsertFields = array(
                        'OXID'       => "md5(RAND())",
                        'OXLOADID'   => "'Analytics_Security_Informations'",
                        'OXSHOPID'   => "'" . $oShop->getId() . "'",
                        'OXSNIPPET'  => "'1'",
                        'OXTYPE'     => "'0'",
                        'OXACTIVE'   => "'1'",
                        'OXACTIVE_1' => "'1'",
                        'OXPOSITION' => "''",
                        'OXTITLE'    => "'Analytics Datenschutz Information'",
                        'OXCONTENT'  => "'<p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google\r\n\r\nInc. (&quot;Google&quot;). Google Analytics verwendet sog. &quot;Cookies&quot;, Textdateien, die auf\r\n\r\nIhrem Computer gespeichert werden und die eine Analyse der Benutzung der Website\r\n\r\ndurch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre\r\n\r\nBenutzung dieser Website (einschließlich Ihrer IP-Adresse<span style=\"color: #800000\">, die jedoch mit der Methode _anonymizeIp() anonymisiert wird, so dass Sie nicht mehr einem Anschluss\r\n\r\nzugeordnet werden kann</span>) wird an einen Server von Google in den USA\r\n\r\nübertragen und dort gespeichert. Google wird diese Informationen benutzen, um\r\n\r\nIhre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten für\r\n\r\ndie Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und\r\n\r\nder Internetnutzung verbundene Dienstleistungen zu erbringen. Auch wird Google\r\n\r\ndiese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich\r\n\r\nvorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.\r\n\r\nGoogle wird in keinem Fall Ihre IP-Adresse mit anderen Daten von Google in\r\n\r\nVerbindung bringen. Sie können die Installation der Cookies durch eine\r\n\r\nentsprechende Einstellung Ihrer Browser Software verhindern; wir weisen Sie\r\n\r\njedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche\r\n\r\nFunktionen dieser Website vollumfänglich nutzen können. Durch die Nutzung dieser\r\n\r\nWebsite erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch\r\n\r\nGoogle in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck\r\n\r\neinverstanden.</p>\r\n<p><span style=\"color: #800000\">Sie können der Erhebung der\r\n\r\nDaten durch Google-Analytics mit Wirkung für die Zukunft widersprechen, indem\r\n\r\nsie ein Deaktivierungs-Add-on (<a href=\"http://tools.google.com/dlpage/gaoptout?hl=de\" title=\"\">http://tools.google.com/dlpage/gaoptout?hl=de</a>)\r\n\r\nfür Ihren Browser installieren.</span></p>'",
                        'OXCATID'    => "'943a9ba3050e78b443c16e043ae60ef3'",
                        'OXFOLDER'   => "'CMSFOLDER_USERINFO'",
                    );
                    $aRet          = $this->_setTableItem('oxcontents', $aInsertFields);
                    $blRet         = $aRet['blRet'];

                    $this->_setActionLog('SQL', $aRet['sql'], __METHOD__);
                    $this->_setUpdateBreak(FALSE);

                    if ($this->getStepByStepMode())
                    {
                        break;
                    }
                }
            }
        }
        return $blRet;
    }

    /**
     * @return bool
     */
    public function checkModCfgSameRevision()
    {
        return $this->_checkModCfgSameRevision($this->sModKey);
    }

    /**
     * @return bool
     */
    public function updateModCfgSameRevision()
    {
        $blRet = FALSE;

        if ($this->checkModCfgSameRevision($this->sModKey))
        {
            $aRet = $this->_updateModCfgSameRevision($this->sModKey);

            $this->_setActionLog('SQL', $aRet['sql'], __METHOD__);
            $this->_setUpdateBreak(FALSE);
            $blRet = $aRet['blRet'];
        }
        return $blRet;
    }
}