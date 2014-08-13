<table>
	<tr>
		<td>First Name</td>
		<td><?php echo $data['firstName'] ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><?php echo $data['lastName'] ?></td>
	</tr>
</table>

<form action="/index/<?php echo $data['id'] ?>" method="post">
	<input type="submit" value="Delete">
	<input type="hidden" name="_method" value="delete">
</form>

<form action="/index/<?php echo $data['id'] ?>/edit" method="get">
	<input type="submit" value="Edit">
	<input type="hidden" name="_method" value="put">
</form>