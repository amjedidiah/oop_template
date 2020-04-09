<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$bank = $_POST['bankBank'];
$name = $_POST['bankName'];
$number = $_POST['bankNumber'];
$user = $_SESSION['user']['id'];

// Check if all are not empty
ifPostIsEmpty($_POST);

try {

    $q_bank = $mysqli->query("INSERT INTO bank_details
(id, user, bank, name, number)
VALUES
(NULL, '$user', '$bank', '$name', '$number')
ON DUPLICATE KEY UPDATE
user = '$user',
bank = '$bank',
name = '$name',
number = '$number'");
    if ($q_bank) {
        throwActionMessage("success", "Your bank detail was updated successfully", "");
    } else {
        throw new customException("An error occurred. Try again after a while " . $mysqli->error);
    }
} catch (customException $e) {
    echo $e->errorMessage();
}
