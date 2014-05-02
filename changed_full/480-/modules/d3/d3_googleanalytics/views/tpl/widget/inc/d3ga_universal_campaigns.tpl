[{strip}]
    [{if !$oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GASetCampNameKey')}]
        ga('set', 'campaignName', '[{$oD3GASettings->getValue('sD3GASetCampNameKey')}]');
    [{/if}]

    [{if !$oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GASetCampMediumKey')}]
        ga('set', 'campaignMedium', '[{$oD3GASettings->getValue('sD3GASetCampMediumKey')}]');
    [{/if}]

    [{if !$oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GASetCampSourceKey')}]
        ga('set', 'campaignSource', '[{$oD3GASettings->getValue('sD3GASetCampSourceKey')}]');
    [{/if}]

    [{if !$oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GASetCampTermKey')}]
        ga('set', 'campaignKeyword', '[{$oD3GASettings->getValue('sD3GASetCampTermKey')}]');
    [{/if}]

    [{if !$oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GASetCampContentKey')}]
        ga('set', 'campaignContent', '[{$oD3GASettings->getValue('sD3GASetCampContentKey')}]');
    [{/if}]

    [{if !$oD3GASettings->getValue('blD3GASetCampaignTrack') && $oD3GASettings->getValue('sD3GASetCampIdKey')}]
        ga('set', 'campaignId', '[{$oD3GASettings->getValue('sD3GASetCampIdKey')}]');
    [{/if}]
[{/strip}]