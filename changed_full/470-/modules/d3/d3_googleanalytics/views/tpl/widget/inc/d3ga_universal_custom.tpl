[{if $oD3GASettings->getValue('blD3GAUseCustomVars')}]
[{strip}]
    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        [{assign var="order" value=$oView->getOrder()}]
        [{assign var="oPayment" value=$order->getPayment()}]
        [{assign var="oDelSet" value=$order->getDelSet()}]
        [{assign var="aVoucherSerieList" value=$order->d3getVoucherSerieList()}]
    [{/if}]

    [{* dimension 1 set customer gender *}]
    [{if $oxcmp_user}]
        ga(
            'set',
            'dimension1',
            '[{if $oxcmp_user->oxuser__oxsal->value == 'MR'}]male[{elseif $oxcmp_user->oxuser__oxsal->value == 'MRS'}]female[{/if}]'
        );
    [{/if}]

    [{* dimension 2 set payment type *}]
    [{if $oViewConf->getActiveClassName() == 'thankyou' && $oPayment}]
        ga(
            'set',
            'dimension2',
            '[{$oPayment->getFieldData('oxdesc')}]'
        );
    [{/if}]

    [{* dimension 3 set delivery type *}]
    [{if $oViewConf->getActiveClassName() == 'thankyou' && $oDelSet}]
        ga(
            'set',
            'dimension3',
            '[{$oDelSet->getFieldData('oxtitle')}]'
        );
    [{/if}]

    [{* dimension 4 set vouchers *}]
    [{if $oViewConf->getActiveClassName() == 'thankyou' && $aVoucherSerieList}]
        ga(
            'set', {
                [{foreach from=$aVoucherSerieList item="oVoucherSerie"}]
                    'dimension4' :  '[{$oVoucherSerie->getFieldData('oxserienr')}]',
                [{/foreach}]
            }
        );
    [{/if}]

    [{* dimension 5 set currency *}]
    [{if $oViewConf->getActiveClassName() == 'thankyou' && $order}]
        ga(
            'set',
            'dimension5',
            '[{$order->getFieldData('oxcurrency')}]'
        );
    [{/if}]

    [{* dimension 6 set new customer status *}]
    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        ga(
            'set',
            'dimension6',
            '[{$oView->isNewCustomer()}]'
        );
    [{/if}]
[{/strip}][{/if}]