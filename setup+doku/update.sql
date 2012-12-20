# ==== 2.4.1 => 3.0.0.0 ====
UPDATE `d3_cfg_mod` SET 
`OXVERSION` = '3.0.0.0', 
`OXBASECONFIG` = '--------------------------------------------------------------------------------
vUrWmloMytUSWhDL3c4eit4MmRUMHFlQU8xODV6QThqaitaajdRTUhyL08yZStjcU01TThTOWV3YnNNd
UwzRUd6RCtrZ0dHTFZEbmlMZ3pPbkhubysxVndaUkNVUDFLSmZDdUM3a0wycS9NdzVzM0lzQnJTaXJlW
UNpeVQ0akwyZVpDdFlSUEV2UkloR29zMFowZlRVdXhjc0I0bGpkbXVPWXFJc2tXODcrcDRWd2ZicVlzd
0srdlM1Zk1XN2JvTFJNTHpsTHpsTnRPR0haaFd4MXJ5NXd0YjRwekxYbDV4dTBWL2diMENQL2VNNVE4M
XVrbndtcEZQL2pCVlUwRHZrZzEwSmpZZFZDWnZKZ0RaNlhuTGZiS3dRQ0xua1JUdUV6eVJRcXZ1TVlEb
jQ9
--------------------------------------------------------------------------------',
`OXINSTALLDATE` = NOW(), 
`OXNEWREVISION` = '60' 
WHERE `OXMODID` = 'd3_googleanalytics';

UPDATE `d3_cfg_mod` SET `OXREVISION` = `OXNEWREVISION` WHERE `OXMODID` = 'd3_googleanalytics';