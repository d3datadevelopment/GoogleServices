[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3_googleanalytics"}]
[{/d3modcfgcheck}]

[{if $mod_d3_googleanalytics}]
    [{* Content shouldn't rendered in disabled module!
        Because of this reason, it can't included in d3modcfgcheck block. *}]
    [{block name="BaseAdwords"}]
        [{if $oD3GASettings->getValue('sD3GATSActive') && $oD3GASettings->getValue('sD3GATSId')}]
            [{capture name="d3GATrustedStoreCode"}]
                [{strip}]
                    [{include file="d3ga_universal_trustedstore.tpl"}]
                [{/strip}]
            [{/capture}]

            [{if $oViewConf->getActiveClassName() == 'thankyou'}]
                [{$oView->logCode($smarty.capture.d3GATrustedStoreCode)}]
            [{/if}]

            [{$smarty.capture.d3GATrustedStoreCode}]
        [{/if}]

        [{include file="d3ga_universal_adwordscode.tpl"}]

        [{include file="d3ga_universal_remarketing.tpl"}]

        [{include file="d3ga_universal_campaigncode.tpl"}]
    [{/block}]
[{/if}]