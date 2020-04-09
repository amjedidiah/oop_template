<?php

require("session.action.php");
require("connect.action.php");

function goHome()
{
    return header("location: ../");
}

if (isset($_GET['verify'])) {

    // Get GET variables
    $verification_code = $_GET['verify'];

    $q_user = $mysqli->query("SELECT * FROM users WHERE verification_mail='$verification_code' LIMIT 1");

    if ($q_user->num_rows > 0) {
        $user = $q_user->fetch_assoc();

        $q_auth = $mysqli->query("SELECT * FROM auth WHERE email='$user[email]'");

        $auth = $q_auth->fetch_assoc();

        $md5pass = $auth['pass'];
        $md5email = wvEncrypt($user['email']);

        createSession($md5email, $md5pass);

        $active = 1;

        if ($q_user->num_rows > 0) {
            $content = $mysqli->query("UPDATE users SET verified_mail='$active' WHERE verification_mail='$verification_code'") ? "success" : "failure";
        } else {
            $content =  "failure";
        }

        header("location: ../verify?result=" . $content);
    } else {
        goHome();
    }
} else {
    goHome();
}
