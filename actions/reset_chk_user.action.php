<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$email = $_POST['email'];

try {
    // Check if all are not empty
    ifPostIsEmpty($_POST);
    ifEmailIsValid($email);

    $get_user = $mysqli->query("SELECT * FROM users WHERE email='$email' AND verified_mail='1' AND verified_question='1'");
    $message = $get_user->num_rows > 0 ? true : false;
    print_r($message);
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
