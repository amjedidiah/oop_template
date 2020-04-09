<?php
require("session.action.php");
require("connect.action.php");


if (isset($_GET['investmentUserID'])) {
    $user = $_GET['investmentUserID'];
    $string = "";
} else {
    $user = $_SESSION['id'];
    $string = " AND DATE(date_end) > CURDATE()";
}

$i_arr = ['nice'];

$investments_query = $mysqli->query("SELECT * FROM investments WHERE userID='$user'");

if ($investments_query->num_rows > 0) {
    while ($investment = $investments_query->fetch_assoc()) {
        $i_query = $mysqli->query("SELECT * FROM opportunities WHERE id='$investment[opportunityID]'" . $string);

        if ($i_query->num_rows > 0) {
            $opportunity = $i_query->fetch_assoc();

            include "../views/investment_card.view.php";
        } else {
            include "../views/investment_card_not_found.view.php";
        }
    }
} else {
    $query = $mysqli->query("SELECT * FROM users WHERE id='$user'");

    // include $query->fetch_assoc()['wallet'] > 0 ? "../views/investment_card_not_found.view.php" : "../views/investment_fund_wallet.view.php";
    include "../views/investment_card_not_found.view.php";
}
