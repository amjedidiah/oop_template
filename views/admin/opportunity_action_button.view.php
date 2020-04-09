<button class="btn btn-success" data-toggle="modal" data-target="#opportunityEditModal<?php echo $opportunities['id']; ?>">
    <i class="fas fa-pencil-alt"></i> Edit
</button>

<form class="mx-0 my-2" action="admin/opportunity_delete.action.php" method="post" direction="">
    <div class="form-group d-none">
        <label for="opportunityID"></label>
        <input readonly disabled type="text" name="" id="opportunityID" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $opportunities['id']; ?>">
    </div>
    <button class="btn btn-danger m-2" type="submit" onclick="modalSubmit();">
        <i class="fas fa-trash"></i> Delete
    </button>
    <div class="form-error"></div>
</form>