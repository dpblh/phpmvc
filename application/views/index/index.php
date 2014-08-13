<table>
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
	</tr>
	<?php foreach ($data as $key => $value) {
			$item = $data[$key];?>
			<tr>
				<td><?php echo $item['firstName']; ?></td>
				<td><?php echo $item['lastName']; ?></td>
				<td><a href="/index/<?php echo $item['id'] ?>">Show</a></td>
			</tr>
		<?php }?>
</table>

<a href="/index/niw">New Item</a>
