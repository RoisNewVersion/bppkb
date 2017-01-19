<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sambung = "localhost";
$database_sambung = "bppkb";
$username_sambung = "root";
$password_sambung = "";
$sambung = mysql_pconnect($hostname_sambung, $username_sambung, $password_sambung) or trigger_error(mysql_error(),E_USER_ERROR); 
?>