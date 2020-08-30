<html>
<head><title>INSERTION!</title></head>
	<body bgcolor = "pink"> <?php 
		$con = mysqli_connect('localhost','root','','gym');
		if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error()); ?>
	<form action = "insert_lesson.php" method = "GET">
			<?php $fields = array();?>
			<table>
				<tr><h2>Insert Lesson</h2></tr>
				<tr><h4>Enter given fields</h4></tr>
				<tr><select name = "SSN"><?php
				$sql = mysqli_query($con,"SELECT Surname, Name, SSN FROM TRAINER");
				while($row = $sql->fetch_assoc()){ ?>
					<option <?php $ssn = $row['SSN'];echo"value = '$ssn'";?>><?php echo $row['SSN']." : ".$row['Name']." ".$row['Surname'];?></option>
				<?php } ?> </select></tr></br>
				<input size="37" name="WeekDay"type = "text" placeholder="WeekDay"></br>
				<input size="37" name="StartTime"type="text" placeholder="StartTime"></br>
				<input size="37" name="Duration"type= "text" placeholder="Duration"></br>
				<input size="37" name="GymRoom"type = "text" placeholder="GymRoom"></br> 
				<select width="245"style="width: 245px" name ="CId"><?php 
					$sql = mysqli_query($con,"SELECT CId, Name FROM COURSE");
					while ($row = $sql->fetch_assoc()){ ?>
						<option <?php $code = $row['CId'];echo" value = '$code'" ;?>><?php echo $row['CId']." - ". $row['Name'];?></option>
					<?php } ?>
				</select></br>
				<input type = "submit" value = "Insert Lesson"/>
			</table>
		</form>
</html>















