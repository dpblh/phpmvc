<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value) {
				$item = $data[$key];?>
				<tr>
					<td><?php echo $item['firstName']; ?></td>
					<td><?php echo $item['lastName']; ?></td>
					<td><a href="/person/<?php echo $item['id'] ?>">Show</a></td>
				</tr>
			<?php }?>
	</tbody>
</table>

<a href="/person/niw">New Item</a>
