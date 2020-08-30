<head><title>Schedule</title></head>
<body bgcolor = "lime">
<?php
	$con = mysqli_connect('localhost','root','','gym');
	if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	if(isset($_REQUEST["trainer"]) && isset($_REQUEST["day"])){
		$week = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$trainer = $_REQUEST["trainer"];
		$day = $_REQUEST["day"];
		$sql = "SELECT S.SSN, S.WeekDay, S.StartTime, S.GymRoom, S.Duration,
				T.Name, T.Surname, C.Name, C.CType, C.CLevel
				FROM SCHEDULE S, COURSE C, TRAINER T
				WHERE T.Surname = '$trainer'
				AND S.SSN = T.SSN AND S.CId = C.CId
				AND S.WeekDay = '$week[$day]'
				GROUP BY S.SSN, S.WeekDay, S.StartTime
				ORDER BY S.SSN,C.Name"; 
		$result = mysqli_query($con, $sql);
		if(!$result)die('Query error: ' .mysqli_error($con));
		echo "<h1>Schedule for $trainer</h1>";
		if(mysqli_num_rows($result) > 0){
			echo "<table border=1 cellpadding=10>";
			echo "<tr>";
			for ($i=0; $i < mysqli_num_fields($result); $i++) { 
				$title = mysqli_fetch_field($result);
				$name = $title->name;
				print "<th bgcolor= red> $name </th>";
			}
			echo "</tr>";
			while ($row = mysqli_fetch_row($result)) {
				echo "<tr bgcolor = white >";
				foreach ($row as $cell) echo "<td>$cell</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else{
			echo "<h4>No lesson scheduled for the trainer $trainer on $week[$day] </h4>";	
		}
	}else echo "<h3> Problem!</h3>";	
?>
</body>