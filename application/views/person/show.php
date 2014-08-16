<div class="row">
	<div class="span2">First Name</div>
	<div class="span2"><?php echo $data['firstName'] ?></div>
</div>
<div class="row">
	<div class="span2">Last Name</div>
	<div class="span2"><?php echo $data['lastName'] ?></div>
</div>
<div class="row">
	<div class="span2">
		<form action="/person/<?php echo $data['id'] ?>" method="post">
			<input type="submit" class="btn" value="Delete">
			<input type="hidden" name="_method" value="delete">
		</form>
	</div>
	<div class="span2">
		<form action="/person/<?php echo $data['id'] ?>/edit" method="get">
			<input type="submit" class="btn" value="Edit">
			<input type="hidden" name="_method" value="put">
		</form>
	</div>
</div>

