<?php

include('config.php');

if (isset($_SESSION['id'])) {
    header("location: ./user");
}

function getContent()
{
    $content = "./views/auth.view.php";
    if (isset($_GET['r3s3tc0d3'])) {
        if ($_GET['r3s3tc0d3'] !== "") {
            require("actions/connect.action.php");

            $sql = $mysqli->query("SELECT * FROM auth WHERE reset_key='$_GET[r3s3tc0d3]' LIMIT 1");
            $content = $sql->num_rows > 0 ? "./views/reset.view.php" : $content;
        }
    }

    return $content;
}

$title = "WeekVest | Authentication";
$content = getContent();


$site->displayHeaderAndFooter($content, $title, "", "");
