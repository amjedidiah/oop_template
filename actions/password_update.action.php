<?php

require("session.action.php");
require("connect.action.php");

$pass = $_POST['profilePass'];
$c_pass = $_POST['profileCPass'];
$success_message = "Password updated successfully";
$redirect = "";


try {
    // Check if all are not empty
    ifPostIsEmpty($_POST);

    if (isset($_POST['resetEmail'])) {
        $reset_email = $_POST['resetEmail'];
        $id = wvEncrypt($reset_email);
        $success_message .= "<br />We will redirect you to your dashboard shortly<p>If nothing happens?<br /><a href='./user'>Click here</a></p>";
        $redirect .= "./auth";

        ifEmailIsValid($reset_email);
        $get_auth = $mysqli->query("SELECT * FROM auth WHERE email='$reset_email'");
    }

    if (isset($_POST['profileOldCode'])) {
        $old_pass = $_POST['profileOldCode'];
        $id = $_SESSION['id'];

        $md5_old_pass = wvEncrypt($old_pass);
        $email = $_SESSION['user']['email'];

        $get_auth = $mysqli->query("SELECT * FROM auth WHERE email='$email' AND pass='$md5_old_pass'");
    }

    if ($get_auth->num_rows > 0) {
        if ($pass === $c_pass) {

            $md5pass = wvEncrypt($_POST['profilePass']);
            if ($mysqli->query("UPDATE auth SET pass='$md5pass' WHERE id='$id'")) {
                if (isset($_POST['resetEmail'])) {
                    $mysqli->query("UPDATE auth SET reset_key='' WHERE email='$reset_email'");
                    createSession(wvEncrypt($reset_email), wvEncrypt($pass));
                }
                throwActionMessage("success", $success_message, $redirect);
            } else {
                throw new customException("An error occurred. Try again after a while " . $mysqli->error);
            }
        } else {
            throw new customException("Passwords do not match");
        }
    } else {
        throw new customException("Old password is incorrect ");
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
