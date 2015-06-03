[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3_googleanalytics"}]
[{/d3modcfgcheck}]

[{if $mod_d3_googleanalytics && $oD3GASettings->getValue('blD3GAUseOptOut')}]
    <div id="d3GAOptOut">
        <a href="javascript:gaOptout();">[{oxmultilang ident="D3_GOOGLEANALYTICS_OPTOUT"}]</a>
        [{assign var='sGaId' value=$oD3GASettings->getValue('sD3GAId')}]
        [{oxscript add="
            var gaProperty = '`$sGaId`';

            var disableStr = 'ga-disable-' + gaProperty;
            if (document.cookie.indexOf(disableStr + '=true') > -1) {
                window[disableStr] = true;
            }

            function gaOptout() {
                document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
                window[disableStr] = true;
                $('#d3GAOptOut').remove();
            }

            if (window[disableStr]) {
                $('#d3GAOptOut').remove();
            }"}]
    </div>
[{/if}]
