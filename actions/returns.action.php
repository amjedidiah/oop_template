<?php

require("session.action.php");
require("connect.action.php");

// Get POST variables
$investmentID = $_POST['investmentID'];

try {

    // Check if all are not empty
    ifPostIsEmpty($_POST);

    $q_investment($mysqli_query("SELECT * FROM investments WHERE id='$investmentID'"));



    $q_transaction = $mysqli_query("SELECT * FROM transactions WHERE transID='$investmentID' AND type='returns' LIMIT 1");

    if ($q_transaction->num_rows > 0) {
        throw new customException("You have already gotten your returns on this transaction");
    } else {

        $investments_query = $mysqli->query("SELECT * FROM investments WHERE id='$investmentID' LIMIT 1");

        if ($investments_query->num_rows > 0) {
            $investment = $investments_query->fetch_assoc();
            $query = $mysqli->query("SELECT * FROM opportunities WHERE id='$investment[opportunityID]' LIMIT 1");

            if ($query->num_rows > 0) {
                $opportunity = $query->fetch_assoc();

                $d_start = strtotime($opportunity['date_start']);
                $d_end = strtotime($opportunity['date_end']);
                $d_diff = floor((time() - $d_start) / 60 / 60 / 24);
                $d_diff = $d_diff < 0 ? 0 : $d_diff;
                $d_diff_p = floor($d_diff / $opportunity['duration'] * 100);
                $d_left = $opportunity['duration'] - $d_diff;
                $d_left_p = floor($d_left / $opportunity['duration'] * 100);
                $t = $d_diff / $opportunity['duration'];

                // Simple interest
                $i = $investment['paid'] * $opportunity['interest'] * $t / 100;  // $t is days passed / total duration

                $amount = $opportunity['price'] + $i;

                $sql_wallet = "UPDATE users SET wallet = wallet + '$amount' WHERE id='$_SESSION[id]'";

                $sql_transaction = "INSERT INTO transactions (id, user, type, transID, amount,approved, approvedBy) VALUES (NULL, '$_SESSION[id]', 'returns', '$opportunity[id]', '$amount', '1', '$user')";

                try {
                    // First of all, let's begin a transaction
                    $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

                    // A set of queries; if one fails, an exception should be thrown
                    $mysqli->query($sql_wallet);
                    $mysqli->query($sql_transaction);

                    // If we arrive here, it means that no exception was thrown
                    // i.e. no query has failed, and we can commit the transaction
                    $mysqli->commit();


                    $user_query = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");
                    $_SESSION['user'] = $user_query->fetch_assoc();

                    throwActionMessage("success", "Your returns have been credited to your wallet", "");
                } catch (customException $e) {
                    // An exception has been thrown
                    // We must rollback the transaction
                    $mysqli->rollback();
                    //display custom message
                    echo $e->errorMessage();
                }
            } else {
                throw new customException("This investment no longer exists on our platform");
            }
        } else {
            throw new customException("You have not invested in this opportunity");
        }
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
