<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-6 col-md-3 col-lg-2 position-fixed h-100 bg-light px-0 shadow-sm" id="userSide">
            <p class="text-center p-4 bg-light" id="header">
                <a class="navbar-brand  flex-grow-1" href="./">
                    <img src="./img/logo.png" width="150" alt="" />
                </a>
            </p>
            <ul class="nav nav-pills flex-column my-3 pl-4" id="userNav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-starting-tab" data-toggle="pill" href="#pills-starting" role="tab" aria-controls="pills-starting" aria-selected="true"><i class="fas fa-globe mr-3"></i>Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-opportunities-tab" data-toggle="pill" href="#pills-opportunities" role="tab" aria-controls="pills-opportunities" aria-selected="false"><i class="fas fa-coins mr-3"></i>Opportuinities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="false"><i class="fas fa-users mr-3"></i>Users</a>
                </li>
                <a class="btn btn-danger just-width px-5 my-4" href="./logout">Logout</a>
            </ul>
        </div>
        <div class="col-12 col-md-9 offset-md-3 col-lg-10 offset-lg-2 tab-content p-0" id="pills-tabContent">
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
                    <div class="img-holder rounded-circle d-inline border-light mx-3">
                        <img src="" class="rounded-circle" width="50" height="50" />
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="tab-pane p-5 mt-5 fade show active" id="pills-starting" role="tabpanel" aria-labelledby="pills-starting-tab">
                <div class="container text-center">
                    <div class="mt-4 mb-5">
                        <h3>Welcome
                            to Admin dashboard
                        </h3>
                        <p>
                            Take control from here
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-5 mt-5 fade" id="pills-opportunities" role="tabpanel" aria-labelledby="pills-opportunities-tab">
                <div class="container my-5 text-center pb-5">


                    <div class="row text-left">
                        <div class="col-12 my-4">
                            <h4 class="text-success text-uppercase mt-5 mb-4">Add Opportunities</h4>
                            <?php include "opportunity_admin_form.view.php"; ?>
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col my-4">
                            <h4 class="text-success text-uppercase pb-3">All Opportunities</h4>
                            <div class="card-columns" id="opportunitiesDiv"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane p-5 mt-5 fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
                <div class="container my-5 text-center pb-5">
                    <div class="row text-left">
                        <div class="col-12 my-4">
                            <h4 class="text-success text-uppercase pb-3">All Users</h4>
                            <div class="card-columns" id="usersDiv"></div>

                            <!-- Tansactions Modal -->
                            <div class="modal fade" id="userTransactionsModal" tabindex="-1" role="dialog" aria-labelledby="userTransactionsModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title text-uppercase font-weight-bold text-success">
                                                <span class="userName"></span>'s Transactions
                                            </h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body px-0">
                                            <div class="container text-center pb-5">
                                                <div class="row text-left">
                                                    <div class="col-12 my-4">
                                                        <h4>Pending Transactions</h4>
                                                        <div class="card-columns user-transactions user-transactions-pending"></div>
                                                    </div>
                                                    <div class="col-12 my-4">
                                                        <h4>Completed Transactions</h4>
                                                        <div class="card-columns user-transactions user-transactions-completed"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Investments Modal -->
                            <div class="modal fade" id="userInvestmentsModal" tabindex="-1" role="dialog" aria-labelledby="userInvestmentsModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title text-uppercase font-weight-bold text-success">
                                                <span class="userName"></span>'s Investments
                                            </h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body px-0">
                                            <div class="container my-5 text-center pb-5">
                                                <div class="row text-left">
                                                    <div class="col-12 my-4">
                                                        <div class="card-columns user-investments"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>