[{if $oD3GASettings->getValue('sD3GASetDomainName')}]
    [{capture name="d3GACreate"}]
        [{$smarty.capture.d3GACreate}]
        'cookieDomain': '[{$oD3GASettings->getValue('sD3GASetDomainName')}]',
    [{/capture}]
[{/if}]

$aParameter[] = "'legacyCookieDomain': '".d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetDomainName')."'";
}
if (d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath')) {
$aParameter[] = "'cookiePath': '".d3_cfg_mod::get($this->_sModId)->getValue('sD3GASetCookiePath')."'";
}
if (d3_cfg_mod::get($this->_sModId)->getValue('blD3GAAllowDomainLinker')) {
$aParameter[] = "'allowLinker': true";
}

if (count($aParameter)) {
return ", {".implode(',', $aParameter)."}";
}

return '';