<?php
$dbServerName = "127.0.0.1";
$dbUserName = "root";
$dbPassword = "";
$dbName = "footsteps";


$dbConnect = new mysqli ($dbServerName, $dbUserName,$dbPassword, $dbName);
$dbConnect ->set_charset('UTF8');



if ($dbConnect -> connect_errno) {
    echo "Database Error - " .$dbConnect -> connect_errno;
}
?>