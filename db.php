<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "mojabaza";
$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
    printf("Konekcija neuspesna: %s\n", $mysqli->connect_error);
    exit();
}else{
    printf("Konekcija uspesna: %s\n");
    echo("ALO BRE");

}
$mysqli->set_charset("utf8");
?>