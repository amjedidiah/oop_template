<?php
// Load Composer's autoloader
require '../vendor/autoload.php';

require("php-mailer.action.php");
require("session.action.php");
require("connect.action.php");

// Get POST variables
$withdrawAmount = $_POST['withdrawAmount'];
$user = $_SESSION['user'];


try {
    // Check if all are not empty
    ifPostIsEmpty($_POST);

    if ($_SESSION['user']['wallet'] < $withdrawAmount) {
        throw new customException("You have only ₦ " . addComma($user['wallet']) . " in your wallet which is not suficient for this transaction");
    } else {
        $sql_wallet = "UPDATE users SET wallet = wallet - $withdrawAmount WHERE id='$_SESSION[id]'";

        $sql_transaction = "INSERT INTO transactions (id, user, type, transID, amount, approved, approvedBy) VALUES (NULL, '$_SESSION[id]', 'withdraw', '$_SESSION[id]', '$withdrawAmount', '0', '$_SESSION[id]')";

        try {
            $user_query = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");
            $_SESSION['user'] = $user_query->fetch_assoc();

            // !Function Excerpt
            $mail->Username   = "contact@weekvest.com";
            $mail->Password   = "CarliTataWhiskey@6048";
            $name = $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname'];  // Set name variable

            $mail->AddAddress('imunacode@gmail.com', 'Jedidiah');
            $mail->AddAddress('yuddyolughu@gmail.com', 'Korbann');
            $mail->SetFrom("contact@weekvest.com", "WeekVest");
            $mail->Subject = "WeekVest: Client Withdrawal";
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
    
        <title>WeekVest: Client Withdrawal</title>
    
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
    
                    <h2 class="my-4 mail">' . $_SESSION['user']['email'] . '</h2>
                    <h4 class="my-4">' . $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] . '</h4>
                    <div>The above user has requested a withdrawal of <p class="lead font-weight-bold"> ₦ ' . addComma($withdrawAmount) . '</p></div>
    
                    <div class="mt-3">
                        <p><a href="https://weekvest.com/admin" 
                            class="text-success">Login</a> to credit his wallet
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
                $mysqli->query($sql_wallet);
                $mysqli->query($sql_transaction);

                // If we arrive here, it means that no exception was thrown
                // i.e. no query has failed, and we can commit the transaction
                $mysqli->commit();

                throwActionMessage("success", "Your withdrawal request was successful.<br />Your account will be credited shortly.", "");
            } else {
                $mysqli->rollback();
                throw new customException("Withdrawal was not successful. Error: " . $mail->ErrorInfo);
            }
        } catch (customException $e) {
            // An exception has been thrown
            // We must rollback the transaction
            $mysqli->rollback();
            //display custom message
            echo $e->errorMessage();
        }
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
