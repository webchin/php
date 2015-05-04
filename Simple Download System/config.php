<?php 

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=121


// وشەی تایبەت بۆ باشتر تێکەڵ کردنی بەستەرەکانی داگرتن و شاردنەوەیان
$salt = 'SczTqwdC5jRqKAvm';
$domain = 'http://www.domain.com';

$hostname = "localhost";
$database = "downloads";
$username = "root";
$password = "";
$con = mysql_connect($hostname, $username, $password); 
mysql_select_db($database, $con);
mysql_query("SET NAMES 'UTF8'");
?>