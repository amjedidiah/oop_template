<div class="tab-pane p-5 mt-5 fade show active" id="pills-starting" role="tabpanel" aria-labelledby="pills-starting-tab">
    <div class="container text-center">
        <div class="mt-4 mb-5">
            <h3>Hi,
                <i class="get-started-name"></i>
                -
                Welcome
                to WeekVest
            </h3>
            <p>
                A few more steps before you can have access to all these
                opportunities and much more
            </p>
        </div>
        <div class="card-columns">

            <?php intval($_SESSION['user']['verified_mail']) === 1 ? "" : include "user_mail_verify.view.php"; ?>
            <?php intval($_SESSION['user']['verified_question']) === 1 ? "" : include "user_question_verify.view.php"; ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mailVerifyModal" tabindex="-1" role="dialog" aria-labelledby="mailVerifyModal" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-uppercase font-weight-bold text-success">
                            Verification
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="rows">
                                <div class="col-12 mb-4 mb-md-5">
                                    <i class="fas fa-mobile-alt text-success fa-8x"></i>
                                </div>
                                <div class="col">
                                    <h5>Number Verification</h5>
                                    <p>Enter the 4 digit-number sent to your phone</p>

                                    <form action="verify_text.action.php" method="post" direction="./user">
                                        <div class="row verification-field">
                                            <div class="col">
                                                <input type="number" max="9" min="0" maxlength="1" id='textOne' class="form-control border shadow" />
                                            </div>
                                            <div class="col">
                                                <input type="number" max="9" min="0" maxlength="1" id='textTwo' class="form-control border shadow" />
                                            </div>
                                            <div class="col">
                                                <input type="number" max="9" min="0" maxlength="1" id='textThree' class="form-control border shadow" />
                                            </div>
                                            <div class="col">
                                                <input type="number" max="9" min="0" maxlength="1" id='textFour' class="form-control border shadow" />
                                            </div>
                                        </div>

                                        <div class="form-error"></div>

                                        <button class="btn-lg btn-success mt-4" type="submit">
                                            Verify
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>