[{if $oD3GASettings->getValue('blD3GAUseAnalyticsRemarketing') || $oD3GASettings->getValue('blD3GAUseCustomVars')}]
[{strip}]
    [{if $oViewConf->getActiveClassName() == 'thankyou'}]
        [{assign var="order" value=$oView->getOrder()}]
        [{assign var="oPayment" value=$order->getPayment()}]
        [{assign var="oDelSet" value=$order->getDelSet()}]
        [{assign var="aVoucherSerieList" value=$order->d3getVoucherSerieList()}]
    [{/if}]

    [{assign var="iDimensionCount" value=0}]

    [{if $oD3GASettings->getValue('blD3GAUseAnalyticsRemarketing')}]
        [{* dimension 2 set payment type *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou'}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                [{$sD3GARemarketingProdId}]
            );
        [{/if}]

        [{* dimension 2 set payment type *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou'}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{$sD3GARemarketingPageType}]'
            );
        [{/if}]

        [{* dimension 2 set payment type *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou'}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{$sD3GARemarketingPrice}]'
            );
        [{/if}]
    [{/if}]

    [{if $oD3GASettings->getValue('blD3GAUseCustomVars')}]
        [{* dimension 1 set customer gender *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oxcmp_user}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{if $oxcmp_user->oxuser__oxsal->value == 'MR'}]male[{elseif $oxcmp_user->oxuser__oxsal->value == 'MRS'}]female[{/if}]'
            );
        [{/if}]

        [{* dimension 2 set payment type *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou' && $oPayment}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{$oPayment->getFieldData('oxdesc')}]'
            );
        [{/if}]

        [{* dimension 3 set delivery type *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou' && $oDelSet}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{$oDelSet->getFieldData('oxtitle')}]'
            );
        [{/if}]

        [{* dimension 4 set vouchers *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou' && $aVoucherSerieList}]
            ga(
                'set', {
                    [{foreach from=$aVoucherSerieList item="oVoucherSerie"}]
                        'dimension[{$iDimensionCount}]' :  '[{$oVoucherSerie->getFieldData('oxserienr')}]',
                    [{/foreach}]
                }
            );
        [{/if}]

        [{* dimension 5 set currency *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou' && $order}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{$order->getFieldData('oxcurrency')}]'
            );
        [{/if}]

        [{* dimension 6 set new customer status *}]
        [{assign var="iDimensionCount" value=$iDimensionCount+1}]
        [{if $oViewConf->getActiveClassName() == 'thankyou'}]
            ga(
                'set',
                'dimension[{$iDimensionCount}]',
                '[{$oView->isNewCustomer()}]'
            );
        [{/if}]
    [{/if}]
[{/strip}][{/if}]