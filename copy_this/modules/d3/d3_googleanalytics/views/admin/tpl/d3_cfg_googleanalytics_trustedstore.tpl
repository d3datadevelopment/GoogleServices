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

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <label for="sD3GATSActive">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ACTIVE"}]</label>
                        </dt>
                        <dd>
                            <input type="hidden" name="" value="0">
                            <input id="sD3GATSActive" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('sD3GATSActive')}]checked[{/if}] name="value[sD3GATSActive]">
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_ACTIVE_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="sD3GATSId">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ID"}]</label>
                        </dt>
                        <dd>
                            <input id="sD3GATSId" class="edittext ext_edittext" type="text" size="15" maxlength="20" value="[{$edit->getValue('sD3GATSId')}]" name="value[sD3GATSId]">
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_ID_DESC"}]
                        </dd>
                    </dl>

[{*
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
                            <label for="blD3GASampleRate">[{oxmultilang ident="D3_GOOGLEANALYTICS_MAIN_SAMPLERATE"}]</label>
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
*}]
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