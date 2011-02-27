[{include file="headitem.tpl" title="D3_GOOGLEANALYTICS_CFG_TITLE"|oxmultilangassign}]

<link rel="stylesheet" type="text/css" href="[{$oViewConf->getResourceUrl() }]d3_mod_cfg.css">

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
.questbox{
    background-color: #07f;
    color: white;
    float: right;
    position: relative;
    display: block;
    padding: 1px 4px;
    font-weight: bold;
    z-index: 98;
    cursor: help;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 10px;
    line-height: 12px;
}

.helptextbox{
    background-color: white;
    color: black;
    border: 1px solid black;
    position: absolute;
    overflow: hidden;
    padding: 5px;
    margin-top: 15px;
    width: 300px;
    z-index: 99;
}

fieldset{
    border: 1px inset black;
    background-color: #F0F0F0;
}

legend{
    font-weight: bold;
}

dl dt{
    font-weight: normal;
    width: 55%;
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

            <table style="width: 100%">
                <tr>
		            <td style="width:50%; border-right: 1px solid #999;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td class="edittext ext_edittext">
                                    [{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULEACTIVE"}]
                                </td>
                                <td class="edittext ext_edittext">
                                    <input type="hidden" name="editval[d3_cfg_mod__oxactive]" value='0'>
                                    <input class="edittext ext_edittext" type="checkbox" name="editval[d3_cfg_mod__oxactive]" value='1' [{if $edit->d3_cfg_mod__oxactive->value == 1}]checked[{/if}]>
                                </td>
                            </tr>
                            <tr>
                                <td class="edittext ext_edittext">
                                    [{if $value->d3_cfg_mod__blMultiVariants_debug == 1}]<span style="font-weight: bold; color: darkred;">[{/if}][{oxmultilang ident="D3_CFG_MOD_GENERAL_DEBUGACTIVE"}][{if $value->d3_cfg_mod__blMultiVariants_debug == 1}]</span>[{/if}]&nbsp;
                                </td>
                                <td class="edittext ext_edittext">
                                    <input type="hidden" name="value[d3_cfg_mod__blMultiVariants_debug]" value="0">
                                    <input class="edittext ext_edittext" type="checkbox" name="value[d3_cfg_mod__blMultiVariants_debug]" value='1' [{if $value->d3_cfg_mod__blMultiVariants_debug == 1}]checked[{/if}]>
                                </td>
                            </tr>
                        </table>
                    </td>
		            <td>
                        [{assign var="blD3HasLog" value=$oView->checkD3Log() }]
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td class="edittext ext_edittext" style="width: 100%;">
                                    [{if $blD3HasLog}]
                                        [{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING"}]
                                    [{/if}]
                                </td>
                                <td class="edittext ext_edittext" align="left">
                                    [{if $blD3HasLog}]
                                        <select name="editval[d3_cfg_mod__oxismodulelog]" class="edittext">
                                            <option value="0" [{if $edit->d3_cfg_mod__oxismodulelog->value == 0}]selected[{/if}]>[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING_NONE"}]</option>
                                            <option value="1" [{if $edit->d3_cfg_mod__oxismodulelog->value == 1}]selected[{/if}]>[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING_ALL"}]</option>
                                            <option value="2" [{if $edit->d3_cfg_mod__oxismodulelog->value == 2}]selected[{/if}]>[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING_ERRORS"}]</option>
                                        </select>
                                    [{/if}]
                                </td>
                            </tr>
                            <tr>
                                <td class="edittext ext_edittext" style="width: 100%;">
                                    &nbsp;
                                </td>
                                <td class="edittext ext_edittext" align="left">
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            [{if $oView->getValueStatus() == 'error'}]
                <hr>
                <b>[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_DESC"}]</b><br>
                <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_BTN"}]">
                </form>
            [{else}]

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_MULTIVAR_MAIN"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_MULTIVAR_MAIN_USEAJAX"}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blMultiVariants_useAjax]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" name="value[d3_cfg_mod__blMultiVariants_useAjax]" [{if $value->d3_cfg_mod__blMultiVariants_useAjax == 1}]checked[{/if}]>
                                [{ oxinputhelp ident="D3_MULTIVAR_MAIN_USEAJAX_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_MULTIVAR_MAIN_SEPARATOR"}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="1" maxlength="1" name="value[d3_cfg_mod__sMultiVariants_separator]" value='[{if $value->d3_cfg_mod__sMultiVariants_separator}][{$value->d3_cfg_mod__sMultiVariants_separator}][{else}]|[{/if}]'>
                                [{ oxinputhelp ident="D3_MULTIVAR_MAIN_SEPARATOR_DESC" }]
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

            [{/if}]


[{include file="bottomitem.tpl"}]

<script type="text/javascript">
if (parent.parent)
{   parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
    parent.parent.sMenuItem    = "[{oxmultilang ident="d3mxmultivariants"}]";
    parent.parent.sMenuSubItem = "[{oxmultilang ident="d3tbclmultivariants_main"}]";
    parent.parent.sWorkArea    = "[{$_act}]";
    parent.parent.setTitle();
}
</script>