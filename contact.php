<?php

include('config.php');

$title = "WeekVest | Contact Us";
$content = "./views/contact.view.php";
$nav = "./inc/nav.inc.php";
$foot = "./inc/foot.inc.php";

$site->displayHeaderAndFooter($content, $title, $nav, $foot);
