<div class="row">
	<div class="span2">user_id</div>
	<div class="span2"><?php echo $data['user_id'] ?></div>
</div>
<div class="row">
	<div class="span2">contact_date</div>
	<div class="span2"><?php echo $data['contact_date'] ?></div>
</div>
<div class="row">
	<div class="span2">customer_contact_comment</div>
	<div class="span2"><?php echo $data['customer_contact_comment'] ?></div>
</div>
<div class="row">
	<div class="span2">customer_contact_value</div>
	<div class="span2"><?php echo $data['customer_contact_value'] ?></div>
</div>
<div class="row">
	<div class="span2">direction</div>
	<div class="span2"><?php echo $data['direction'] ?></div>
</div>
<div class="row">
	<div class="span2">
		<form action="/customer_contact/<?php echo $data['customer_contact_id'] ?>" method="post">
			<input type="submit" class="btn" value="Delete">
			<input type="hidden" name="_method" value="delete">
		</form>
	</div>
	<div class="span2">
		<form action="/customer_contact/<?php echo $data['customer_contact_id'] ?>/edit" method="get">
			<input type="submit" class="btn" value="Edit">
			<input type="hidden" name="_method" value="put">
		</form>
	</div>
</div>

