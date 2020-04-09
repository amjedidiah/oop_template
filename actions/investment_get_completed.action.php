<?php
require("session.action.php");
require("connect.action.php");

$i_arr = [];

$investments_query_completed = $mysqli->query("SELECT * FROM investments WHERE userID='$_SESSION[id]'");
$complete = "complete";
if ($investments_query_completed->num_rows > 0) {
    while ($investment = $investments_query_completed->fetch_assoc()) {
        $query = $mysqli->query("SELECT * FROM opportunities WHERE id='$investment[opportunityID]' AND DATE(date_end) < CURDATE()");
        if ($query->num_rows > 0) {
            $opportunity = $query->fetch_assoc();
            $i_arr[] = $opportunity;

            $q_transaction = $mysqli->query("SELECT * FROM transactions WHERE transID='$investment[id]' AND user = '$_SESSION[id]' AND type='returns' LIMIT 1");
            $ifInvestmentHasBeenReturned = $q_transaction->num_rows > 0 ? 1 : 0;
            
            include "../views/investment_card.view.php";
        } else {
            $i_arr[] = $query->fetch_assoc();
        }
    }

    $i_arr = array_filter($i_arr);
    if (count($i_arr) < 1) {
        include "../views/investment_card_not_found.view.php";
    }
} else {
    $query = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");

    // include $query->fetch_assoc()['wallet'] > 0 ? "../views/investment_card_not_found.view.php" : "../views/investment_fund_wallet.view.php";
    include "../views/investment_card_not_found.view.php";
}
