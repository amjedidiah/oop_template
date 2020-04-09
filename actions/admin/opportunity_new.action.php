<?php


require("../session.action.php");
require("../connect.action.php");

try {
    // Get POST variables
    $name = $_POST['opportunityName'];

    $price = $_POST['opportunityPrice'];
    $interest = $_POST['opportunityInterest'];
    $duration = $_POST['opportunityDuration'];
    $partner = $_POST['opportunityPartner'];
    $info = $_POST['opportunityInfo'];
    $category = $_POST['opportunityCategory'];
    $units_total = $_POST['opportunityUnits'];
    $units_sold = 0;
    $date_start = $_POST['opportunityStartDate'];

    $investors = 0;
    $verified = 1;

    // Check if all are not empty
    ifPostIsEmpty($_POST);

    // Calculate Date End
    $d = (floor((strtotime($date_start)) / 60 / 60 / 24) + $duration) * 24 * 60 * 60;
    $date = new DateTime();
    $date->setTimestamp($d);
    $date_end =  $date->format('Y-m-d H:i:s');


    if ($mysqli->query("INSERT INTO opportunities (id, name, interest, duration, price, investors, partner, info, category, verified, units_total, units_sold, date_start, date_end)
    VALUES (NULL, '$name', '$interest', '$duration', '$price', '$investors', '$partner', '$info', '$category', '$verified', '$units_total', '$units_sold', '$date_start', '$date_end')
ON DUPLICATE KEY UPDATE
    name = '$name',
    interest = '$interest',
    duration = '$duration',
    price = '$price',
    partner = '$partner',
    info = '$info',
    category = '$category',
    units_total = '$units_total',
    date_start = '$date_start'")) {
        throwActionMessage("success", $name . " Opportunity updated successfully", "./admin?active=opportunities");
    } else {
        throw new customException($name . " Opportunity was not added<br/>Try again after a while");
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
