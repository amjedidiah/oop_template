<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$r3s3tc0d3 = $_POST['r3s3tc0d3'];

try {
    // Check if all are not empty
    ifPostIsEmpty($_POST);

    $get_user = $mysqli->query("SELECT email FROM auth WHERE reset_key='$r3s3tc0d3'");
    print_r($get_user->fetch_assoc()['email']);
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
