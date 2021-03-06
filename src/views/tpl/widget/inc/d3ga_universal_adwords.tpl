[{strip}]
    [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')}]
        [{block name="UniversalAdwordsCampaignOn"}]
            [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')
            && $oD3GASettings->getValue('sD3GASetCampNameKey')}]
                ga('set', 'campaignName', '[{$oD3GASettings->getValue('sD3GASetCampNameKey')}]');
            [{/if}]

            [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')
            && $oD3GASettings->getValue('sD3GASetCampMediumKey')}]
                ga('set', 'campaignMedium', '[{$oD3GASettings->getValue('sD3GASetCampMediumKey')}]');
            [{/if}]

            [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')
            && $oD3GASettings->getValue('sD3GASetCampSourceKey')}]
                ga('set', 'campaignSource', '[{$oD3GASettings->getValue('sD3GASetCampSourceKey')}]');
            [{/if}]

            [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')
            && $oD3GASettings->getValue('sD3GASetCampTermKey')}]
                ga('set', 'campaignKeyword', '[{$oD3GASettings->getValue('sD3GASetCampTermKey')}]');
            [{/if}]

            [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')
            && $oD3GASettings->getValue('sD3GASetCampContentKey')}]
                ga('set', 'campaignContent', '[{$oD3GASettings->getValue('sD3GASetCampContentKey')}]');
            [{/if}]

            [{if false == $oD3GASettings->getValue('blD3GASetAdWordsCampaignTrack')
            && $oD3GASettings->getValue('sD3GASetCampIdKey')}]
                ga('set', 'campaignId', '[{$oD3GASettings->getValue('sD3GASetCampIdKey')}]');
            [{/if}]
        [{/block}]
    [{else}]
        [{block name="UniversalAdwordsCampaignOff"}]
            ga('set', 'campaignTrack', false);
        [{/block}]
    [{/if}]
[{/strip}]