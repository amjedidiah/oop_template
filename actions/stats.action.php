<?php

require("session.action.php");
require("connect.action.php");

$investors = [];
$stats = [];
$deposits = [];
$units = [];

$q_investment = $mysqli->query("SELECT * FROM investments");
$total_investments =  $q_investment->num_rows;
while ($row = $q_investment->fetch_assoc()) {
    $investors[] = $row['userID'];
    $units[] = $row['units'];
}
$total_investors = count(array_unique($investors));

$total_accounts = $mysqli->query("SELECT * FROM users")->num_rows;
$ql_transaction = $mysqli->query("SELECT * FROM transactions WHERE type='credit' ORDER BY createdAt DESC LIMIT 1");
$last_deposit = strtotime($ql_transaction->fetch_assoc()['createdAt']);

$q_transaction = $mysqli->query("SELECT * FROM transactions WHERE type='credit'");
while ($d_row = $q_transaction->fetch_assoc()) {
    $deposits[] = $d_row['amount'];
}

function dsum($v1, $v2)
{
    return $v1 + $v2;
}

$total_deposit = array_reduce($deposits, "dsum", 0);
$total_units = array_reduce($units, "dsum", 0);

array_push($stats, $total_investments, $total_investors, $total_accounts, $last_deposit, $total_deposit, $total_units);

print_r(json_encode($stats));
