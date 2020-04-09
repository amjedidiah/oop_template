<?php

require("session.action.php");
require("connect.action.php");

$err = "";

if (isset($_FILES["receipt"])) {

    $img = $_FILES["receipt"]["name"];
    $tmp = $_FILES["receipt"]["tmp_name"];
    $errorimg = $_FILES["receipt"]["error"];

    $valid_extensions = array('jpeg', 'jpg', 'png', 'pdf'); // valid extensions
    $path = '../img/uploads/receipts/' . $_SESSION['id'] . "/"; // upload directory
    $file_name = str_replace(" ", "_", $img);
    $transID = wvEncrypt($img);

    $existing_query = $mysqli->query("SELECT * FROM receipts WHERE (name='$file_name' OR transID='$transID') AND user='$_SESSION[id]' LIMIT 1");

    if ($existing_query->num_rows > 0) {
        $err .= "The money for this receipt has already been funded";
    } else {

        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // check's valid format
        if (in_array($ext, $valid_extensions)) {

            $err .= is_dir($path) ? "" : mkdir($path);
            $path = $path . $file_name;
            $used = 0;

            if (move_uploaded_file($tmp, $path)) {
                //insert form data in the database
                if (!$mysqli->query("INSERT INTO receipts (`id`, `name`, `user`, `transID`, `used`) VALUES (NULL, '$file_name', '$_SESSION[id]', '$transID', '$used')")) {
                    $err .= $mysqli->error;
                } else {
                    $err = "Your transaction ID is <strong>" . $transID . "</strong>.<br />Keep it safe";
                    // !TODO: Alert admin with Trans ID
                }
            }
        } else {
            $err .= "Please upload a PNG or JPG image or PDF file \n";
        }
    }
} else {
    $err .= "Please upload an image";
}

print_r($err);
