<?php
require("../connect.action.php");

if (isset($_POST['transID'])) {

    $query = $mysqli->query("SELECT * FROM receipts WHERE transID='$_POST[transID]'");

    if ($query->num_rows > 0) {
        $receipt = $query->fetch_assoc();
        print_r($receipt['name']);
    }
}
