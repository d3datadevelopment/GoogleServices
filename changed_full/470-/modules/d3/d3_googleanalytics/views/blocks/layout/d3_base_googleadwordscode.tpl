[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3_googleanalytics"}]
[{/d3modcfgcheck}]

[{if $mod_d3_googleanalytics}]
    [{* Content shouldn't rendered in disabled module!
        Because of this reason, it can't included in d3modcfgcheck block. *}]
    [{include file="d3ga_universal_adwordscode.tpl"}]

    [{include file="d3ga_universal_remarketing.tpl"}]

    [{include file="d3ga_universal_campaigncode.tpl"}]
[{/if}]