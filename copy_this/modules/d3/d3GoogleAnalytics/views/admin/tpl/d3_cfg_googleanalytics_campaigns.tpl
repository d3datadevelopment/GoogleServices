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
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSGENERAL"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK"}]
[{*  _gaq.push(['_setCampaignTrack', false]);  *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASetCampaignTrack]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASetCampaignTrack}]checked[{/if}] name="value[d3_cfg_mod__blD3GASetCampaignTrack]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTHANKYOUONLY"}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASetCampaignOnThankyouOnly]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASetCampaignOnThankyouOnly}]checked[{/if}] name="value[d3_cfg_mod__blD3GASetCampaignOnThankyouOnly]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTHANKYOUONLY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT"}]
[{*  _gaq.push(['_setCampaignCookieTimeout', 31536000000]);  *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="30" value="[{$value->d3_cfg_mod__sD3GASetCampaignCookieTimeout}]" name="value[d3_cfg_mod__sD3GASetCampaignCookieTimeout]"> [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_MS"}]
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY"}]
[{* _gaq.push(['_setCampNOKey', 'ga_nooverride']);    *}]
                            </dt>
                            <dd>
                                <input type="hidden" name="value[d3_cfg_mod__blD3GASetCampNoKey]" value="0">
                                <input class="edittext ext_edittext" type="checkbox" value="1" [{if $value->d3_cfg_mod__blD3GASetCampNoKey}]checked[{/if}] name="value[d3_cfg_mod__blD3GASetCampNoKey]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSCODE"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSCODE_CODE"}]
                            </dt>
                            <dd>
                                <textarea class="edittext ext_edittext" cols="80" rows="7" name="value[d3_cfg_mod__sD3GACampaignCode]">[{strip}]
                                    [{$value->d3_cfg_mod__sD3GACampaignCode}]
                                [{/strip}]</textarea>
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSCODE_CODE_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    </div>
                </div>

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY"}]
[{*  _gaq.push(['_setCampNameKey', 'ga_campaign']);  *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="100" value="[{$value->d3_cfg_mod__sD3GASetCampNameKey}]" name="value[d3_cfg_mod__sD3GASetCampNameKey]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY"}]
[{*  _gaq.push(['_setCampMediumKey', 'ga_medium']);  *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="100" value="[{$value->d3_cfg_mod__sD3GASetCampMediumKey}]" name="value[d3_cfg_mod__sD3GASetCampMediumKey]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY"}]
[{*  _gaq.push(['_setCampSourceKey', 'ga_source']);  *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="100" value="[{$value->d3_cfg_mod__sD3GASetCampSourceKey}]" name="value[d3_cfg_mod__sD3GASetCampSourceKey]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY"}]
[{* _gaq.push(['_setCampTermKey', 'ga_term']);   *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="100" value="[{$value->d3_cfg_mod__sD3GASetCampTermKey}]" name="value[d3_cfg_mod__sD3GASetCampTermKey]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY_DESC" }]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY"}]
[{*  _gaq.push(['_setCampContentKey', 'ga_content']);  *}]
                            </dt>
                            <dd>
                                <input class="edittext ext_edittext" type="text" size="30" maxlength="100" value="[{$value->d3_cfg_mod__sD3GASetCampContentKey}]" name="value[d3_cfg_mod__sD3GASetCampContentKey]">
                                [{ oxinputhelp ident="D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY_DESC" }]
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
        </td>
    </tr>
</table>


[{assign var="incpath" value=$oViewConf->getModulePath('d3modcfg_lib')|cat:"views/admin/tpl/d3_cfg_mod_inc.tpl"}]
[{include file=$incpath}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident="d3mxgoogleanalytics"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3tbclgoogleanalytics_adwords"}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>