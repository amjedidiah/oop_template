<?php

include('config.php');

$title = "WeekVest | Opportunities";
$content = "./views/opportunities.view.php";
$nav = "./inc/nav.inc.php";
$foot = "./inc/foot.inc.php";

$site->displayHeaderAndFooter($content, $title, $nav, $foot);