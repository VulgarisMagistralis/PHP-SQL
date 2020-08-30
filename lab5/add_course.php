<html>
<head><title>INSERTION!</title></head>
	<body bgcolor = "pink">
	<?php //establish connection
		$con = mysqli_connect('localhost','root','','gym');
		if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	?>
	<form action = "insert_course.php" method = "GET">
			<?php $fields = array();?>
			<table>
				<tr><h2>Insert Course</h2></tr>
				<tr><h4>Enter given fields</h4></tr></br>
				<?php $result = mysqli_query($con,"SELECT * FROM COURSE");
					while($field = mysqli_fetch_field($result)){
						array_push($fields, $field->name);
					//	echo '<tr>'.$field->name.'</tr>'; ?>
						<input <?php echo"name='$field->name'";?>type="text"placeholder=<?php echo"'$field->name'";?>></br>
			  <?php } ?>
			  <input type = "submit" value = "Insert Course"/>
			</table>
		</form>
</html>