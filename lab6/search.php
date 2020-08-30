<html><head><title>Search</title></head>
	<body bgcolor = "pink"> <?php 
		$con = mysqli_connect('localhost','root','','TV');
		if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error()); ?>
	<form action = "search_form.php" method = "GET">
		<table>
			<tr><h4>Enter given fields</h4></tr>
			<input name = "letters" type = "text" placeholder = "letters..."></br>
			 <select style = "width: 144px" name ="broadcaster"><?php 
				$sql = mysqli_query($con,"SELECT Broadcaster FROM TV_CHANNEL");
				while ($row = $sql->fetch_assoc()){ ?>
					<option <?php $caster = $row['Broadcaster'];echo"value=".$caster;?>><?php echo $row['Broadcaster'];?></option>
				<?php } ?>
			</select></br>
			<input type = "submit" value = "Search VIP"/>
			<input type = "reset" value ="Cancel"/>
		</table>
	</form>
</html>















