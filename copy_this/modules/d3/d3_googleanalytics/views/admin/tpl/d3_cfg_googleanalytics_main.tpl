[{include file="headitem.tpl" title="D3_GOOGLEANALYTICS_CFG_TITLE"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{if $updatelist == 1}]
        UpdateList('[{$oxid}]');
    [{/if}]

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

    .servicedesc {
        background-color: #d4ffd4;
        border: 1px solid green;
        margin-bottom: 10px;
        padding: 5px;
        text-align: center;
    }

    .servicedesc a {
        text-decoration: underline;
    }
    -->
</style>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="actshop" value="[{$shop->id}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

<table border="0" width="98%">
    <tr>
        <td valign="top" class="edittext">

            [{include file="d3_cfg_mod_active.tpl"}]

            [{if $edit->getErrorMessage()}]

            [{elseif $oView->getValueStatus() == 'error'}]
                    <hr>
                    <span style="font-weight: bold;">[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_DESC"}]</span>
                    <br>
                    <br>
                    <span class="d3modcfg_btn fixed icon status_attention">
                        <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_BTN"}]">
                        <span></span>
                    </span>
            [{else}]

                [{if $oView->getGaType() == 'universal'}]
                    [{assign var="blUniversalDisabled" value="disabled readonly"}]
                    [{assign var="blAsyncDisabled" value=""}]
                [{elseif  $oView->getGaType() == 'async'}]
                    [{assign var="blUniversalDisabled" value=""}]
                    [{assign var="blAsyncDisabled" value="disabled readonly"}]
                [{else}]
                    [{assign var="blUniversalDisabled" value=""}]
                    [{assign var="blAsyncDisabled" value=""}]
                [{/if}]

                <hr>

                <div class="servicedesc">[{oxmultilang ident="D3_GOOGLEANALYTICS_DESC"}] [{oxinputhelp ident="D3_GOOGLEANALYTICS_DESC1"}]</div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN"}]
                            </span>
                        </a>
                        <dl>
                            <dt style="height: 25px;">
                                <label for="sD3GAType">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GATYPE"}]</label>
                            </dt>
                            <dd>
                                <input type="radio" name="value[sD3GAType]" value="universal" [{if $oView->getGaType() != 'async'}]checked[{/if}] onclick="alert('[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_UNIVERSAL_DESC"}]');"> [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_UNIVERSAL"}]<br>
                                <input type="radio" name="value[sD3GAType]" value="async" [{if $oView->getGaType() == 'async'}]checked[{/if}] onclick="alert('[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_ASYNC_DESC"}]');"> [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_ASYNC"}]
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GAId">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GAID"}]</label>
[{*  _gaq.push(['_setAccount', 'UA_XXX']); *}]
                            </dt>
                            <dd>
                                <input id="sD3GAId" class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$edit->getValue('sD3GAId')}]" name="value[sD3GAId]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_GAID_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GAAnonymizeIP">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP"}]</label>
[{*  _gaq.push(['_gat._anonymizeIp']); *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAAnonymizeIP]" value="0">
                                <input id="blD3GAAnonymizeIP" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAAnonymizeIP')}]checked[{/if}] name="value[blD3GAAnonymizeIP]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GASampleRate">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_SAMPLERATE"}]</label>
[{* _gaq.push(['_setSampleRate', 5]); *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[iD3GASampleRate]" value="0">
                                <input type="text" id="iD3GASampleRate" class="edittext ext_edittext" value="[{if $edit->getValue('iD3GASampleRate')}][{$edit->getValue('iD3GASampleRate')}][{else}]100[{/if}]" size="5" maxlength="3" name="value[iD3GASampleRate]"> [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_SAMPLERATE_1"}]
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_SAMPLERATE_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GATrackPageLoadTime">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME"}]</label>
[{*  _gaq.push(['_gat._trackPageLoadTime']); *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GATrackPageLoadTime]" value="0">
                                <input id="blD3GATrackPageLoadTime" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GATrackPageLoadTime')}]checked[{/if}] name="value[blD3GATrackPageLoadTime]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GASiteSpeedSampleRate">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE"}]</label>
[{* _gaq.push(['_setSiteSpeedSampleRate', 5]); *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[iD3GASiteSpeedSampleRate]" value="0">
                                <input type="text" id="iD3GASiteSpeedSampleRate" class="edittext ext_edittext" value="[{if $edit->getValue('iD3GASiteSpeedSampleRate')}][{$edit->getValue('iD3GASiteSpeedSampleRate')}][{else}]1[{/if}]" size="5" maxlength="3" name="value[iD3GASiteSpeedSampleRate]"> [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE_1"}]
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_SITESPEEDSAMPLERATE_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GAUseRemarketing">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_USEREMARKETING"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAUseRemarketing]" value="0">
                                <input id="blD3GAUseRemarketing" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAUseRemarketing')}]checked[{/if}] name="value[blD3GAUseRemarketing]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_USEREMARKETING_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GAUseOptOut">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_USEOPTOUT"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAUseOptOut]" value="0">
                                <input id="blD3GAUseOptOut" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAUseOptOut')}]checked[{/if}] name="value[blD3GAUseOptOut]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_USEOPTOUT_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BOUNCEOPT"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="iSendNoBounceEventTime">[{oxmultilang ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SENDTIMEEVENT1"}]</label>
                            </dt>
                            <dd>
                                <input id="iSendNoBounceEventTime" class="edittext ext_edittext" type="text" size="5" maxlength="5" value="[{if $edit->getValue('iSendNoBounceEventTime')}][{$edit->getValue('iSendNoBounceEventTime')}][{else}]10000[{/if}]" name="value[iSendNoBounceEventTime]">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SENDTIMEEVENT2"}]
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SENDTIMEEVENT_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blSendNoBounceEventScroll">[{oxmultilang ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SENDSCROLLEVENT"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blSendNoBounceEventScroll]" value="0">
                                <input id="blSendNoBounceEventScroll" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blSendNoBounceEventScroll')}]checked[{/if}] name="value[blSendNoBounceEventScroll]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SENDSCROLLEVENT_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ECOMMERCE"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="blD3GASendECommerce">[{oxmultilang ident="D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GASendECommerce]" value="0">
                                <input id="blD3GASendECommerce" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GASendECommerce')}]checked[{/if}] name="value[blD3GASendECommerce]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GAUseNetto">[{oxmultilang ident="D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAUseNetto]" value="0">
                                <input id="blD3GAUseNetto" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAUseNetto')}]checked[{/if}] name="value[blD3GAUseNetto]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="blD3GAAllowDomainLinker">[{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER"}]</label>
[{*  _gaq.push(['_setAllowLinker', true]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAAllowDomainLinker]" value="0">
                                <input id="blD3GAAllowDomainLinker" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAAllowDomainLinker')}]checked[{/if}] name="value[blD3GAAllowDomainLinker]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GASetDomainName">[{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME"}]</label>
[{*  _gaq.push(['_setDomainName', '.example-petstore.com']);   *}]
[{*  if used _gaq.push(['_setAllowHash', false]);   *}]
                            </dt>
                            <dd>
                                <input id="sD3GASetDomainName" class="edittext ext_edittext" type="text" size="30" maxlength="200" value="[{$edit->getValue('sD3GASetDomainName')}]" name="value[sD3GASetDomainName]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GASetCookiePath">[{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH"}]</label>
[{* _gaq.push(['_setCookiePath', '/path/of/cookie/']);   *}]
                            </dt>
                            <dd>
                                <input id="sD3GASetCookiePath" class="edittext ext_edittext" type="text" size="30" maxlength="150" value="[{$edit->getValue('sD3GASetCookiePath')}]" name="value[sD3GASetCookiePath]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GACookiePathCopy">[{oxmultilang ident="D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY"}]</label>
[{* _gaq.push(['_cookiePathCopy', '/path/of/cookie/']);   *}]
                            </dt>
                            <dd>
                                <input id="sD3GACookiePathCopy"  [{$blUniversalDisabled}] class="edittext ext_edittext" type="text" size="30" maxlength="150" value="[{$edit->getValue('sD3GACookiePathCopy')}]" name="value[sD3GACookiePathCopy]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="blD3GASetClientInfo">[{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO"}]</label>
[{*  _gaq.push(['_setClientInfo', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GASetClientInfo]" value="0">
                                <input id="blD3GASetClientInfo" class="edittext ext_edittext" type="checkbox" [{$blUniversalDisabled}] value="1" [{if $edit->getValue('blD3GASetClientInfo')}]checked[{/if}] name="value[blD3GASetClientInfo]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GASetDetectFlash">[{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH"}]</label>
[{*  _gaq.push(['_setDetectFlash', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GASetDetectFlash]" value="0">
                                <input id="blD3GASetDetectFlash" class="edittext ext_edittext" type="checkbox" value="1" [{$blUniversalDisabled}] [{if $edit->getValue('blD3GASetDetectFlash')}]checked[{/if}] name="value[blD3GASetDetectFlash]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GASetDetectTitle">[{oxmultilang ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE"}]</label>
[{*  _gaq.push(['_setDetectTitle', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GASetDetectTitle]" value="0">
                                <input id="blD3GASetDetectTitle" class="edittext ext_edittext" type="checkbox" value="1" [{$blUniversalDisabled}] [{if $edit->getValue('blD3GASetDetectTitle')}]checked[{/if}] name="value[blD3GASetDetectTitle]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_CUSTOMVARS"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="blD3GAUseCustomVars">[{oxmultilang ident="D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT"}]</label>
[{*  _gaq.push(['_setCustomVar', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAUseCustomVars]" value="0">
                                <input id="blD3GAUseCustomVars" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAUseCustomVars')}]checked[{/if}] name="value[blD3GAUseCustomVars]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <table width="100%">
                    <tr>
                        <td class="edittext ext_edittext" align="left"><br>
                            <span class="d3modcfg_btn icon status_ok">
                                <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]">
                                <span></span>
                            </span>
                        </td>
                    </tr>
                </table>

                <br><br>[{oxmultilang ident="D3_GOOGLEANALYTICS_SECURITYINFORMATIONS"}]
            [{/if}]
        </td>
    </tr>
</table>
</form>

[{assign var="incpath" value=$oViewConf->getModulePath('d3modcfg_lib')|cat:"views/admin/tpl/d3_cfg_mod_inc.tpl"}]
[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident="d3mxgoogleanalytics"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3tbclgoogleanalytics_main"}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>