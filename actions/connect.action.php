<?php
require("config.action.php");


$srvr = 'localhost';

if (strpos($baseURL, 'localhost')) {
    $usr = "root";
    $pass = "amjedidiah";
    $db = "weekvest";
} else {
    $usr = "weekvest_admin";
    $pass = "WhiskeyTataJalingo@6048";
    $db = "weekvest_main";
}

$mysqli = new mysqli($srvr, $usr, $pass, $db);
if ($mysqli->connect_errno) {
    print_r("Connection failed: %s\n" . $mysqli->connect_error);
    exit();
}
