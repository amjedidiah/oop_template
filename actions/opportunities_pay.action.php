<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$units = $_POST['opportunityUnits'];
$cost = $_POST['opportunityUnitsTotalCost'];
$opportunityID = $_POST['opportunityID'];
$user = $_SESSION['user']['id'];

// Check if all are not empty
ifPostIsEmpty($_POST);

$q_opportunity = $mysqli->query("SELECT * FROM opportunities WHERE id='$opportunityID'");
$oppo = $q_opportunity->fetch_assoc();

try {
    if ($q_opportunity->num_rows > 0) {
        $cost = $oppo['price'] * $units;

        if ($_SESSION['user']['wallet'] < $cost) {
            throw new customException("You have only ₦ " . addComma($user['wallet']) . " in your wallet which is not suficient for this transaction");
        } else {

            $sql_investment = "INSERT INTO investments (`id`, `opportunityID`, `userID`, `purchasedOn`, `units`, `paid`)
    VALUES (NULL, '$opportunityID', '$_SESSION[id]', now(), '$units', '$cost')";

            $sql_wallet = "UPDATE users SET wallet = wallet - $cost WHERE id='$_SESSION[id]'";

            $sql_opportunity = "UPDATE opportunities SET investors = investors + 1, units_sold=units_sold+'$units' WHERE id='$opportunityID'";

            $sql_transaction = "INSERT INTO transactions (id, user, type, transID, amount, approved, approvedBy) VALUES (NULL, '$user', 'debit', '$opportunityID', '$cost', '1', '$user')";


            // First of all, let's begin a transaction
            $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

            // A set of queries; if one fails, an exception should be thrown
            $mysqli->query($sql_investment);
            $mysqli->query($sql_wallet);
            $mysqli->query($sql_opportunity);
            $mysqli->query($sql_transaction);

            // If we arrive here, it means that no exception was thrown
            // i.e. no query has failed, and we can commit the transaction
            $mysqli->commit();

            $user_query = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");
            $_SESSION['user'] = $user_query->fetch_assoc();

            throwActionMessage("success", $units . " Units for " . $oppo['name'] . " was acquired successfully", "./user?active=investments");
        }
    } else {
        throw new customException("The selected opportunity was not found");
    }
} catch (customException $e) {
    // An exception has been thrown
    // We must rollback the transaction
    $mysqli->rollback();

    echo $e->errorMessage();
}
