# ==== 2.0.0 PE4 => 2.1.0 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.0', `OXINSTALLDATE` = NOW(), `OXREVISION` = '14', `OXNEWREVISION` = '14' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.0 PE4 => 2.1.1 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.1', `OXINSTALLDATE` = NOW(), `OXREVISION` = '16', `OXNEWREVISION` = '16' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.1 PE4 => 2.1.2 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.2', `OXINSTALLDATE` = NOW(), `OXREVISION` = '18', `OXNEWREVISION` = '18' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.2 PE4 => 2.1.3 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.3', `OXINSTALLDATE` = NOW(), `OXREVISION` = '20', `OXNEWREVISION` = '20' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.3 PE4 => 2.1.4 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.4', `OXINSTALLDATE` = NOW(), `OXREVISION` = '21', `OXNEWREVISION` = '21' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.4 PE4 => 2.1.5 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.5', `OXINSTALLDATE` = NOW(), `OXREVISION` = '23', `OXNEWREVISION` = '23' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.5 PE4 => 2.1.6 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.6', `OXINSTALLDATE` = NOW(), `OXREVISION` = '25', `OXNEWREVISION` = '25' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.6 PE4 => 2.1.7 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.1.7', `OXINSTALLDATE` = NOW(), `OXREVISION` = '26', `OXNEWREVISION` = '26' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.1.7 PE4 => 2.2.0 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.2.0', `OXINSTALLDATE` = NOW(), `OXREVISION` = '30', `OXNEWREVISION` = '30' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.2.0 PE4 => 2.2.1 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.2.1', `OXINSTALLDATE` = NOW(), `OXREVISION` = '38', `OXNEWREVISION` = '38' WHERE `OXMODID` = 'd3_googleanalytics';

# ==== 2.2.1 PE4 => 2.2.2 PE4 / EE4 / CE4 ====
UPDATE `d3_cfg_mod` SET `OXVERSION` = '2.2.2', `OXINSTALLDATE` = NOW(), `OXNEWREVISION` = '42' WHERE `OXMODID` = 'd3_googleanalytics';
UPDATE `d3_cfg_mod` SET `OXREVISION` = `OXNEWREVISION` WHERE `OXMODID` = 'd3_googleanalytics';