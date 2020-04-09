<?php
// Load Composer's autoloader
require '../vendor/autoload.php';

// require("twilio.action.php");
require("php-mailer.action.php");
require("session.action.php");
require("connect.action.php");

// Get POST variables
$fname = $_POST['registerFName'];
$lname = $_POST['registerLName'];
$email = $_POST['registerEmail'];
$phone = $_POST['registerPhone'];
$state = $_POST['registerState'];
$lga = $_POST['registerLGA'];
$pass = $_POST['registerPass'];
$dob = $_POST['registerDOB'];

try {

    // Check if all are not empty
    ifPostIsEmpty($_POST);
    ifEmailIsValid($email);

    $get_user = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    if ($get_user->num_rows > 0) {
        throw new customException("A user with this email already exists");
    } else {
        // Encrypt password
        $md5pass = wvEncrypt($pass);
        $md5email = wvEncrypt($email);

        $verification_mail = wvEncrypt($pass . $email); //verification link for mail

        // Verification code for text
        $digits = 4;
        $verification_text = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $zero = 0;

        $sql_users = "INSERT INTO users (id, fname, lname, email, phone, gender,dob, state, lga, avatar, wallet, verification_mail, verified_mail, verified_question)
    VALUES ('$md5email', '$fname', '$lname', '$email', '$phone', '', '$dob', '$state', '$lga', '', '$zero', '$verification_mail', '$zero', '$zero')";

        $sql_auth = "INSERT INTO auth (id, email, pass, reset_key)
    VALUES ('$md5email', '$email', '$md5pass', '')";


        // !Function Excerpt
        $mail->Username   = "welcome@weekvest.com";
        $mail->Password   = "WhiskeyEchoWhiskey@6048";
        $name = $fname . " " . $lname;  // Set name variable

        $mail->AddAddress($email, $name);
        $mail->SetFrom("welcome@weekvest.com", "WeekVest");
        $mail->Subject = "WeekVest: Email Verification Required";
        $content = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
        <!-- Favicon -->
        <link rel="icon" href="https://weekvest.com/img/favicon.png" />
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    
        <title>WeekVest: Email Verification Required</title>
    
        <style>
        * {
            font-family: "Montserrat", sans-serif;
            word-wrap: break-word !important;
            transition: all 0.25s ease-out;
            -webkit-box-sizing: border-box !important;
            -moz-box-sizing: border-box !important;
            box-sizing: border-box !important;
        }
    
        body,
        html {
            height: 100%;
            scroll-behavior: smooth !important;
        }
    
        h1,
        h1 ul li,
        h2,
        h2 ul li,
        h3,
        h3 ul li,
        h4,
        h4 ul li,
        h5,
        h5 ul li,
        h6,
        h6 ul li {
            font-family: "Dosis", sans-serif !important;
        }
    
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    
        input[type="number"] {
            -moz-appearance: textfield;
        }
    
        img {
            image-rendering: optimizeSpeed !important;
        }
    
        .pointer {
            cursor: pointer;
        }
    
        a:hover,
        a.active {
            text-decoration: none;
            transform: scale(1.05);
        }
    
        .btn,
        button {
            font-weight: 700;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
    
        .form-control,
        .form-control:-webkit-autofill,
        .form-control:-webkit-autofill:hover,
        .form-control:-webkit-autofill:focus,
        .form-control:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0px 1000px #f6f6f6 inset !important;
            box-shadow: 0 0 0px 1000px #f6f6f6 inset !important;
            border: none;
            border-radius: 0;
        }
    
        .form-control:-webkit-autofill:focus,
        .form-control:-webkit-autofill:active {}
    
        textarea {
            resize: none;
        }
    
        .modal,
        .modal-dialog,
        .modal-content {
            box-shadow: none !important;
        }
    
        .modal-header,
        .modal-body,
        .modal-footer {
            border: none;
        }
    
        .clear {
            clear: both;
        }
    
        .toast .toast-header,
        .toast .toast-body {
            background: #fff;
        }
    
        .text-success {
            color: #009245 !important;
        }
    
        .btn-white {
            background: #fff !important;
            color: #009245 !important;
        }
    
        .bg-light {
            background: #f6f6f6 !important;
            background: #e0f1e1 !important;
        }
    
        .bg-success,
        .btn-success {
            background: #009245 !important;
        }
    
        .card {
            margin-bottom: 40px !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
    
        .just-width {
            width: fit-content !important;
        }
    
        footer a {
            color: inherit !important;
        }
    
        .opportunity-bonus {
            animation: pulse 1.5s infinite;
            border: 1px solid #009245;
        }
    
        /* The animation code */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
    
            50% {
                transform: scale(1.02);
            }
    
            100% {
                transform: scale(1);
            }
        }
    
        @media (min-width: 576px) {
            .card-columns {
                column-count: 1;
            }
        }
    
        @media (min-width: 992px) {
            .card-columns--2 {
                column-count: 2 !important;
            }
    
            .card-columns {
                column-count: 3;
            }
        }
        </style>
    
    </head>
    
    <body>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 shadow p-5">
                    <div class="">
                        <img src="https://weekvest.com/img/logo.png" alt="WeekVest Logo" width="150" class="img-fluid" />
                    </div>
    
                    <h2 class="my-4 mail">' . $email . '</h2>
                    <div>You have one more step remaining to activate your WeekVest account. Click on the button below to verify
                        your
                        email address: <br /><a href="https://weekvest.com/actions/verify.action.php?verify=' . $verification_mail . '" class="btn btn-success my-1">Verify my email</a></div>
    
                    <div class="mt-3">
                        <p>Didn’t work? Copy and visit the link below into your web browser:
                            <br /><a href="https://weekvest.com/actions/verify.action.php?verify=' . $verification_mail . '"
                                class="text-success verify">https://weekvest.com/actions/verify.action.php?verify=' . $verification_mail . '</a>
                        </p>
                    </div>
    
    
                    <pre>
Best regards,
— Team WeekVest
    </pre>
                    <div class="text-center">WeekVest Limited ' . date("Y") . '</div>
</div>
</div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

</body>

</html>';
        $mail->MsgHTML($content);

        if ($mail->Send()) {

            // First of all, let's begin a transaction
            $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

            // A set of queries; if one fails, an exception should be thrown
            $mysqli->query($sql_users);
            $mysqli->query($sql_auth);


            // If we arrive here, it means that no exception was thrown
            // i.e. no query has failed, and we can commit the transaction
            $mysqli->commit();

            createSession($md5email, $md5pass);

            throwActionMessage("success", 'Registration successful<br />We will redirect you to your dashboard shortly<p>If nothing happens?<br /><a href="./user">Click here</a></p>', "./user");
        } else {
            $mysqli->rollback();
            throw new customException("Message could not be sent. Mailer Error: " . $mail->ErrorInfo);
        }
    }
} catch (customException $e) {
    // An exception has been thrown
    // We must rollback the transaction
    $mysqli->rollback();

    //display custom message
    echo $e->errorMessage();
}
