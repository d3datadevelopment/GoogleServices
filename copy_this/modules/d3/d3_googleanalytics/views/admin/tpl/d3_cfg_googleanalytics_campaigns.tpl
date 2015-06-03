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

            [{if $oView->getValueStatus() == 'error'}]
                    <hr>
                    <span style="font-weight: bold;">[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_DESC"}]</span>
                    <br>
                    <br>
                    <span class="d3modcfg_btn fixed icon status_attention">
                        <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_BTN"}]">
                        <span></span>
                    </span>
                </form>
                </div>
            [{else}]

                <div class="servicedesc">[{oxmultilang ident="D3_GOOGLEANALYTICS_CAMPAIGNS_DESC"}] [{oxinputhelp ident="D3_GOOGLEANALYTICS_CAMPAIGNS_DESC1"}]</div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_CAMPAIGNSETTINGS"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <label for="blD3GASetCampaignTrack">[{oxmultilang ident="D3_GOOGLEANALYTICS_SETCAMPAIGNTRACK"}]</label>
                                [{*  _gaq.push(['_setCampaignTrack', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GASetCampaignTrack]" value="0">
                                <input id="blD3GASetCampaignTrack" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GASetCampaignTrack')}]checked[{/if}] name="value[blD3GASetCampaignTrack]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_SETCAMPAIGNTRACK_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="blD3GASetCampaignOnThankyouOnly">[{oxmultilang ident="D3_GOOGLEANALYTICS_SETCAMPAIGNTHANKYOUONLY"}]</label>
                            </dt>
                            <dd>
                                <input type="hidden" name="value[blD3GASetCampaignOnThankyouOnly]" value="0">
                                <input id="blD3GASetCampaignOnThankyouOnly" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('blD3GASetCampaignOnThankyouOnly')}]checked[{/if}] name="value[blD3GASetCampaignOnThankyouOnly]">
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_SETCAMPAIGNTHANKYOUONLY_DESC"}]
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <label for="sD3GACampaignCode">[{oxmultilang ident="D3_GOOGLEANALYTICS_CAMPAIGNCODE_CODE"}]</label>
                            </dt>
                            <dd>
                                <textarea id="sD3GACampaignCode" class="edittext ext_edittext" cols="80" rows="7" name="value[sD3GACampaignCode]">[{strip}]
                                    [{$edit->getValue('sD3GACampaignCode')}]
                                [{/strip}]</textarea>
                                [{oxinputhelp ident="D3_GOOGLEANALYTICS_CAMPAIGNCODE_CODE_DESC"}]
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

            [{/if}]
        </td>
    </tr>
</table>

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident="d3mxgoogleanalytics"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3tbclgoogleanalytics_adwords"}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>