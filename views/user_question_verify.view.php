<div class="card info  py-3 px-3 shadow-sm bg-white">
    <div class="card-body ">
        <i class="fas fa-lock fa-3x mb-4"></i>
        <h5>Security Questions</h5>
        <p>
            Select your security question incase you forget your password
        </p>
        <button class="btn btn-outline-success m-2" data-toggle="modal" data-target="#securityModal" type="submit">
            Select
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="securityModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    security questions
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_question.action.php" class="form text-left" method="post" direction="./user">
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
                    <div class="form-row mb-3 justify-content-between d-none">
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
                    <div class="form-row mb-3 justify-content-between d-none">
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

                    <button class="btn-lg btn-success mt-3 d-none questions-submit" type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>