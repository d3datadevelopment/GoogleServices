# ==== 2.0.0 PE4 => 2.1.0 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.0', `OXINSTALLDATE` = NOW(), `OXREVISION` = '14', `OXNEWREVISION` = '14' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.0 PE4 => 2.1.1 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.1', `OXINSTALLDATE` = NOW(), `OXREVISION` = '16', `OXNEWREVISION` = '16' WHERE `OXMODID` = 'd3_googleanalytics';
