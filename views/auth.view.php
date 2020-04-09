<nav class="navbar navbar-expand-md fixed-top py-3 m-0 border-0 sub-header shadow-sm" id="header">
    <div class="container">
        <a class="navbar-brand flex-grow-1" href="./">
            <img src="./img/logo.png" class="d-md-none" width="150" alt="" />
            <img src="./img/logo_white.png" class="d-none d-md-block" width="150" alt="" />
        </a>
    </div>
</nav>

<div class="container-fluid h-100">
    <div class="row h-100 text-center">
        <div class="col-12 col-md-4 position-fixed d-none d-md-block h-100 bg-success" id="leftScreen">
            <div class="row h-100 align-items-center" id="leftScreenRow">
                <div class="col p-5 text-white">
                    <h2>Welcome Back!</h2>
                    <p class="my-4">
                        Already have an account?
                    </p>
                    <button class="screen-button btn px-5 py-2 border border-white text-uppercase text-white rounded-pill">
                        Login
                    </button>
                </div>
                <div class="col p-5 text-white d-none">
                    <h2>Get Started!</h2>
                    <p class="my-4">
                        Don't have an account?
                    </p>
                    <button class="screen-button btn px-5 py-2 border border-white text-uppercase text-white rounded-pill">
                        Register
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md offset-md-4 bg-white" id="rightScreen">
            <div class="row align-items-center justify-content-around text-center py-5">
                <div class="col col-md-10 offset-md-1 p-5 my-5" id="headerDet">
                    <h2 class="mt-5 mb-4">Get Started</h2>
                    <form method="post" action="register.action.php" class="form text-left" direction="./user">
                        <div class="form-row mb-3">
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label for="registerFName">First Name</label>
                                    <input type="text" id="registerFName" class="form-control" placeholder="e.g: Clement" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label for="registerLName">Last Name</label>
                                    <input type="text" id="registerLName" class="form-control" placeholder="e.g: Obi" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-danger"><small><strong> Please use your preffered bank account name as first name and last name for this registration</strong></small></p>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label for="registerEmail">Email address</label>
                                    <input type="email" id="registerEmail" class="form-control" placeholder="e.g: example@domain.com" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label for="registerPhone">Phone Number</label>
                                    <input type="tel" id="registerPhone" class="form-control" placeholder="Phone" required />
                                </div>
                            </div>
                        </div>

                        <?php
                        include("./assets/location/index.php");
                        ?>

                        <div class="form-row mb-3">
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label for="registerPass">Password</label>
                                    <input type="password" id="registerPass" class="form-control" placeholder="Password" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label for="registerCPass">Confirm Password</label>
                                    <input type="password" id="registerCPass" class="form-control" placeholder="Confirm Password" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="registerDOB">Date of Birth</label>
                                    <input type="date" id="registerDOB" class="form-control" placeholder="DOB" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-error"></div>

                        <button type="submit" class="btn btn-md-lg mt-3 px-5 py-2 border border-white text-white rounded-pill btn-success text-uppercase">
                            Register
                        </button>

                        <div class="d-md-none mt-4">
                            <div class="mb-2">Already have an account?</div>
                            <button class="screen-button btn btn-white btn-md-lg border-0 shadow-0 px-5 py-2 border text-uppercase rounded-pill">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col col-md-10 offset-md-1 p-5 d-none my-5" id="headerDet">
                    <h2 class="mt-5 mb-4">Welcome Back</h2>
                    <form class="form text-left" method="post" action="login.action.php" direction="./user">
                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="loginEmail">Email</label>
                                    <input type="email" id="loginEmail" class="form-control" placeholder="e.g: example@domain.com" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="loginPass">Password</label>
                                    <input type="password" id="loginPass" class="form-control" placeholder="Password" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-error"></div>

                        <div>
                            <button type="submit" class="btn btn-md-lg mt-3 px-5 py-2 border border-white text-white rounded-pill btn-success text-uppercase">
                                Login
                            </button>
                            <p class="text-left mt-2">
                                Forgot your password?<span class="text-success pointer" onclick="tryPasswordReset();"> Reset password</span>
                            </p>
                        </div>

                        <div class="d-md-none mt-4">
                            <p class="mb-2">Don't have an account?</p>
                            <button class="screen-button btn btn-white btn-md-lg border-0 shadow-0 px-5 py-2 border text-uppercase rounded-pill">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    reset password
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="mt-5 mb-4">Security Questions</h4>
                <form action="user_req_pass_reset.action.php" id="userQuestions" class="form text-left" method="post" direction="./user">
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-success" for="resetEmail">Email</label>
                                <input type="email" class="form-control" id="resetEmail" required readonly disabled />
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="text-success" for="question1">question 1</label>
                                <input type="text" class="form-control" id="question1" required readonly disabled />
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
                                <input type="text" class="form-control" id="question2" required readonly disabled />
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
                                <input type="text" class="form-control" id="question3" required readonly disabled />
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
        </div>
    </div>
</div>