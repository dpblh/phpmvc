<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>user_id</td>
			<td>contact_date</td>
			<td>customer_contact_comment</td>
			<td>customer_contact_value</td>
			<td>direction</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$items = $data['items'];
			foreach ($items as $key => $value) {?>
				<tr>
					<td><?php echo $value['user_id']; ?></td>
					<td><?php echo $value['contact_date']; ?></td>
					<td><?php echo $value['customer_contact_comment']; ?></td>
					<td><?php echo $value['customer_contact_value']; ?></td>
					<td><?php echo $value['direction']; ?></td>
					<td><a href="/customer_contact/<?php echo $value['customer_contact_id'] ?>">Show</a></td>
				</tr>
			<?php }?>
	</tbody>
</table>

<?php will_pagination($data, '/customer_contact') ?>

<a href="/customer_contact/niw">New Item</a>
