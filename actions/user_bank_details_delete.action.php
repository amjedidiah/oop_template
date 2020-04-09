<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$id = $_POST['bankID'];

// Check if all are not empty
ifPostIsEmpty($_POST);

$q_bank = $mysqli->query("DELETE FROM bank_details WHERE id='$id'");

