<?php

include('config.php');
$isAdmin ? header("location: ./admin") : "";

$user = "";

if (!isset($_SESSION['id'])) {
    header("location: ./");
} else {
    $user = $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname'];
}

$title = "WeekVest | " . $user;
$content = "./views/user.view.php";

$site->displayHeaderAndFooter($content, $title, "", "");
