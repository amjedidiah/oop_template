<?php
require("session.action.php");
require("connect.action.php");

$o_passed = [];
$o_n_passed = [];

function ifUserIsActivated()
{
    if (isset($_SESSION['user'])) {
        return intval($_SESSION['user']['verified_mail']) === 1 && intval($_SESSION['user']['verified_question']) === 1 ? 1 : 0;
    }
}

// POST variable
$data = $_GET;
unset($data['active']);
$duration = array_key_exists('duration', $data) ? $data['duration'] : "";
$d_str = $duration === "long" ? "> 7" : "<=7";
$category = array_key_exists('category', $data) ? $data['category'] : "";

$sql = "SELECT * FROM opportunities";

$data_category = array_key_exists('category', $data) ? str_replace(",", "", $data['category']) : "";

if (count($data) > 1) {
    $sql .= " WHERE category LIKE '%$data_category%' AND duration" . $d_str;
} elseif (count($data) === 1) {

    $sql .= array_key_exists('category', $data) ? " WHERE category LIKE '%$data_category%'" : " WHERE duration" . $d_str;
} else {
}


$query = $mysqli->query($sql);

if ($query->num_rows > 0) {
    while ($opportunities = $query->fetch_assoc()) {
        $d_start = strtotime($opportunities['date_start']);
        $d_diff = floor((time() - $d_start) / 60 / 60 / 24);

        $passed = $d_diff < 0 ? 0 : 1;
        $o_passed[] = $passed ?   $opportunities : "";
        $o_n_passed[] = $passed ? "" :  $opportunities;
        // include "../views/opportunity_card.view.php";
    }

    $o_passed = array_values(array_filter($o_passed));
    $o_n_passed = array_values(array_filter($o_n_passed));

    foreach ($o_n_passed as $key => $opportunities) {
        $d_start = strtotime($opportunities['date_start']);
        $d_diff = floor((time() - $d_start) / 60 / 60 / 24);

        $passed = $d_diff < 0 ? 0 : 1;
        include "../views/opportunity_card.view.php";
    }

    foreach ($o_passed as $key => $opportunities) {
        $d_start = strtotime($opportunities['date_start']);
        $d_diff = floor((time() - $d_start) / 60 / 60 / 24);

        $passed = $d_diff < 0 ? 0 : 1;
        include "../views/opportunity_card.view.php";
    }
} else {
    include "../views/opportunity_card_not_found.view.php";
}
