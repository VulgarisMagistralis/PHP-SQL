<html>
	<head><title>TITLE!</title></head>
	<body bgcolor = "pink">
	<?php //establish connection
		$con = mysqli_connect('localhost','root','','gym');
		if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	?>
		<form action = "form_1.php" method = "GET">
			<table>
				<tr>Course Codes</tr>		 
				<tr><select name = "course"><?php 
					$sql = mysqli_query($con,"SELECT CId FROM COURSE");
					while ($row = $sql->fetch_assoc()){ ?>
						<option <?php $code = $row['CId'];echo" value = '$code'" ;?>><?php echo $row['CId'];?></option>
					<?php } ?>
				</select></tr>
				<input type = "submit" value = "Search" />
			</table>
		</form>
		<form action = "form_2.php" method = "GET">
			<table>
			<tr> Trainer Surnames </tr>
			<tr><select name = "trainer"><?php
				$sql = mysqli_query($con,"SELECT Surname FROM TRAINER");
				while($row = $sql->fetch_assoc()){ ?>
					<option <?php $surname = $row['Surname'];echo"value='$surname'";?>><?php echo $row['Surname'];?></option>
				<?php } ?>
			</select></tr>
			<tr><select name = "day">
				<option value="0">MONDAY</option>
				<option value="1">TUESDAY</option>
				<option value="2">WEDNESDAY</option>
				<option value="3">THURSDAY</option>
				<option value="4">FRIDAY</option>
				<option value="5">SATURDAY</option>
				<option value="6">SUNDAY</option>
			</select></tr>	
			<input type = "submit" value = "Search"/>	
			</table>
		</form>
		<form action = "form_3.php" method = "GET">
			<table>
				<tr>Courses</tr>		 
				<tr><select name = "course"><?php 
					$sql = mysqli_query($con,"SELECT CId, Name FROM COURSE");
					while ($row = $sql->fetch_assoc()){ ?>
						<option <?php $code = $row['CId'];echo" value = '$code'" ;?>><?php echo $row['CId']." : ". $row['Name'];?></option>
					<?php } ?>
				</select></tr>
				<input type = "submit" value = "Search" />
			</table>
		</form>
	</body>
</html>