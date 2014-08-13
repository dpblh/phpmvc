<form action="/index/<?php echo $data['id'] ?>" method="post">
	<input type="hidden" name="_method" value="put">
	<table>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="firstName" value="<?php echo $data['firstName'] ?>"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="lastName" value="<?php echo $data['lastName'] ?>"></td>
		</tr>
	</table>
	<input type="submit" value="Update">
</form>
