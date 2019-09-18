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
                                <input type="radio" name="value[sD3GAType]" value="gtag" checked> [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_GTAG"}]
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_GATYPE_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GAId">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_GAID"}]</label>
                            </dt>
                            <dd>
                                <input id="sD3GAId" class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$edit->getValue('sD3GAId')}]" name="value[sD3GAId]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_GAID_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GAAdditionalProperties">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_ADDPROP"}]</label>
                            </dt>
                            <dd>
                                <textarea id="sD3GAAdditionalProperties" class="confinput" name="valuearr[sD3GAAdditionalProperties]">[{$edit->getEditValue('sD3GAAdditionalProperties')}]</textarea>
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_COOKIEPREFIX_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GAAnonymizeIP">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAAnonymizeIP]" value="0">
                                <input id="blD3GAAnonymizeIP" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAAnonymizeIP')}]checked[{/if}] name="value[blD3GAAnonymizeIP]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC"}]
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
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                                <span style="font-weight: bold;">
                                    [{oxmultilang ident="D3_GOOGLEANALYTICS_COOKIE"}]
                                </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="sD3GACookiePrefix">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_COOKIEPREFIX"}]</label>
                            </dt>
                            <dd>
                                <input id="sD3GACookiePrefix" class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$edit->getValue('sD3GACookiePrefix')}]" name="value[sD3GACookiePrefix]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_COOKIEPREFIX_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GACookieDomain">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_COOKIEDOMAIN"}]</label>
                            </dt>
                            <dd>
                                <input id="sD3GACookieDomain" class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$edit->getValue('sD3GACookieDomain')}]" name="value[sD3GACookieDomain]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_COOKIEDOMAIN_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GACookieExpiration">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_COOKIEEXPIRATION"}]</label>
                            </dt>
                            <dd>
                                <input id="sD3GACookieExpiration" class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$edit->getValue('sD3GACookieExpiration')}]" name="value[sD3GACookieExpiration]"> in Sekunden
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_COOKIEEXPIRATION_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_CROSSDOMAIN"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="sD3GACrossDomainDomain">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_CROSSDOMAINDOMAINS"}]</label>
                            </dt>
                            <dd>
                                <textarea id="sD3GACrossDomainDomain" class="confinput" name="valuearr[sD3GACrossDomainDomain]">[{$edit->getEditValue('sD3GACrossDomainDomain')}]</textarea>
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_COOKIEPREFIX_DESC"}]
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_DIMENSIONS"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="sD3GADimensionList">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_DIMENSIONSLIST"}]</label>
                            </dt>
                            <dd>
                                <textarea id="sD3GADimensionList" class="confinput" name="valuearr[sD3GADimensionList]">[{$edit->getEditValue('sD3GADimensionList')}]</textarea>
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_MAIN_COOKIEPREFIX_DESC"}]
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
                                <label for="blUseBounceRateOptimization">[{oxmultilang ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SWITCH"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blUseBounceRateOptimization]" value="0">
                                <input id="blUseBounceRateOptimization" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blUseBounceRateOptimization')}]checked[{/if}] name="value[blUseBounceRateOptimization]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_BOUNCEOPT_SWITCH_DESC"}]
                            </dd>
                        </dl>
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

[{*--------------------------------------*}]

                <hr>

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
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ANALYTICSREMARKETING"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="blD3GAUseAnalyticsRemarketing">[{oxmultilang ident="D3_GOOGLEANALYTICS_ANALYTICSREMARKETING_TRANSMIT"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GAUseAnalyticsRemarketing]" value="0">
                                <input id="blD3GAUseAnalyticsRemarketing" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GAUseAnalyticsRemarketing')}]checked[{/if}] name="value[blD3GAUseAnalyticsRemarketing]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_ANALYTICSREMARKETING_TRANSMIT_DESC"}]
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
            [{/if}]
        </td>
    </tr>
</table>
</form>

[{include file="d3_cfg_mod_inc.tpl"}]
