<head><title>INSERTED?</title></head>
<body bgcolor = "dark lime"><?php
	$con = mysqli_connect('localhost','root','','TV'); if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	$searched = array();
	if(!$_REQUEST["letters"]) die("Missing field letters. Terminated"); //check if input is entered
	if(!$_REQUEST["broadcaster"])die("Missing field broadcaster. Terminated");//check if input is entered
	$caster = $_REQUEST["broadcaster"]; $letters = $_REQUEST["letters"];
	$res=mysqli_query($con,"SELECT Surname FROM VIP WHERE Surname LIKE '".$letters."%'");
	while($s = mysqli_fetch_array($res, MYSQLI_ASSOC)) $searched[] = $s['Surname'];
	$surnames="'".implode("','",$searched)."'";$code=implode(" ",["CHANNEL","CODE"]);
	$sql = "SELECT V.VIPName AS NAME, V.Surname AS SURNAME,
			A.CodC AS '$code', A.Date AS DATE, A.StartTime
			FROM APPEARANCE A, VIP V, TV_CHANNEL T
			WHERE V.SSN = A.SSN AND A.CodC = T.CodC
			AND T.Broadcaster = '$caster' AND 
			V.Surname IN (".$surnames.")
			GROUP BY A.CodC, A.DATE ,A.StartTime ";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	echo "<table border=1 cellpadding=10>"; echo "<tr>";
	for($i = 0; $i < mysqli_num_fields($result); $i++) { 
		$title = mysqli_fetch_field($result);
		$name = $title->name;
		print "<th> $name </th>";
	}echo "</tr>";
	while ($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		foreach ($row as $cell) echo "<td>$cell</td>";
		echo "</tr>";
	}
	echo "</table>"; ?>
	<form action = "search.php" method = "GET"></br></br><input type = "submit" value = "Search another VIP"/></form>
</body>