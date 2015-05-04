<?php

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=119

$hostname = "localhost";
$database = "test_database";
$username = "test_user";
$password = "test_password";
$con = mysql_connect($hostname, $username, $password); 
mysql_select_db($database, $con);
mysql_query("SET NAMES 'UTF8'");
?>