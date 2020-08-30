<head><title>Schedule</title></head>
<body bgcolor = "dark green">
<?php
	$con = mysqli_connect('localhost','root','','gym');
	if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	if(isset($_REQUEST["course"])){
		$c = $_REQUEST["course"];
		$sql="SELECT S.WeekDay,S.StartTime,S.Duration,S.GymRoom,T.Name,T.Surname
			  FROM SCHEDULE S, TRAINER T
			  WHERE S.SSN = T.SSN
			  AND S.CId = '$c' ";	
		$result = mysqli_query($con, $sql);
		if(!$result)die('Query error: ' .mysqli_error($con));
		echo "<h1>Schedule for $c</h1>";
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
		} else echo "<h4>No results!</h4>";
	}else echo "<h3> Problem!<\h3>";	
?>
</body>