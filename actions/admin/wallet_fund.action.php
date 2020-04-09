<?php

require("../session.action.php");
require("../connect.action.php");

// Get POST variables
$id = $_POST['fundID'];
$amount = $_POST['fundAmount'];
// $transID = $_POST['fundTransactionID'];

try {

    // Check if all are not empty
    ifPostIsEmpty($_POST);

    $sql_wallet = "UPDATE users SET wallet = wallet + '$amount' WHERE id='$id'";
    // $sql_receipts = "UPDATE receipts SET used = '$used' WHERE transID='$transID' AND user='$id'";
    $sql_transaction = "INSERT INTO transactions (id, user, type, transID, amount, approved, approvedBy) VALUES (NULL, '$id', 'credit', '$id', '$amount', '1', '$_SESSION[id]')";

    try {
        // First of all, let's begin a transaction
        $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        // A set of queries; if one fails, an exception should be thrown
        $mysqli->query($sql_wallet);
        // $mysqli->query($sql_receipts);
        $mysqli->query($sql_transaction);

        // If we arrive here, it means that no exception was thrown
        // i.e. no query has failed, and we can commit the transaction
        $mysqli->commit();

        $user_query = $mysqli->query("SELECT * FROM users WHERE id='$id'");
        $user = $user_query->fetch_assoc();

        throwActionMessage("success", "<p>" . $user['fname'] . "'s wallet was funded successfully with ₦ " . addComma($amount) . '</p><p>We will refresh this page shortly<br />If nothing happens? <a href="./admin">Click here</a></p>', "./admin?active=users");
        // !TODO: alert user
    } catch (customException $e) {
        // An exception has been thrown
        // We must rollback the transaction
        $mysqli->rollback();
        //display custom message
        echo $e->errorMessage();
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
