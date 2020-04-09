<?php

include('config.php');

$title = "WeekVest | Home";
$content = "./views/home.view.php";
$nav = "./inc/nav.inc.php";
$foot = "./inc/foot.inc.php";

$site->displayHeaderAndFooter($content, $title, $nav, $foot);
