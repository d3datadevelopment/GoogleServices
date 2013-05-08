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
    public $sModVersion = '3.0.0.1';
    public $sModRevision = '96';
    public $sBaseConf = 'FTzQldsSjZkZWpic2NrQTdpajFFL2pXRjYyS3ZYVFNHVE96VW5HUmZKK0ViQWNCRWJKd3J1bmNCQ2hWS
GVNQjlUYmJES1RtTHdyZG5sL3NTcXloc2p1MndhekdJV25zTlY0VDM0ekE3UG5mNDFIR04yWWJGaFNhT
DNHQVNNalArT2xwUDBTSjZuZzVFS0h2SVl2anVzaE1YcGFiaWRtSHVmN1orak14cjZ4NVJkK3BRYXI1N
DJFeXdWZ0NoczFwdWM0SXF0VElvdmFmUVhCVTNjRGowSCtJWnZ1QkdHQUx4M2F2UWpVVWtEVk9rcC9Pa
1YxcTRRa09oYU43aG5YaVljdU53MEh3STdIUE5yWWtjSUFZc2lJZDQ0SHptRlpSbFBqR2RMZTVGZmdhd
UU9';
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

            $blRet = $this->_checkTableItemNotExist('d3_cfg_mod', $aWhere);

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
                    'oxshopid'      => $oShop->getId(),
                    'oxnewrevision' => $this->sModRevision,
                );

                if ($this->_checkTableItemNotExist('d3_cfg_mod', $aWhere))
                {
                    // update don't use this property
                    unset($aWhere['oxnewrevision']);

                    $aInsertFields = array(
                        'OXID'           => array(
                            'content'       =>  "md5('" . $this->sModKey . " " . $oShop->getId() . "')",
                            'force_update'  =>  false,
                        ),
                        'OXSHOPID'       => array(
                            'content'       =>  "'" . $oShop->getId() . "'",
                            'force_update'  =>  false,
                        ),
                        'OXMODID'        => array(
                            'content'       =>  "'" . $this->sModKey . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXNAME'         => array(
                            'content'       =>  "'" . $this->sModName . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXACTIVE'       => array(
                            'content'       =>  "0",
                            'force_update'  =>  FALSE,
                        ),
                        'OXBASECONFIG'   => array(
                            'content'       =>  "'" . $this->sBaseConf . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXINSTALLDATE'  => array(
                            'content'       =>  "NOW()",
                            'force_update'  =>  TRUE,
                        ),
                        'OXVERSION'      => array(
                            'content'       =>  "'" . $this->sModVersion . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXSHOPVERSION'  => array(
                            'content'       =>  "'" . oxRegistry::getConfig()->getEdition() . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXREQUIREMENTS' => array(
                            'content'       =>  "'" . $this->sRequirements . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXVALUE'        => array(
                            'content'       =>  "'" . $this->sBaseValue . "'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXNEWREVISION'  => array(
                            'content'       =>  "'" . $this->sModRevision . "'",
                            'force_update'  =>  TRUE,
                        ),
                    );
                    $aRet          = $this->_updateTableItem('d3_cfg_mod', $aInsertFields, $aWhere);
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

            $blRet = $this->_checkTableItemNotExist('oxcontents', $aWhere);

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

                if ($this->_checkTableItemNotExist('oxcontents', $aWhere))
                {
                    $aInsertFields = array(
                        'OXID'       => array(
                            'content'       =>  "md5(RAND())",
                            'force_update'  =>  FALSE,
                        ),
                        'OXLOADID'   => array(
                            'content'       =>  "'Analytics_Security_Informations'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXSHOPID'   => array(
                            'content'       =>  "'" . $oShop->getId() . "'",
                            'force_update'  =>  TRUE,
                        ),
                        'OXSNIPPET'  => array(
                            'content'       =>  "'1'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXTYPE'     => array(
                            'content'       =>  "'0'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXACTIVE'   => array(
                            'content'       =>  "'1'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXACTIVE_1' => array(
                            'content'       =>  "'1'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXPOSITION' => array(
                            'content'       =>  "''",
                            'force_update'  =>  FALSE,
                        ),
                        'OXTITLE'    => array(
                            'content'       =>  "'Analytics Datenschutz Information'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXCONTENT'  => array(
                            'content'       =>  "'<p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google\r\n\r\nInc. (&quot;Google&quot;). Google Analytics verwendet sog. &quot;Cookies&quot;, Textdateien, die auf\r\n\r\nIhrem Computer gespeichert werden und die eine Analyse der Benutzung der Website\r\n\r\ndurch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre\r\n\r\nBenutzung dieser Website (einschließlich Ihrer IP-Adresse<span style=\"color: #800000\">, die jedoch mit der Methode _anonymizeIp() anonymisiert wird, so dass Sie nicht mehr einem Anschluss\r\n\r\nzugeordnet werden kann</span>) wird an einen Server von Google in den USA\r\n\r\nübertragen und dort gespeichert. Google wird diese Informationen benutzen, um\r\n\r\nIhre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten für\r\n\r\ndie Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und\r\n\r\nder Internetnutzung verbundene Dienstleistungen zu erbringen. Auch wird Google\r\n\r\ndiese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich\r\n\r\nvorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.\r\n\r\nGoogle wird in keinem Fall Ihre IP-Adresse mit anderen Daten von Google in\r\n\r\nVerbindung bringen. Sie können die Installation der Cookies durch eine\r\n\r\nentsprechende Einstellung Ihrer Browser Software verhindern; wir weisen Sie\r\n\r\njedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche\r\n\r\nFunktionen dieser Website vollumfänglich nutzen können. Durch die Nutzung dieser\r\n\r\nWebsite erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch\r\n\r\nGoogle in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck\r\n\r\neinverstanden.</p>\r\n<p><span style=\"color: #800000\">Sie können der Erhebung der\r\n\r\nDaten durch Google-Analytics mit Wirkung für die Zukunft widersprechen, indem\r\n\r\nsie ein Deaktivierungs-Add-on (<a href=\"http://tools.google.com/dlpage/gaoptout?hl=de\" title=\"\">http://tools.google.com/dlpage/gaoptout?hl=de</a>)\r\n\r\nfür Ihren Browser installieren.</span></p>'",
                            'force_update'  =>  FALSE,
                        ),
                        'OXCATID'    => array(
                            'content'       =>  "''",
                            'force_update'  =>  FALSE,
                        ),
                        'OXFOLDER'   => array(
                            'content'       =>  "'CMSFOLDER_USERINFO'",
                            'force_update'  =>  FALSE,
                        ),
                    );
                    $aRet          = $this->_updateTableItem('oxcontents', $aInsertFields, $aWhere);
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