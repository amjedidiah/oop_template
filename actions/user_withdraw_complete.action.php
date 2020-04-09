<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$id = $_POST['transactionID'];

// Check if all are not empty
ifPostIsEmpty($_POST);

$q_bank = $mysqli->query("UPDATE transactions SET approved='1', approvedBy='$_SESSION[id]' WHERE id='$id'");
