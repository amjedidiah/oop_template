<?php

require("../session.action.php");
require("../connect.action.php");

// Get POST variables
$ID = $_POST['loginID'];
$pass = $_POST['loginPass'];

$md5ID = wvEncrypt($ID);
$md5pass = wvEncrypt($pass);

try {
    // Check if all are not empty
    ifPostIsEmpty($_POST);

    $get_admin = $mysqli->query("SELECT * FROM auth_admin WHERE id='$md5ID' AND pass='$md5pass'");
    if ($get_admin->num_rows > 0) {

        // CREATE SESSSION
        createSession($md5ID, $md5pass);

        throwActionMessage("success", 'Login successful<br />We will redirect you to your dashboard shortly<p>If nothing happens?<br /><a href="./">Click here</a></p>', "./admin");
    } else {
        throw new customException("Incorrect ID or password");
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
