<?php
$name = isset($opportunities) ? $opportunities['name'] : "";
$price = isset($opportunities) ? $opportunities['price'] : "";
$interest = isset($opportunities) ? $opportunities['interest'] : "";
$duration = isset($opportunities) ? $opportunities['duration'] : "";
$partner = isset($opportunities) ? $opportunities['partner'] : "";
$info = isset($opportunities) ? $opportunities['info'] : "";
$category = isset($opportunities) ? $opportunities['category'] : "";
$units = isset($opportunities) ? $opportunities['units_total'] : "";
$date_start = isset($opportunities) ? $opportunities['date_start'] : "";
$formID = isset($opportunities) ? "Update" : "Add";
?>


<form method="post" action="admin/opportunity_new.action.php" direction="" class="opportunityForm<?php echo $formID; ?>">
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12">
            <div class="form-group">
                <label class="text-success" for="opportunityName">Name</label>
                <input type="text" class="form-control" id="opportunityName" placeholder="e.g: Tomato Farms" value="<?php echo $name; ?>" required />
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12 col-md-5">
            <div class="form-group">
                <label class="text-success" for="opportunityPrice">Price</label>
                <input type="number" min="0" class="form-control" id="opportunityPrice" aria-describedby="opportunityPrice" placeholder="e.g: 1000" value="<?php echo $price; ?>" required />
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="form-group">
                <label class="text-success" for="opportunityInterest">Interest</label>
                <input type="number" class="form-control" id="opportunityInterest" aria-describedby="opportunityInterest" min="1" max="100" placeholder="e.g: 12" value="<?php echo $interest; ?>" required />
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12 col-md-5">
            <div class="form-group">
                <label class="text-success" for="opportunityDuration">Duration</label>
                <input type="number" class="form-control" id="opportunityDuration" aria-describedby="opportunityDuration" min="1" placeholder="e.g: 12" value="<?php echo $duration; ?>" required />
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="form-group">
                <label class="text-success" for="opportunityPartner">Partner</label>
                <select class="form-control" id="opportunityPartner" value="<?php echo $partner; ?>" required>
                    <option selected disbaled readonly>Select a Partner</option>
                    <option value="WeekVest Limited">WeekVest Limited</option>
                    <option value="Pedigree Real Estate">Pedigree Real Estate</option>
                    <option value="Unity Farms">Unity Farms</option>
                    <option value="Green Life">Green Life</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12">
            <div class="form-group">
                <label class="text-success" for="opportunityInfo">Info</label>
                <textarea rows="5" class="form-control" id="opportunityInfo" placeholder="Enter info about investment here" required><?php echo $info; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12 col-md-5">
            <div class="form-group">
                <label class="text-success" for="opportunityCategory">Category</label>
                <select class="form-control" id="opportunityCategory" value="<?php echo $category; ?>" required>
                    <option selected disbaled>Select a Category</option>
                    <option value="agriculture">Agriculture</option>
                    <option value="real_estate">Real Estate</option>
                    <option value="transportation">Transportation</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="form-group">
                <label class="text-success" for="opportunityUnits">Total Units</label>
                <input type="number" class="form-control" id="opportunityUnits" aria-describedby="opportunityUnits" min="0" placeholder="e.g: 12" value="<?php echo $units; ?>" required />
            </div>
        </div>
    </div>
    <div class="form-row mb-3 justify-content-between">
        <div class="col-12">
            <div class="form-group">
                <label class="text-success" for="opportunityStartDate">Start Date</label>
                <input type="date" class="form-control" id="opportunityStartDate" aria-describedby="opportunityStartDate" value="<?php echo $date_start; ?>" required />
            </div>
        </div>
    </div>

    <div class="form-error"></div>

    <button class="btn btn-success mt-3" type="submit" onclick="modalSubmit();"><?php echo $formID; ?> Opportunity</button>
</form>