[{include file="headitem.tpl" title="D3_GOOGLEANALYTICS_CFG_TITLE"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{if $updatelist == 1}]
        UpdateList('[{$oxid}]');
    [{/if}]

    function UpdateList( sID)
    {
        let oSearch = parent.list.document.getElementById("search");
        oSearch.oxid.value=sID;
        oSearch.fnc.value='';
        oSearch.submit();
    }

    function EditThis( sID)
    {
        let oTransfer = document.getElementById("transfer");
        oTransfer.oxid.value=sID;
        oTransfer.cl.value='';
        oTransfer.submit();

        let oSearch = parent.list.document.getElementById("search");
        oSearch.actedit.value = 0;
        oSearch.oxid.value=sID;
        oSearch.submit();
    }

    function _groupExp(el) {
        let _cur = el.parentNode;

        if (_cur.className === "exp") _cur.className = "";
          else _cur.className = "exp";
    }

    -->
</script>

<style>
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

            <div class="servicedesc">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_DESC"}] [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_DESC1"}]</div>
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
                            <input type="hidden" name="value[sD3GATSActive]" value="0">
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
                    <dl>
                        <dt>
                            <label for="iEstShippingTimeValue">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER"}]</label>
                        </dt>
                        <dd>
                            <input id="iEstShippingTimeValue" type="text" name="value[iEstShippingTimeValue]" class="edittext ext_edittext" size="3" maxlength="5" value="[{if $edit->getValue('iEstShippingTimeValue')}][{$edit->getValue('iEstShippingTimeValue')}][{else}]1[{/if}]" [{$readonly}]>
                            [{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_DAYS"}]
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="iEstShippingTimeValueOutOfStock">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_OUTOFSTOCK"}]</label>
                        </dt>
                        <dd>
                            <input id="iEstShippingTimeValueOutOfStock" type="text" name="value[iEstShippingTimeValueOutOfStock]" class="edittext ext_edittext" size="3" maxlength="5" value="[{if $edit->getValue('iEstShippingTimeValueOutOfStock')}][{$edit->getValue('iEstShippingTimeValueOutOfStock')}][{else}]1[{/if}]" [{$readonly}]>
                            [{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTER_DAYS"}]
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_ESTSHIPDATEAFTEROUTOFSTOCK_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="iEstDeliveryTimeValue">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ESTDELDATEAFTER"}]</label>
                        </dt>
                        <dd>
                            <input id="iEstDeliveryTimeValue" type="text" name="value[iEstDeliveryTimeValue]" class="edittext ext_edittext" size="3" maxlength="5" value="[{if $edit->getValue('iEstDeliveryTimeValue')}][{$edit->getValue('iEstDeliveryTimeValue')}][{else}]1[{/if}]" [{$readonly}]>
                            [{oxmultilang ident="D3_GOOGLEANALYTICS_TS_ESTDELDATEAFTER_DAYS"}]
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_ESTDELDATEAFTER_DESC"}]
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPING"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <label for="sD3GATSShoppingActive">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGACTIVE"}]</label>
                        </dt>
                        <dd>
                            <input type="hidden" name="value[sD3GATSShoppingActive]" value="0">
                            <input id="sD3GATSShoppingActive" class="edittext ext_edittext" type="checkbox" value="1" [{if $edit->getValue('sD3GATSShoppingActive')}]checked[{/if}] name="value[sD3GATSShoppingActive]">
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_SHOPPINGACTIVE_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="sD3GATSShoppingAccountId">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGACCOUNTID"}]</label>
                        </dt>
                        <dd>
                            <input type="text" id="sD3GATSShoppingAccountId" class="edittext ext_edittext" value="[{if $edit->getValue('sD3GATSShoppingAccountId')}][{$edit->getValue('sD3GATSShoppingAccountId')}][{/if}]" size="20" maxlength="20" name="value[sD3GATSShoppingAccountId]">
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_SHOPPINGACCOUNTID_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="sD3GATSShoppingCountry">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGCOUNTRY"}]</label>
                        </dt>
                        <dd>
                            <input type="text" id="sD3GATSShoppingCountry" class="edittext ext_edittext" value="[{if $edit->getValue('sD3GATSShoppingCountry')}][{$edit->getValue('sD3GATSShoppingCountry')}][{else}]DE[{/if}]" size="5" maxlength="2" name="value[sD3GATSShoppingCountry]">
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_SHOPPINGCOUNTRY_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="sD3GATSShoppingLanguage">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGLANGUAGE"}]</label>
                        </dt>
                        <dd>
                            <input type="text" id="sD3GATSShoppingLanguage" class="edittext ext_edittext" value="[{if $edit->getValue('sD3GATSShoppingLanguage')}][{$edit->getValue('sD3GATSShoppingLanguage')}][{else}]de[{/if}]" size="5" maxlength="2" name="value[sD3GATSShoppingLanguage]">
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_SHOPPINGLANGUAGE_DESC"}]
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="sD3GATSShoppingArtId">[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGARTID"}]</label>
                        </dt>
                        <dd>
                            <select id="sD3GATSShoppingArtId" name="value[sD3GATSShoppingArtId]" size="1" class="edittext ext_edittext">
                                <option value="oxartnum" [{if $edit->getValue('sD3GATSShoppingArtId') == 'oxartnum'}]selected[{/if}]>[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGARTID_ARTNUM"}]</option>
                                <option value="oxid" [{if $edit->getValue('sD3GATSShoppingArtId') == 'oxid'}]selected[{/if}]>[{oxmultilang ident="D3_GOOGLEANALYTICS_TS_SHOPPINGARTID_OXID"}]</option>
                            </select>
                            [{oxinputhelp ident="D3_GOOGLEANALYTICS_TS_SHOPPINGARTID_DESC"}]
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

        </td>
    </tr>
</table>
</form>

[{include file="d3_cfg_mod_inc.tpl"}]
