<?php
require("session.action.php");
require("connect.action.php");

if (isset($_GET['userID'])) {
    $user = $_GET['userID'];

    $bank_details_query = $mysqli->query("SELECT * FROM bank_details WHERE user='$user'");

    if ($bank_details_query->num_rows > 0) {
        $details = $bank_details_query->fetch_assoc();
        include "../views/user_bank_details.view.php";
    } else {
        include "../views/user_not_found_bank_details.view.php";
    }
} elseif (isset($_POST['id'])) {
    $user = $_POST['id'];

    $bank_details_query = $mysqli->query("SELECT * FROM bank_details WHERE user='$user'");

    echo $bank_details_query->num_rows > 0 ? true : false;
} else {
}
