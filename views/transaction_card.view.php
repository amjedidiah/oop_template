<div class="card opportunity">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1 text-left">
                <hgroup>
                    <h5 class="text-capitalize my-0"><?php echo $transaction_title; ?></h5>
                    <p><?php echo date("d F Y", strtotime($transaction["createdAt"])); ?></p>
                </hgroup>
            </div>
            <div class="text-right">
                <h5 class="text text-<?php echo $class; ?>">
                    <?php
                    echo $sign . "₦ " . addComma($transaction['amount']);
                    ?>
                </h5>
            </div>
        </div>

        <?php echo $isAdmin && $transaction['approved'] === '0' ? '<form class="form" method="post" action="user_withdraw_complete.action.php" direction="">
            <div class="form-row d-none">
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-success" for="transactionID"></label>
                        <input readonly disabled required class="form-control" type="text" id="transactionID" value="' . $transaction['id'] . '" />
                    </div>
                </div>
            </div>
            <small class="text-warning">Mark as completed only if you have successfully made transfer and alert has been confirmed</small>
            <button class="btn btn-success mx-2" type="submit" userID="' . $user . '" onclick="modalSubmit();">Mark As Completed</button>
            <div class="form-error"></div>
        </form>' : ''; ?>

    </div>
</div>