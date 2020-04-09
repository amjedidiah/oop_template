<?php
require("session.action.php");
require("connect.action.php");

// Get POST variables
$q1 = $_POST['question1'];
$q2 = $_POST['question2'];
$q3 = $_POST['question3'];
$a1 = $_POST['answer1'];
$a2 = $_POST['answer2'];
$a3 = $_POST['answer3'];

try {

    // Check if all are not empty
    ifPostIsEmpty($_POST);

    $mysqli->query("DELETE FROM security_questions WHERE user='$_SESSION[id]'");

    $id1 = md5($_SESSION['id'] . $q1);
    $sql_1 = "INSERT INTO security_questions (id, user, question, answer)
        VALUES ('$id1', '$_SESSION[id]', '$q1', '$a1')";

    $id2 = md5($_SESSION['id'] . $q2);
    $sql_2 = "INSERT INTO security_questions (id, user, question, answer)
        VALUES ('$id2', '$_SESSION[id]', '$q2', '$a2')";

    $id3 = md5($_SESSION['id'] . $q3);
    $sql_3 = "INSERT INTO security_questions (id, user, question, answer)
    VALUES ('$id3', '$_SESSION[id]', '$q3', '$a3')";

    $sql_user = "UPDATE users SET verified_question='1' WHERE id='$_SESSION[id]'";

    // First of all, let's begin a transaction
    $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    // A set of queries; if one fails, an exception should be thrown
    $mysqli->query($sql_1);
    $mysqli->query($sql_2);
    $mysqli->query($sql_3);
    $mysqli->query($sql_user);


    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
    $mysqli->commit();

    $redirect = $_SESSION['user']['verified_question'] === '1' ? "" : "./user";
    $add_msg = $_SESSION['user']['verified_question'] === '1' ? "" : '<br />Please wait while we refresh the page<p>If nothing happens?<br /><a href="./user">Click here</a></p>';

    throwActionMessage("success", 'Questions updated successfully' . $add_msg, $redirect);
} catch (customException $e) {
    $mysqli->rollback();
    echo $e->errorMessage();
}
