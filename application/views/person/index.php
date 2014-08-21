<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$items = $data['items'];
			foreach ($items as $key => $value) {?>
				<tr>
					<td><?php echo $value['firstName']; ?></td>
					<td><?php echo $value['lastName']; ?></td>
					<td><a href="/person/<?php echo $value['id'] ?>">Show</a></td>
				</tr>
			<?php }?>
	</tbody>
</table>

<?php will_pagination($data, '/person') ?>

<a href="/person/niw">New Item</a>
