<h1>ПРивет <?php echo $data; ?></h1>
<form action="/index/create" method="post">
	<table>
		<tr>
			<td>lastName</td>
			<td>firstName</td>
		</tr>
		<tr>
			<td><input type="text" name="lastName"></td>
			<td><input type="text" name="firstName"></td>
		</tr>
	</table>
	<input type="submit" title="Submit">
</form>