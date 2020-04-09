<div class="form-row justify-content-between mb-3">
	<div class="col-12 col-md-5 input-location-dependant d-none">
		<div class="form-group">
			<label class="control-label">State of residence</label>
			<select onchange="toggleLGA(this);" name="state" id="registerState" class="form-control" required>
				<option value="" selected disabled>- Select -</option>
				<option value='Abia'>Abia</option>
				<option value='Adamawa'>Adamawa</option>
				<option value='AkwaIbom'>AkwaIbom</option>
				<option value='Anambra'>Anambra</option>
				<option value='Bauchi'>Bauchi</option>
				<option value='Bayelsa'>Bayelsa</option>
				<option value='Benue'>Benue</option>
				<option value='Borno'>Borno</option>
				<option value='Cross River'>Cross River</option>
				<option value='Delta'>Delta</option>
				<option value='Ebonyi'>Ebonyi</option>
				<option value='Edo'>Edo</option>
				<option value='Ekiti'>Ekiti</option>
				<option value='Enugu'>Enugu</option>
				<option value='Gombe'>Gombe</option>
				<option value='Imo'>Imo</option>
				<option value='Jigawa'>Jigawa</option>
				<option value='Kaduna'>Kaduna</option>
				<option value='Kano'>Kano</option>
				<option value='Katsina'>Katsina</option>
				<option value='Kebbi'>Kebbi</option>
				<option value='Kogi'>Kogi</option>
				<option value='Kwara'>Kwara</option>
				<option value='Lagos'>Lagos</option>
				<option value='Nasarawa'>Nasarawa</option>
				<option value='Niger'>Niger</option>
				<option value='Ogun'>Ogun</option>
				<option value='Ondo'>Ondo</option>
				<option value='Osun'>Osun</option>
				<option value='Oyo'>Oyo</option>
				<option value='Plateau'>Plateau</option>
				<option value='Rivers'>Rivers</option>
				<option value='Sokoto'>Sokoto</option>
				<option value='Taraba'>Taraba</option>
				<option value='Yobe'>Yobe</option>
				<option value='Zamfara'>Zamafara</option>
			</select>
		</div>
	</div>
	<div class="col-12 col-md-5 input-location-dependant d-none">
		<div class="form-group">
			<label class="control-label">LGA of residence</label>
			<select name="lga" id="registerLGA" class="select-lga form-control" required>
			</select>
		</div>
	</div>
	<div class="col-12 input-location-dependant">
		<i class="fas fa-spinner fa-pulse"></i> Loading location fields
	</div>
</div>