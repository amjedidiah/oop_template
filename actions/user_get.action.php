<?php
require("session.action.php");
require("connect.action.php");

if (isset($_SESSION['id'])) {
    $user_row = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = $user_row->fetch_assoc();

    print_r(json_encode($user));
}
