[{include file="headitem.tpl" title="D3_GOOGLEANALYTICS_CFG_TITLE"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{ if $updatelist == 1}]
        UpdateList('[{ $oxid }]');
    [{ /if}]

    function UpdateList( sID)
    {
        var oSearch = parent.list.document.getElementById("search");
        oSearch.oxid.value=sID;
        oSearch.fnc.value='';
        oSearch.submit();
    }

    function EditThis( sID)
    {
        var oTransfer = document.getElementById("transfer");
        oTransfer.oxid.value=sID;
        oTransfer.cl.value='';
        oTransfer.submit();

        var oSearch = parent.list.document.getElementById("search");
        oSearch.actedit.value = 0;
        oSearch.oxid.value=sID;
        oSearch.submit();
    }

    function _groupExp(el) {
        var _cur = el.parentNode;

        if (_cur.className == "exp") _cur.className = "";
          else _cur.className = "exp";
    }

    -->
</script>

<style type="text/css">
    <!--
    .questbox {
        background-color: #07f;
        color:            white;
        float:            right;
        position:         relative;
        display:          block;
        padding:          1px 4px;
        font-weight:      bold;
        z-index:          98;
        cursor:           help;
        font-family:      Verdana, Arial, Helvetica, sans-serif;
        font-size:        10px;
        line-height:      12px;
    }

    .helptextbox {
        background-color: white;
        color:            black;
        border:           1px solid black;
        position:         absolute;
        overflow:         hidden;
        padding:          5px;
        margin-top:       15px;
        width:            300px;
        z-index:          99;
    }

    fieldset {
        border:           1px inset black;
        background-color: #F0F0F0;
    }

    legend {
        font-weight: bold;
    }

    dl dt {
        font-weight: normal;
        width:       55%;
    }

    .ext_edittext {
        padding: 2px;
    }

    td.edittext {
        white-space: normal;
    }
    -->
</style>

[{ if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
    <input type="hidden" name="actshop" value="[{ $shop->id }]">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{ $oxid }]">

<table border="0" width="98%">
    <tr>
        <td valign="top" class="edittext">

            [{assign var="incpath" value=$oViewConf->getModulePath('d3modcfg_lib')|cat:"views/admin/tpl/inc/d3_cfg_mod_active.tpl"}]
            [{include file=$incpath}]

            [{if $oView->getValueStatus() == 'error'}]
                    <hr>
                    <b>[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_DESC"}]</b>
                    <br>
                    <br>
                    <span class="d3modcfg_btn fixed icon status_attention">
                        <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_BTN"}]">
                        <span></span>
                    </span>
                </form>
                </div>
            [{else}]

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GAID"}]
[{*  _gaq.push(['_setAccount', 'UA_XXX']); *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$value->d3_cfg_mod__sD3GAId}]" name="value[d3_cfg_mod__sD3GAId]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_GAID_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP"}]
[{*  _gaq.push(['_gat._anonymizeIp']); *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GAAnonymizeIP]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GAAnonymizeIP}]checked[{/if}] name="value[d3_cfg_mod__blD3GAAnonymizeIP]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME"}]
[{*  _gaq.push(['_gat._trackPageLoadTime']); *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GATrackPageLoadTime]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GATrackPageLoadTime}]checked[{/if}] name="value[d3_cfg_mod__blD3GATrackPageLoadTime]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_USEREMARKETING"}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GAUseRemarketing]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GAUseRemarketing}]checked[{/if}] name="value[d3_cfg_mod__blD3GAUseRemarketing]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_USEREMARKETING_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ECOMMERCE"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA"}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASendECommerce]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASendECommerce}]checked[{/if}] name="value[d3_cfg_mod__blD3GASendECommerce]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO"}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GAUseNetto]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GAUseNetto}]checked[{/if}] name="value[d3_cfg_mod__blD3GAUseNetto]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER"}]
[{*  _gaq.push(['_setAllowLinker', true]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GAAllowDomainLinker]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GAAllowDomainLinker}]checked[{/if}] name="value[d3_cfg_mod__blD3GAAllowDomainLinker]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME"}]
[{*  _gaq.push(['_setDomainName', '.example-petstore.com']);   *}]
[{*  if used _gaq.push(['_setAllowHash', false]);   *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="200" value="[{$value->d3_cfg_mod__sD3GASetDomainName}]" name="value[d3_cfg_mod__sD3GASetDomainName]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH"}]
[{* _gaq.push(['_setCookiePath', '/path/of/cookie/']);   *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="150" value="[{$value->d3_cfg_mod__sD3GASetCookiePath}]" name="value[d3_cfg_mod__sD3GASetCookiePath]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY"}]
[{* _gaq.push(['_cookiePathCopy', '/path/of/cookie/']);   *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="150" value="[{$value->d3_cfg_mod__sD3GACookiePathCopy}]" name="value[d3_cfg_mod__sD3GACookiePathCopy]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO"}]
[{*  _gaq.push(['_setClientInfo', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASetClientInfo]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASetClientInfo}]checked[{/if}] name="value[d3_cfg_mod__blD3GASetClientInfo]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH"}]
[{*  _gaq.push(['_setDetectFlash', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASetDetectFlash]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASetDetectFlash}]checked[{/if}] name="value[d3_cfg_mod__blD3GASetDetectFlash]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE"}]
[{*  _gaq.push(['_setDetectTitle', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASetDetectTitle]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASetDetectTitle}]checked[{/if}] name="value[d3_cfg_mod__blD3GASetDetectTitle]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_CUSTOMVARS"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT"}]
[{*  _gaq.push(['_setCustomVar', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GAUseCustomVars]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GAUseCustomVars}]checked[{/if}] name="value[d3_cfg_mod__blD3GAUseCustomVars]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <table width="100%">
                    <tr>
                        <td class="edittext ext_edittext" align="left"><br>
                            <span class="d3modcfg_btn icon status_ok">
                                <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]">
                                <div></div>
                            </span>
                        </td>
                    </tr>
                </table>

                <br><br>[{oxmultilang ident="D3_GOOGLEANALYTICS_SECURITYINFORMATIONS"}]
            [{/if}]
        </td>
    </tr>
</table>

[{assign var="incpath" value=$oViewConf->getModulePath('d3modcfg_lib')|cat:"views/admin/tpl/d3_cfg_mod_inc.tpl"}]
[{include file=$incpath}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident="d3mxgoogleanalytics"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3tbclgoogleanalytics_main"}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>