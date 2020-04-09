<?php
require("session.action.php");
require("connect.action.php");

$questions = [];
$user = "";
$sql = "SELECT ";

if (isset($_SESSION['id'])) {
    $user = $_SESSION['id'];
    $sql .= "*";
} elseif (isset($_POST['email'])) {
    $user = wvEncrypt($_POST['email']);
    $sql .= "question";
} else {
    $user = "";
}

$questions_row = $mysqli->query($sql . " FROM security_questions WHERE user='$user'");

if ($questions_row->num_rows > 0) {
    while ($question = $questions_row->fetch_assoc()) {
        $questions[] = $question;
    };
}

print_r(json_encode($questions));
