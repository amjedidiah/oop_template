<div class="d-flex">
    <div class="pr-3"><i class="fas fa-piggy-bank fa-4x text-success"></i></div>
    <hgroup class="flex-grow-1">
        <h4 class="text-success font-weight-bold text-uppercase mb-0"><?php echo $details['bank']; ?></h4>
        <h6 class="mb-0"><?php echo $details['number']; ?></h6>
        <h6><?php echo $details['name']; ?></h6>
    </hgroup>
    <div>
        <button class="btn btn-white m-2"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#updateBankDetailsModal"></i></button>
        <form class="form my-2" method="post" action="user_bank_details_delete.action.php" direction="">
            <div class="form-row d-none">
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-success" for="bankID"></label>
                        <input readonly disabled required class="form-control" type="text" id="bankID" value="<?php echo $details['id']; ?>" />
                    </div>
                </div>
            </div>

            <button class="btn btn-danger mx-2" type="submit" onclick="modalSubmit();"><i class="fas fa-trash"></i></button>
            <div class="form-error"></div>
        </form>
    </div>
</div>