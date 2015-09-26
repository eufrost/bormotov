<?php

$login = 'nomera';
$pwd = '1474147';

mysql_connect('localhost', $login, $pwd) or die(mysql_error());
mysql_select_db('nomera');
mysql_query('SET NAMES "UTF8"');