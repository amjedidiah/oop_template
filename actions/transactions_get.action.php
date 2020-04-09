<?php
require("session.action.php");
require("connect.action.php");

$user = isset($_GET['transactionUserID']) ? $_GET['transactionUserID'] : $_SESSION['id'];
$approved = isset($_GET['pending']) ? '0' : '1';
$q_string = " AND approved='$approved'";

$transactions_query = $mysqli->query("SELECT * FROM transactions WHERE user='$user'" . $q_string);

if ($transactions_query->num_rows > 0) {
    while ($transaction = $transactions_query->fetch_assoc()) {
        $typing = $transaction['type'];

        if ($typing === 'debit') {
            $class = 'secondary';
            $query = $mysqli->query("SELECT * FROM opportunities WHERE id='$transaction[transID]' LIMIT 1");
            $transaction_title = "Investment in <strong>" . $query->fetch_assoc()['name'] . "</strong>";
        } elseif ($typing === 'credit') {
            $class = 'success';
            $transaction_title = "Wallet Funding";
        } elseif ($typing === 'returns') {
            $class = 'primary';
            $query = $mysqli->query("SELECT * FROM opportunities WHERE id='$transaction[transID]' LIMIT 1");
            $transaction_title = "Returns from <strong>" . $query->fetch_assoc()['name'] . "</strong> investment";
        } else {
            $class = 'danger';
            $transaction_title = "Wallet Withdrawal";
        }

        $sign = $transaction['type'] === "credit" || $transaction['type'] === "returns" ? "+" : "-";
        include "../views/transaction_card.view.php";
    }
} else {
    include "../views/transaction_card_not_found.view.php";
}


// Debit: Investment                    : secondary
// Credit: receipt upload/fund wallet   : success
// Returns: investment credit           : primary
// Withdraw: from wallet                : danger 
