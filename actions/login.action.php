<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$email = $_POST['loginEmail'];
$pass = $_POST['loginPass'];

$md5email = wvEncrypt($email);
$md5pass = wvEncrypt($pass);

try {

    // Check if all are not empty
    ifPostIsEmpty($_POST);
    ifEmailIsValid($email);

    $get_user = $mysqli->query("SELECT * FROM auth WHERE email='$email' AND pass='$md5pass'");
    if ($get_user->num_rows > 0) {

        // CREATE SESSSION
        createSession($md5email, $md5pass);

        throwActionMessage("success", 'Login successful<br />We will redirect you to your dashboard shortly<p>If nothing happens?<br /><a href="./user">Click here</a></p>', "./user");
    } else {
        throw new customException("Incorrect email or password");
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
