[{strip}]
    [{if $oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GACampaignCode') &&
    (false == $oD3GASettings->getValue('blD3GASetCampaignOnThankyouOnly') || $oViewConf->getActiveClassName() == 'thankyou')}]

        [{$oD3GASettings->getValue('sD3GACampaignCode')}]

    [{/if}]
[{/strip}]