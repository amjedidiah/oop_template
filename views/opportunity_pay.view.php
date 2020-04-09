<form class="form" method="post" action="opportunities_pay.action.php" direction="./user">
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12">
            <div class="form-group">
                <label class="text-success" for="opportunityUnits">Units to Buy</label>
                <input type="number" class="form-control" min="0" max="<?php echo $opportunities['units_total'] - $opportunities['units_sold']; ?>" name="" id="opportunityUnits" aria-describedby="opportunityUnits" placeholder="e.g: <?php echo ceil(($opportunities['units_total'] - $opportunities['units_sold']) / 4); ?>" onchange="opportunityCost(<?php echo $opportunities['price']; ?>);" onfocus="opportunityCost(<?php echo $opportunities['price']; ?>);" onkeyup="opportunityCost(<?php echo $opportunities['price']; ?>);" />
                <small id="helpId" class="form-text text-muted">Max number of units is
                    <?php echo $opportunities['units_total'] - $opportunities['units_sold']; ?></small>
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class=" col-12">
            <div class="form-group">
                <label class="text-success" for="opportunityUnitsTotalCost">Amount Due</label>
                <input type="number" class="form-control opportunity-units-total-cost border" min="0" max="<?php echo $_SESSION['user']['wallet']; ?>" name="" id="opportunityUnitsTotalCost" aria-describedby="opportunityUnitsTotalCost" value="0" readonly />
                <small class="text-danger font-weight-bold"></small>
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12">
            <div class="form-group">
                <label class="text-success" for="opportunityFundingSource">Funding
                    Source</label>
                <select class="form-control" name="" id="opportunityFundingSource">
                    <option value="Wallet" selected>Wallet</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12 d-none">
            <div class="form-group">
                <label class="text-success" for="opportunityID">Opportunity ID</label>
                <input type="text" class="form-control" value="<?php echo $opportunities['id']; ?>" id="opportunityID" aria-describedby="opportunityID" readonly />
            </div>
        </div>
    </div>

    <div class="form-error"></div>

    <button class="btn btn-success btn-pay mt-3 w-100 d-none" type="submit" onclick="modalSubmit();">
        Buy Units
    </button>
    <a href="./user?action=wallet_fund" class="btn btn-white mt-3 btn-fund w-100 d-none" type="button">
        Fund Wallet
    </a>

    <div class="shadow-sm my-4 px-4 pt-4 d-none" id="accountDetails">
        <pre>
Bank name: PAYCOM
Account Number: 9086363687
Account Name: WeekVest
                        </pre>
    </div>
</form>