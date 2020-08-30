<html>
<head><title>INSERTION!</title></head>
	<body bgcolor = "pink"><?php
		$con = mysqli_connect('localhost','root','','TV');
		if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());?>
	<form action = "insert_form.php" method = "GET">
		<table>
			<tr><h2>Insert VIP</h2></tr> <tr><h4>Enter VIP Data</h4></tr><?php
				$result = mysqli_query($con,"SELECT * FROM VIP");
				while($field = mysqli_fetch_field($result)){ ?>
					<input <?php echo"name='$field->name'";?>type="text"placeholder=<?php echo"'$field->name'";?>></br>
				<?php } ?>
			<input type="submit"value="Insert VIP"/>
			<input type="reset"value="Cancel"/>
		</table>
	</form>
</html>