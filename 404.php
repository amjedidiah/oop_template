<?php

include('config.php');

$title = "WeekVest | 404 Not Found";
$content = "./views/404.view.php";
$nav = "./inc/nav.inc.php";
$foot = "./inc/foot.inc.php";

$site->displayHeaderAndFooter($content, $title, $nav, $foot);
