<?php

include('config.php');

if (isset($_SESSION['id'])) {
    $isAdmin ? "" : header("location: ./user");
}

$title = "WeekVest | Admin";
$content = isset($_SESSION['id']) ? "./views/admin/user_admin.view.php" : "./views/auth_admin.view.php";

$site->displayHeaderAndFooter($content, $title, "", "");
