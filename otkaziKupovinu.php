<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");

include 'sqlclass.php';
$db = new Mysql();
$db->dbConnect();

if (isset($_REQUEST['id'])){ 
$sql = "DELETE FROM kupovina WHERE kupovinaID=".$_REQUEST['id'];
if ($db->ExecuteQuery($sql) === TRUE) {
    echo "Obrisana kupovina";
} else {
    echo "Nije obrisana...";
}

$db->dbDisconnect();

}
?>