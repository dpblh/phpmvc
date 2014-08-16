<form action="/person/<?php echo $data['id'] ?>" class="form-horizontal" method="post">
	<input type="hidden" name="_method" value="put">
	<div class="control-group">
		<label class="control-label" for="firstName">First Name</label>
		<div class="controls">
			<input type="text" name="firstName" id="firstName" value="<?php echo $data['firstName'] ?>" placeholder="First Name">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="lastName">Last Name</label>
		<div class="controls">
			<input type="text" name="lastName" id="lastName" value="<?php echo $data['lastName'] ?>" placeholder="Last Name">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Update</button>
		</div>
	</div>
</form>

