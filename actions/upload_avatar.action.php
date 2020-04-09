<?php

require("session.action.php");
require("connect.action.php");

// Get POST variables
// $fname = $_POST['profileFirstName'];
// $lname = $_POST['profileLastName'];
// $gender = $_POST['profileGender'];
// $dob = date($_POST['profileDOB']);
// $phone = $_POST['profilePhone'];
// $email = $_POST['profileEmail'];

// if ($mysqli->query("UPDATE users SET fname='$fname', lname='$lname', gender='$gender', dob='$dob', phone='$phone', email='$email' WHERE id='$_SESSION[id]'")) {


//     echo "";
// } else {
//     echo "An error occurred. Try again after a while " . $mysqli->error;
// }

$err = "";

$img = $_FILES["avatar"]["name"];
$tmp = $_FILES["avatar"]["tmp_name"];
$errorimg = $_FILES["avatar"]["error"];

$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../img/uploads/avatars/'; // upload directory


// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$file_name = $_SESSION['id'] . ".jpg";
// can upload same image using rand function
$final_image = rand(1000, 1000000) . $img;
// check's valid format
if (in_array($ext, $valid_extensions)) {
    $path = $path . $file_name;

    if (move_uploaded_file($tmp, $path)) {
        //insert form data in the database

        $db_path = ltrim($path, $path[0]);

        if (!$mysqli->query("UPDATE users SET avatar='$db_path' WHERE id='$_SESSION[id]'")) {
            $err .= $mysqli->error;
        } else {

            $user_query = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");
            $_SESSION['user'] = $user_query->fetch_assoc();

            $err = "";
        }
    } else {
        $err .= "File error";
    }
} else {
    $err .= "Please upload a PNG or JPG image\n" . $ext;
}

print_r($err);
