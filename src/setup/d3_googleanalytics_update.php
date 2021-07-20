<?php

use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use OxidEsales\Eshop\Core\Registry;

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
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

class d3_googleanalytics_update extends d3install_updatebase
{
    public $sModKey = 'd3_googleanalytics';

    public $sModName = 'Google Services Schnittstelle';

    public $sModVersion = '4.5.0.0';

    public $sModRevision = '4500';

    // heredoc syntax using for class members is available from PHP 5.3 up
    public $sBaseConf = <<<KEY
--------------------------------------------------------------------------------
AeLv2==VFppcjFoMWU1S3pPYTl6WEJ3dHdtOGYrSVNQdGFNS2xJUXJRM1V0Undpemo0bERSeUk3amhZO
VA2dFdKRkh3a1dldWxwd0xSajA4N2xZa3ZIZ2NXbEFDbm4yUVQwZ29JMFBkKzcxNmFwM1JxYVpzVFZOM
0YxaUtnbU50czlmMHd1aGJ1MktaOW9qU2tmbjByN2JsQTRLdEMyNy9OZjBCYVV0aTZQaXhlc0NlV3o4d
lA5cWM4NE5ZcGdLQ2JVSnYvTGRsdmNRaU4wYk80Vkh6TGg3TXVTZWhNeE9jaTRYUklCRW5UcXZOOXNhW
mhUT3lBb1JlNG9NUlFSOUdXRnZuUHdhSGJka3FVZFBSWUdtTVVWbGE3N014NWRGSFdaVmxzWVRJTXh1U
3I5Q3ZWQ2pkdU5IZHloK0tacUF3RytHazcwNXFHa3lRM0Jmbm44ZDRBZzZ1NzZnPT0=
--------------------------------------------------------------------------------
KEY;

    public $sRequirements = '';

    public $sBaseValue = <<<KEY
--------------------------------------------------------------------------------
173v2==MjVveS9GVlBiQ3JIWWJvRlhhMFpRTFdnLzIvaDUzUnFyMGEwQ2Fla3JnTjkyd3hnL2dBMUgxV
XpiZE9RbEVKRmNCMzV3bXl6YWdRSnRqRFdicWQybk9iVjVocWZydXFJZElrUGhyUmNiTS9UQ04yVUpIV
klyM0t4YTVzZURoQWVQT2N6L0xod3hhamRvWUkrSkRtUHEyS21oTUp1UXhrSU5IYTFac3hoTWZmZHlLa
U44aURva05Iem4vZE4rcEV6NEpZaEZienVFVEpIOGZjdjBKMy9QVTI5VVAydVpwMFNZN2FEMnNQT09Cd
0xCaEVvTjdMWGVXSU9tSkNDWWRHenppZENrVVpHMlhiSERFV1B3YzhLYVJ4dys4T0c0K3lRUEw1VUVpN
kNhbVlPdWpyRHNRY2g5M0k0ZkxJbzcrZEhvWExMSzlxOVpydDRVWFQxcG93aUpBPT0=
--------------------------------------------------------------------------------
KEY;

    protected $_aUpdateMethods = array(
        array(
            'check' => 'checkModCfgItemExist',
            'do'    => 'updateModCfgItemExist'
        ),
        array(
            'check' => 'checkFields',
            'do'    => 'fixFields'
        ),
        array(
            'check' => 'checkContentGANoticeItemExist',
            'do'    => 'updateContentGANoticeItemExist'
        ),
        array(
            'check' => 'checkModCfgSameRevision',
            'do'    => 'updateModCfgSameRevision'
        ),
    );

    public $aFields = array(
        'D3_GALOCATOR'        => array(
            'sTableName'  => 'oxorderarticles',
            'sFieldName'  => 'D3_GALOCATOR',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
    );

    protected $_aRefreshMetaModuleIds = array('d3_googleanalytics');

    /**
     * @return bool
     */
    public function checkModCfgItemExist()
    {
        $blRet = false;
        foreach ($this->getShopList() as $oShop) {
            /** @var $oShop oxshop */
            $aWhere = array(
                'oxmodid'       => $this->sModKey,
                'oxnewrevision' => $this->sModRevision,
                'oxshopid'      => $oShop->getId(),
            );

            $blRet = $this->_checkTableItemNotExist('d3_cfg_mod', $aWhere);

            if ($blRet) {
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
        $blRet = false;

        if ($this->checkModCfgItemExist()) {
            foreach ($this->getShopList() as $oShop) {
                /** @var $oShop oxshop */
                $aWhere = array(
                    'oxmodid'       => $this->sModKey,
                    'oxshopid'      => $oShop->getId(),
                    'oxnewrevision' => $this->sModRevision,
                );

                if ($this->_checkTableItemNotExist('d3_cfg_mod', $aWhere)) {
                    // update don't use this property
                    unset($aWhere['oxnewrevision']);

                    $aInsertFields = array(
                        'OXID'           => array(
                            'content'      => "md5('" . $this->sModKey . " " . $oShop->getId() . "')",
                            'force_update' => false,
                            'use_quote'    => false,
                        ),
                        'OXSHOPID'       => array(
                            'content'      => $oShop->getId(),
                            'force_update' => false,
                            'use_quote'    => true,
                        ),
                        'OXMODID'        => array(
                            'content'      => $this->sModKey,
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        'OXNAME'         => array(
                            'content'      => $this->sModName,
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        'OXACTIVE'       => array(
                            'content'      => "0",
                            'force_update' => false,
                            'use_quote'    => false,
                        ),
                        'OXBASECONFIG'   => array(
                            'content'      => $this->sBaseConf,
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        'OXINSTALLDATE'  => array(
                            'content'      => "NOW()",
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                        'OXVERSION'      => array(
                            'content'      => $this->sModVersion,
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        'OXSHOPVERSION'  => array(
                            'content'      => Registry::getConfig()->getEdition(),
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        'OXREQUIREMENTS' => array(
                            'content'      => $this->sRequirements,
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        'OXVALUE'        => array(
                            'content'      => $this->sBaseValue,
                            'force_update' => false,
                            'use_quote'    => true,
                        ),
                        'OXNEWREVISION'  => array(
                            'content'      => $this->sModRevision,
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                    );
                    $aRet          = $this->_updateTableItem2('d3_cfg_mod', $aInsertFields, $aWhere);
                    $blRet         = $aRet['blRet'];
                    $this->setActionLog('SQL', $aRet['sql'], __METHOD__);
                    $this->setUpdateBreak(false);

                    if ($this->getStepByStepMode()) {
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
        $blRet = false;
        foreach ($this->getShopList() as $oShop) {
            /** @var $oShop oxshop */
            $aWhere = array(
                'oxloadid' => 'Analytics_Security_Informations',
                'oxshopid' => $oShop->getId(),
            );

            $blRet = $this->_checkTableItemNotExist('oxcontents', $aWhere);

            if ($blRet) {
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
        $blRet = false;

        if ($this->checkContentGANoticeItemExist()) {
            foreach ($this->getShopList() as $oShop) {
                /** @var $oShop oxshop */
                $aWhere = array(
                    'oxloadid' => 'Analytics_Security_Informations',
                    'oxshopid' => $oShop->getId(),
                );

                if ($this->_checkTableItemNotExist('oxcontents', $aWhere)) {
                    $aInsertFields = array(
                        'OXID'       => array(
                            'content'      => "md5(RAND())",
                            'force_update' => false,
                        ),
                        'OXLOADID'   => array(
                            'content'      => "'Analytics_Security_Informations'",
                            'force_update' => true,
                        ),
                        'OXSHOPID'   => array(
                            'content'      => "'" . $oShop->getId() . "'",
                            'force_update' => true,
                        ),
                        'OXSNIPPET'  => array(
                            'content'      => "'1'",
                            'force_update' => false,
                        ),
                        'OXTYPE'     => array(
                            'content'      => "'0'",
                            'force_update' => false,
                        ),
                        'OXACTIVE'   => array(
                            'content'      => "'1'",
                            'force_update' => false,
                        ),
                        'OXACTIVE_1' => array(
                            'content'      => "'1'",
                            'force_update' => false,
                        ),
                        'OXPOSITION' => array(
                            'content'      => "''",
                            'force_update' => false,
                        ),
                        'OXTITLE'    => array(
                            'content'      => "'Analytics Datenschutz Information'",
                            'force_update' => false,
                        ),
                        'OXCONTENT'  => array(
                            'content'      => "'<p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google\r\n\r\nInc. (&quot;Google&quot;). Google Analytics verwendet sog. &quot;Cookies&quot;, Textdateien, die auf\r\n\r\nIhrem Computer gespeichert werden und die eine Analyse der Benutzung der Website\r\n\r\ndurch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre\r\n\r\nBenutzung dieser Website (einschließlich Ihrer IP-Adresse<span style=\"color: #800000\">, die jedoch mit der Methode _anonymizeIp() anonymisiert wird, so dass Sie nicht mehr einem Anschluss\r\n\r\nzugeordnet werden kann</span>) wird an einen Server von Google in den USA\r\n\r\nübertragen und dort gespeichert. Google wird diese Informationen benutzen, um\r\n\r\nIhre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten für\r\n\r\ndie Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und\r\n\r\nder Internetnutzung verbundene Dienstleistungen zu erbringen. Auch wird Google\r\n\r\ndiese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich\r\n\r\nvorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.\r\n\r\nGoogle wird in keinem Fall Ihre IP-Adresse mit anderen Daten von Google in\r\n\r\nVerbindung bringen. Sie können die Installation der Cookies durch eine\r\n\r\nentsprechende Einstellung Ihrer Browser Software verhindern; wir weisen Sie\r\n\r\njedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche\r\n\r\nFunktionen dieser Website vollumfänglich nutzen können. Durch die Nutzung dieser\r\n\r\nWebsite erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch\r\n\r\nGoogle in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck\r\n\r\neinverstanden.</p>\r\n<p><span style=\"color: #800000\">Sie können der Erhebung der\r\n\r\nDaten durch Google-Analytics mit Wirkung für die Zukunft widersprechen, indem\r\n\r\nsie ein Deaktivierungs-Add-on (<a href=\"https://tools.google.com/dlpage/gaoptout?hl=de\" title=\"\">https://tools.google.com/dlpage/gaoptout?hl=de</a>)\r\n\r\nfür Ihren Browser installieren.</span></p>'",
                            'force_update' => false,
                        ),
                        'OXCATID'    => array(
                            'content'      => "''",
                            'force_update' => false,
                        ),
                        'OXFOLDER'   => array(
                            'content'      => "'CMSFOLDER_USERINFO'",
                            'force_update' => false,
                        ),
                    );
                    $aRet          = $this->_updateTableItem2('oxcontents', $aInsertFields, $aWhere);
                    $blRet         = $aRet['blRet'];

                    $this->setActionLog('SQL', $aRet['sql'], __METHOD__);
                    $this->setUpdateBreak(false);

                    if ($this->getStepByStepMode()) {
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
        $blRet = false;

        if ($this->checkModCfgSameRevision()) {
            $aRet = $this->_updateModCfgSameRevision($this->sModKey);

            $this->setActionLog('SQL', $aRet['sql'], __METHOD__);
            $this->setUpdateBreak(false);
            $blRet = $aRet['blRet'];
        }

        return $blRet;
    }
}
