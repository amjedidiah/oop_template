<?php
require '../vendor/autoload.php';

require("php-mailer.action.php");
require("session.action.php");
require("connect.action.php");

// POST variables
$fname = $_POST['contactFirstName'];
$lname = $_POST['contactLastName'];
$email = $_POST['contactEmail'];
$phone = $_POST['contactPhone'];
$message = $_POST['contactMessage'];
$name = $fname . " " . $lname;  // Set name variable

try {

    // Check if all are not empty
    ifPostIsEmpty($_POST);
    ifEmailIsValid($email);

    // !Function Excerpt
    $mail->Username   = "contact@weekvest.com";
    $mail->Password   = "CarliTataWhiskey@6048";

    $mail->AddAddress('hello@weekvest.com', 'WeekVest');
    $mail->SetFrom($email, $name);
    $mail->Subject = "WeekVest: New Message";
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
        
            <title>WeekVest: New Message</title>
        
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
        
            /************************************
          ************Toggle Switch************
          ************************************/
            /* The switch - the box around the slider */
            .switch {
                position: relative;
                display: inline-block;
                width: 50px;
                height: 20px;
            }
        
            /* Hide default HTML checkbox */
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }
        
            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: 0.4s;
                transition: 0.4s;
            }
        
            .slider:before {
                position: absolute;
                content: "";
                height: 19px;
                width: 19px;
                left: 1px;
                bottom: 1px;
                background-color: white;
                -webkit-transition: 0.4s;
                transition: 0.4s;
            }
        
            input:checked+.slider {
                background-color: #009245;
            }
        
            input:focus+.slider {
                box-shadow: 0 0 1px #009245;
            }
        
            input:checked+.slider:before {
                -webkit-transform: translateX(29px);
                -ms-transform: translateX(29px);
                transform: translateX(29px);
            }
        
            /* Rounded sliders */
            .slider.round {
                border-radius: 20px;
            }
        
            .slider.round:before {
                border-radius: 50%;
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
        
                        <h2 class="my-4 mail">' . $name . ' Contacted You</h2>
                        
                        <div class="mt-3">' . $message . '
                        </div>
        
        
                        <pre>
From: ' . $name . '
Phone: ' . $phone . '
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
        throwActionMessage("success", "Your message was sent successfully<br />We will get back to you shortly", "");
    } else {
        throw new customException("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
