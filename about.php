<?php

include('config.php');

$title = "WeekVest | About";
$content = "./views/about.view.php";
$nav = "./inc/nav.inc.php";
$foot = "./inc/foot.inc.php";

$site->displayHeaderAndFooter($content, $title, $nav, $foot);
