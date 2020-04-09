<?php

function ifUserIsActivated()
{
    return intval($_SESSION['user']['verified_mail']) === 1 && intval($_SESSION['user']['verified_question']) === 1 ? 1 : 0;
}

$ifUserIsActivated = ifUserIsActivated();

?><div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-8 col-md-4 col-lg-2 position-fixed h-100 bg-light px-0 shadow-sm" id="userSide">
            <p class="text-center p-4 bg-light" id="header">
                <a class="navbar-brand  flex-grow-1" href="./">
                    <img src="./img/logo.png" width="150" alt="" />
                </a>
            </p>
            <ul class="nav nav-pills flex-column my-3 pl-4" id="userNav" role="tablist">
                <?php echo $ifUserIsActivated === 0 ? '<li class="nav-item">
                    <a class="nav-link active" id="pills-starting-tab" data-toggle="pill" href="#pills-starting"
                        role="tab" aria-controls="pills-starting" aria-selected="true"><i
                            class="fas fa-globe mr-3"></i>Get Started</a>
                </li>' : '';   ?>

                <li class="nav-item">
                    <a class="nav-link <?php echo $ifUserIsActivated === 0 ? '' : 'active';   ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-user mr-3"></i>Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-investments-tab" data-toggle="pill" href="#pills-investments" role="tab" aria-controls="pills-investments" aria-selected="false"><i class="fas fa-coins mr-3"></i>Investments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-wallet-tab" data-toggle="pill" href="#pills-wallet" role="tab" aria-controls="pills-wallet" aria-selected="false"> <i class="fas fa-wallet mr-3"></i>Wallet</a>
                </li>
                <a class="btn btn-danger just-width px-5 my-4" href="./logout">Logout</a>
            </ul>
        </div>
        <div class="col-12 col-md-8 offset-md-4 col-lg-10 offset-lg-2 tab-content p-0" id="pills-tabContent">
            <div class="p-3 position-fixed bg-white shadow-sm d-flex d-md-block" id="dashboardHeader">
                <button class="btn btn-white float-left border-0 d-md-none border border-success" id="dashboardMenuToggle">
                    <span id="headerDet"><i class="fas fa-stream"></i></span>
                </button>
                <div class="flex-grow-1 d-md-none text-center">
                    <a class="navbar-brand" href="./">
                        <img src="./img/favicon.png" width="60" alt="" />
                    </a>
                </div>
                <div class="user float-right">
                    <div class="img-holder rounded-circle d-inline border-light mx-3" style="overflow: hidden">
                        <img src="" class="img-user rounded-circle" width="60" height="60" />
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php $ifUserIsActivated === 1 ? "" : include "user_starting.view.php";  ?>
            <div class="tab-pane p-5 mt-5 fade <?php echo $ifUserIsActivated === 0 ? '' : 'show active';   ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="px-4 mb-4 text-center text-lg-left">
                    <!-- <div
                class="float-lg-left text-left rounded-circle position-relative"
                style="width: 100px;height: 100px;overflow: hidden;margin: 0 auto"
              >
                <img
                  src=""
                  class="rounded-circle position-absolute"
                  width="100"
                  height="100"
                />
                <div
                  class="position-absolute w-100 text-center"
                  style="bottom: 0;"
                >
                  <div
                    class="position-relative bg-success text-white p-1"
                    style="top: 32px;"
                  >
                    Edit
                  </div>
                  <form class="position-relative form">
                    <input
                      type="file"
                      class="px-1"
                      name="image"
                      style="opacity:0"
                    />
                  </form>
                </div>
              </div> -->
                    <form class="form-disabled avatar-upload" enctype="multipart/form-data">
                        <div class="avatar-edit">
                            <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="avatar" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"></div>
                        </div>
                    </form>
                </div>
                <h4 class="mt-5 mb-4">Profile Details</h4>
                <form class="form text-left" method="post" action="profile_update.action.php" direction="">
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profileFirstName">First Name</label>
                                <input type="text" class="form-control" id="profileFirstName" placeholder="e.g: Clement" required />
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profileLastName">Last Name</label>
                                <input type="text" class="form-control" id="profileLastName" aria-describedby="profileLastName" placeholder="e.g: Obi" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profileGender">Gender</label>
                                <select class="form-control" id="profileGender" required>
                                    <option selected disabled>Select one</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profileDOB">Date of Birth</label>
                                <input type="date" class="form-control" id="profileDOB" aria-describedby="profileDOB" placeholder="" required />
                            </div>
                        </div>
                    </div>
                    <?php
                    include("./assets/location/index.php");
                    ?>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profilePhone">Mobile Number</label>
                                <input type="tel" id="profilePhone" class="form-control" placeholder="e.g: +2348165736665" required />
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profileEmail">Email Address</label>
                                <input type="email" id="profileEmail" class="form-control" placeholder="e.g: enochmartinsemeka@gmail.com" required readonly />
                            </div>
                        </div>
                    </div>

                    <div class="form-error"></div>

                    <button class="btn btn-success mt-3" type="submit">Update</button>
                </form>

                <h4 class="mt-5 mb-4">Change Password</h4>
                <form class="form text-left" method="post" action="password_update.action.php" direction="">
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-success" for="profileOldCode">Old Password</label>
                                <input type="text" class="form-control" name="name" id="profileOldCode" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profilePass">New Password</label>
                                <input type="password" class="form-control" name="name" id="profilePass" required />
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="profileCPass">Confirm New Password</label>
                                <input type="password" class="form-control" name="" id="profileCPass" aria-describedby="profileCPass" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-error"></div>

                    <button class="btn btn-success mt-3" type="submit">Update</button>
                </form>

                <h4 class="mt-5 mb-4">Security Questions</h4>
                <form action="user_question.action.php" id="userQuestions" class="text-left" method="post" direction="./user">
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="question1">question 1</label>
                                <select class="form-control question question-security" id="question1" required>
                                    <option selected disabled>Select one question</option>
                                    <option value="What is the name of your first pet?">What is the name of your first pet?</option>
                                    <option value="What elementary school did you attend?">What elementary school did you attend?</option>
                                    <option value="What is the name of the town where you were born?">What is the name of the town where you were born?</option>
                                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                    <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                    <option value="What is the name of the city where your parents met in?">What is the name of the city where your parents met in?</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="answer1">Answer 1</label>
                                <input type="text" class="form-control" id="answer1" placeholder="Enter correct answer here" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="question2">question 2</label>
                                <select class="form-control question question-security" id="question2" required>
                                    <option selected disabled>Select another question</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="answer2">Answer 2</label>
                                <input type="text" class="form-control" id="answer2" placeholder="Enter correct answer here" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="question3">question 3</label>
                                <select class="form-control question question-security" id="question3" required>
                                    <option selected disabled>Select another question</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="answer3">Answer 3</label>
                                <input type="text" class="form-control" id="answer3" placeholder="Enter correct answer here" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-error"></div>

                    <button class="btn-lg btn-success mt-3 questions-submit" type="submit">
                        Submit
                    </button>
                </form>
            </div>
            <div class="tab-pane p-5 mt-5 fade" id="pills-investments" role="tabpanel" aria-labelledby="pills-investments-tab">
                <div class="container my-5 text-center pb-5">
                    <div class="row text-left">
                        <div class="col-12 my-4">
                            <h4 class="text-success text-uppercase pb-3">Ongoing Investments</h4>
                            <div class="card-columns" id="investmentDiv"></div>

                        </div>
                        <div class="col-12 my-4">
                            <h4 class="text-success text-uppercase pb-3">Completed Investments</h4>
                            <div class="card-columns" id="investmentDivCompleted"></div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="tab-pane p-5 mt-5 fade" id="pills-wallet" role="tabpanel" aria-labelledby="pills-wallet-tab">
                <div class="container my-5 pb-5">

                    <div class="card-columns card-columns--2 my-5">
                        <div class="card shadow-sm bg-success text-white">
                            <div class="p-3">
                                <h6 class="text-uppercase">total amount</h6>
                            </div>
                            <div class="px-3">
                                <div>
                                    <h1 class="flex-grow-1 display-4 py-2">
                                        &#x20A6; <span class="wallet-balance"></span>
                                    </h1>
                                    <div class="d-sm-flex">
                                        <div class="rounded-circle" style="width: 60px;height: 60px;overflow: hidden"><img src="" alt="User Image" class="img-user img-fluid"></div>
                                        <div class="flex-grow-1 px-sm-3 pt-1">
                                            <h5 class="mb-0"><?php echo $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname']; ?></h5>
                                            <p class="font-weight-light"><?php echo $_SESSION['user']['email']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white d-md-flex">
                                <button class="d-block w-100 flex-grow-1 btn btn-white py-2 rounded-0" data-toggle="modal" data-target="#fundModal">Fund</button>
                                <a href="./opportunities" class="d-block w-100 flex-grow-1 btn btn-white py-2 rounded-0">Invest</a>
                                <button class="d-block w-100 flex-grow-1 btn btn-white py-2 rounded-0" data-id='<?php echo $_SESSION['id']; ?>' onclick="tryWithdraw();">Withdraw</button>
                            </div>
                        </div>
                        <div class="card shadow-sm p-3">
                            <div class="mb-4">
                                <h6 class="text-uppercase">bank details</h6>
                            </div>
                            <div id="bankDetailsDiv" data-id="<?php echo $_SESSION['id']; ?>"></div>

                        </div>
                    </div>

                    <div class="my-4">
                        <h4>Pending Transactions</h4>
                        <div class="card-columns" id="pendingTransactionsDiv"></div>
                    </div>
                    <div class="my-4">
                        <h4>Completed Transactions</h4>
                        <div class="card-columns" id="completedTransactionsDiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    withdraw
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <div class="container">
                    <div class="shadow p-4 mb-3">
                        <hgroup>
                            <h5>wallet balance</h5>
                            <h1 class="display-4">₦ <span class="wallet-balance"></span></h1>
                        </hgroup>
                    </div>
                    <form class="form" method="post" action="withdraw.action.php" direction="">
                        <div class="form-row mb-3 justify-content-between">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-success" for="withdrawAmount">Amount to Withdraw</label>
                                    <input type="number" class="form-control" min="0" max="<?php echo $_SESSION['user']['wallet']; ?>" name="" id="withdrawAmount" aria-describedby="withdrawAmount" onchange="restrictWithdrawAmount();" onfocus="restrictWithdrawAmount();" onkeyup="restrictWithdrawAmount();" />
                                    <small id="helpId" class="form-text text-muted">Max amount allowed to withdraw is
                                        <?php echo "₦ " . addComma($_SESSION['user']['wallet']); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3 justify-content-between">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-success" for="withdrawSource">Withdraw
                                        Source</label>
                                    <select class="form-control" name="" id="withdrawSource">
                                        <option value="Wallet" selected>Wallet</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-error"></div>

                        <button class="btn btn-white mt-3 w-100" type="submit">
                            Withdraw
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fund Modal -->
<div class="modal fade" id="fundModal" tabindex="-1" role="dialog" aria-labelledby="fundModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    fund wallet
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <div class="container">

                    <div class="text-left">
                        <div>To fund your wallet, make a transfer to the below account</div>
                        <small class="text-warning">Make sure to transfer from an account that has your WeekVest first name and last name as the account name</small>
                    </div>
                    <div class="shadow-sm my-4 px-4 pt-4" id="accountDetails">
                        <pre>
Bank name: PAYCOM
Account Number: 9086363687
Account Name: WeekVest
                        </pre>
                    </div>

                    <!-- <button class="btn btn-white" data-toggle="modal" data-target="#modalPOP">Upload
                        Receipt</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- POP Modal -->
<div class="modal fade" id="modalPOP" tabindex="-1" role="dialog" aria-labelledby="modalPOP" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body text-left p-0">
                <div class="upload w-100">
                    <div class="upload-files">
                        <header>
                            <p>
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                <span class="up">Receipt </span>
                                <span class="up">up</span>
                                <span class="load">load</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        </header>
                        <div class="body" id="drop">
                            <i class="fa fa-file-text-o pointer-none" aria-hidden="true"></i>
                            <p class="pointer-none">

                                <a href="#" id="triggerFile">Click here</a>
                                to begin the upload<br /><strong>After the upload, click the Submit button</strong>

                            </p>
                            <input type="file" accept=".png, .jpg, .jpeg, .pdf" multiple="multiple" id="receiptImage" name="receipt" />
                        </div>
                        <footer>
                            <div class="divider">
                                <span>
                                    <AR>FILES</AR>
                                </span>
                            </div>
                            <div class="list-files">
                                <!--   template   -->
                            </div>
                            <button class="importar" style="position: relative;top: 75px; left: -30px">Change Receipt</button>
                            <button id="receiptUploadBtn" class="btn btn-danger ml-2 d-none" style="position: relative;top: 75px">Submit</button>
                        </footer>
                        <div class="done done-receipt d-none text-center">
                            <div> <i class="fas fa-check fa-9x text-success"></i> </div>
                            <h4 class="text-success">Success!</h4>
                            <p>Your wallet will be funded shortly</p>
                            <p class="transID px-3"></p>
                        </div>
                        <div class="done error-receipt d-none text-center">
                            <div class="mt-3"> <i class="fas fa-undo fa-9x text-danger"></i> </div>
                            <h4 class="text-danger">Error!</h4>
                            <p>Error: <span id="uploadReceiptData"></span><br />Try again afetr a while</p>
                            <button class="btn btn-white" onclick="resetReceiptUpload();">Try again</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bank Details Modal -->
<div class="modal fade" id="updateBankDetailsModal" tabindex="-1" role="dialog" aria-labelledby="updateBankDetailsModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    update bank deatils
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_bank_details_update.action.php" id="userBank" class="form text-left" method="post" direction="./user">
                    <p class="text-warning">Use only details that has your registered name as account name <br><strong class="text-danger">If account name differs from profile name, your account will not be credited</strong></p>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-success" for="resetEmail">Bank</label>
                                <select type="text" class="form-control " id="bankBank" required>
                                    <option selected disabled>Select Bank</option>
                                    <option value="Access Bank">Access Bank</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Diamond Bank">Diamond Bank</option>
                                    <option value="Ecobank">Ecobank</option>
                                    <option value="Fidelity Bank">Fidelity Bank</option>
                                    <option value="First Bank">First Bank</option>
                                    <option value="First City Monument Bank">First City Monument Bank (FCMB)</option>
                                    <option value="Guaranty Trust Bank">Guaranty Trust Bank (GTB)</option>
                                    <option value="Heritage Bank">Heritage Bank</option>
                                    <option value="Keystone Bank">Keystone Bank</option>
                                    <option value="Polaris Bank">Polaris Bank</option>
                                    <option value="Providus Bank">Providus Bank</option>
                                    <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                    <option value="Sterling Bank">Sterling Bank</option>
                                    <option value="Suntrust Bank">Suntrust Bank</option>
                                    <option value="Union Bank">Union Bank</option>
                                    <option value="United Bank for Africa">United Bank for Africa (UBA)</option>
                                    <option value="Unity Bank">Unity Bank</option>
                                    <option value="Wema Bank">Wema Bank</option>
                                    <option value="Zenith Bank">Zenith Bank</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="bankName">account name</label>
                                <input type="text" class="form-control" id="bankName" required readonly disabled value="<?php echo $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname']; ?>" />
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="bankNumber">account number</label>
                                <input type="text" class="form-control" id="bankNumber" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-error"></div>

                    <button class="btn-lg btn-success mt-3 questions-submit" type="submit">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>