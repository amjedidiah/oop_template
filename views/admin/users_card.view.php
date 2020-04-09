<div class="card opportunity">
    <div class="card-body">
        <h4 class="card-title">
            <?php echo $user['fname'] . " " . $user['lname']; ?>
        </h4>
        <p><?php echo $user['email']; ?></p>

        <button class="btn btn-white mr-2 my-2 py-2 fas fa-user" data-target="#userProfileModal<?php echo $user['id']; ?>" data-toggle="modal">
            <!-- Fund <?php echo $user['fname']; ?>'s Wallet -->
        </button>

        <button class="btn btn-white mr-2 my-2 py-2 fas fa-wallet" data-target="#adminfundWalletModal<?php echo $user['id']; ?>" data-toggle="modal">
            <!-- Fund <?php echo $user['fname']; ?>'s Wallet -->
        </button>

        <button class="btn btn-white mr-2 my-2 py-2 far fa-folder-open" data-target="#userInvestmentsModal" userID="<?php echo $user['id']; ?>" onclick="getInvestments();" data-toggle="modal">
            <!-- See <?php echo $user['fname']; ?>'s Investments -->
        </button>

        <button class="btn btn-white mr-2 my-2 py-2 fas fa-funnel-dollar" data-target="#userTransactionsModal" userID="<?php echo $user['id']; ?>" onclick="getTransactions();" data-toggle="modal">
            <!-- See <?php echo $user['fname']; ?>'s Transactions -->
        </button>
    </div>
</div>

<!-- Admin Fund Modal -->
<div class="modal fade" id="adminfundWalletModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="adminfundWalletModal" aria-hidden="true">
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

                    <!-- <div id="fundReceipt" class="mb-2"><img src="" alt="" class="img-fluid rounded"></div> -->

                    <div class="my-2 text-center font-weight-bold text-uppercase">
                        <h1 class="display-4 mb-0 text-success"><?php echo "₦ " . addComma($user['wallet']); ?></h1>
                        <small class="font-weight-bold text-muted">wallet balanace</small>
                    </div>

                    <form class="form" method="post" action="admin/wallet_fund.action.php" direction="">
                        <div class="form-row mb-3 justify-content-between">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-success" for="fundAmount">Amount</label>
                                    <input type="number" class="form-control" min="0" id="fundAmount" aria-describedby="fundAmount" placeholder="e.g: 100" required />
                                    <small class="form-text text-warning">Fund only confirmed alerts</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-success" for="fundUser">User Being Funded</label>
                                    <input type="text" class="form-control" id="fundUser" aria-describedby="fundUser" value="<?php echo $user['fname'] . " " . $user['lname']; ?>" readonly />
                                </div>
                            </div>
                            <div class="col-12 d-none">
                                <div class="form-group">
                                    <label class="text-success" for="fundID">User ID</label>
                                    <input type="text" class="form-control" id="fundID" aria-describedby="fundID" value="<?php echo $user['id']; ?>" readonly />
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-success" for="fundTransactionID">Transaction ID</label>
                                    <input type="text" class="form-control" id="fundTransactionID" onchange="displayTransIDImage();" onkeyup="displayTransIDImage();" aria-describedby="fundTransactionID" placeholder="Transaction ID" required />
                                    <small class="text-warning">This ought to be supplied by the user</small>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-error"></div>

                        <button class="btn btn-success w-100 mt-3" type="submit" onclick="modalSubmit();">
                            Fund
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Investments Modal -->
<div class="modal fade" id="userInvestmentsModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="userInvestmentsModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    <?php echo $user['fname']; ?>'s investments
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <div class="container my-5 text-center pb-5">
                    <div class="row text-left">
                        <div class="col-12 my-4">
                            <h4 class="text-success text-uppercase pb-3">All <?php echo $user['fname']; ?>'s Investments</h4>
                            <div class="card-columns user-investments" data-user="<?php echo $user['id']; ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Profile Modal -->
<div class="modal fade" id="userProfileModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="userProfileModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-fluid">
                    <div class="row align-items-end" style="
                            background: rgba(0,0,0,0.2) url(<?php echo "." . $user['avatar']; ?>) no-repeat center center fixed; 
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover; height: 300px;
                        ">
                        <div class="col-12 text-white p-4">
                            <hgroup>
                                <h2 class="text-white text-capitalize"><?php echo $user['fname'] . "<br />" . $user['lname']; ?></h2>
                                <h6 class="text-white"><?php echo $user['email'] . " | " . $user['phone']; ?></h6>
                            </hgroup>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 bg-white p-4 text-center text-uppercase">
                            <div class="d-flex">
                                <div class="flex-grow-1 p-2">
                                    <p class="mb-1"><i class="fas fa-venus-mars fa-2x text-success"></i></p>
                                    <small class="font-weight-bold text-muted"><?php echo $user['gender']; ?></small>
                                </div>
                                <div class="flex-grow-1 p-2">
                                    <p class="mb-1"><i class="fas fa-calendar-alt fa-2x text-success"></i></p>
                                    <small class="font-weight-bold text-muted"><?php echo date("d F Y", strtotime($user["dob"])); ?></small>
                                </div>
                                <div class="flex-grow-1 p-2">
                                    <p class="mb-1"><i class="fas fa-map-marker-alt fa-2x text-success"></i></p>
                                    <small class="font-weight-bold text-muted"><?php echo $user['lga'] . " " . $user['state']; ?></small>
                                </div>
                            </div>
                            <div class="mt-4 mb-5">
                                <h1 class="display-4 mb-0 text-success"><?php echo "₦ " . addComma($user['wallet']); ?></h1>
                                <small class="font-weight-bold text-muted">wallet balanace</small>
                            </div>
                            <div class="d-flex text-center">
                                <a href="tel:<?php echo $user['phone']; ?>" class="flex-grow-1 btn btn-white mr-3"><i class="fas fa-phone mr-2"></i>Call</a>
                                <a href="mailto:<?php echo $user['email']; ?>" class="flex-grow-1 btn btn-success"><i class="fas fa-envelope mr-2"></i>Mail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>