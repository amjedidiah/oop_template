<?php


require("../session.action.php");
require("../connect.action.php");

try {
    // Get POST variables
    $id = $_POST['opportunityID'];

    if ($mysqli->query("DELETE FROM opportunities WHERE id='$id'")) {
        throwActionMessage("success", $name . " Opportunity deleted successfully", "");
    } else {
        throw new customException($name . " Opportunity was not deleted<br/>Try again after a while");
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
