<?php

require("session.action.php");
require("connect.action.php");

// Get POST variables
$fname = $_POST['profileFirstName'];
$lname = $_POST['profileLastName'];
$gender = $_POST['profileGender'];
$dob = date($_POST['profileDOB']);
$phone = $_POST['profilePhone'];
$email = $_POST['profileEmail'];
$state = $_POST['registerState'];
$lga = $_POST['registerLGA'];

try {
    // Check if all are not empty
    ifPostIsEmpty($_POST);
    ifEmailIsValid($email);

    $genders = ["Male", "Female", "Other"];
    if (!in_array($gender, $genders)) {
        throw new customException("Selected gender is invalid<br />Select another");
    } else {

        if ($mysqli->query("UPDATE users SET fname='$fname', lname='$lname', gender='$gender', dob='$dob', phone='$phone', email='$email', state='$state', lga='$lga' WHERE id='$_SESSION[id]'")) {
            throwActionMessage("success", "Profile updated successfully", "");
        } else {
            throw new customException("An error occurred. Try again after a while " . $mysqli->error);
        }
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
