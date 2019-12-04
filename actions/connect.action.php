<?php
    require("config.action.php");

    if(strpos($baseURL, 'localhost')) {
        $srvr = 'localhost';
        $usr = "amjedidiah";
        $pass = "&3:8:8-$6048";
        $db = "";
    } else {
        $srvr = '';
        $usr = "";
        $pass = "";
        $db = "";
    }

    $mysqli = new mysqli($srvr, $usr, $pass, $db);
    if ($mysqli->connect_errno) {
        print_r("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>