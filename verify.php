<?php

include('config.php');
$isAdmin ? header("location: ./admin") : "";

$title = "WeekVest | Email Verification";
$content = !isset($_GET['result']) ? "" : $_GET['result'] === 'success' ? "./views/verified.view.php" : "./views/not_verified.view.php";
$nav = "./inc/nav.inc.php";
$foot = "./inc/foot.inc.php";

$site->displayHeaderAndFooter($content, $title, $nav, $foot);
