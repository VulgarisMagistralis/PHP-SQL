<html>
<head><title>INSERTION!</title></head>
	<body bgcolor = "pink"> <?php 
		$con = mysqli_connect('localhost','root','','TV');
		if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());?>
		<form action = "insert_appearance_form.php" method = "GET">
			<?php $fields = array();?> 
			<table>
				<tr><h2>Insert Appearance</h2></tr>
				<tr><h4>Enter given fields</h4></tr>
				<tr><select name="SSN"style="width:245px"><?php
				$sql = mysqli_query($con,"SELECT VIPName,Surname,SSN FROM VIP");
				while($row = $sql->fetch_assoc()){ ?>
					<option <?php $ssn = $row['SSN'];echo"value='$ssn'";?>><?php echo$row['VIPName']." ".$row['Surname'];?></option>
				<?php } ?></select></tr></br>
				<input size="37"name="Date"type="text"placeholder="YYYY-MM-DD"></br>
				<input size="37"name="StartTime"type="text"placeholder="HH:MM"></br>
				<input size="37"name="EndTime"type="text"placeholder="HH:MM"></br>
				<select style="width:245px"name ="CodC"><?php 
					$sql = mysqli_query($con,"SELECT CodC, TVName FROM TV_CHANNEL");
					while ($row = $sql->fetch_assoc()){ ?>
						<option <?php $code = $row['CodC'];echo"value='$code'";?>><?php echo$row['TVName'];?></option>
					<?php } ?>
				</select></br>
				<input type = "submit" value = "Insert Appearance"/>
				<input type="reset"value="Cancel"/>
			</table>
		</form>
</html>















