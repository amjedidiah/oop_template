<form method="POST" action="returns.action.php" direction="" class="form text-left">
    <div class="col-12 d-none">
        <div class="form-group">
            <label class="text-success" for="investmentID">Investment ID</label>
            <input type="text" class="form-control" value="<?php echo $investment['id']; ?>" id="investmentID" aria-describedby="investmentID" readonly required />
        </div>
    </div>
    <button class="btn btn-success mb-2" type="submit">Get Returns</button>
    <div class="form-error"></div>
</form>