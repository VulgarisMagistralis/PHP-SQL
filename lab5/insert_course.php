<head><title>INSERTED?</title></head>
<body bgcolor = "dark green"> <?php
	$con = mysqli_connect('localhost','root','','gym');
	if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	$fields = array(); $new_tuple = array(); //dynamic variables
	$res = mysqli_query($con, "SELECT * FROM COURSE");
	while($field = mysqli_fetch_field($res)) array_push($fields, $field -> name); //init field array	
	foreach($fields as $temp)
		if(!isset($_REQUEST['$temp'])) die("Missing field $temp"); //check if input is valid #1
		else array_push($new_tuple, $_REQUEST['$temp']); //copy new tuple to local array not needed
	if($_REQUEST["CLevel"] > 4 || $_REQUEST["CLevel"] < 1) die("CLevel exceeds constraint"); //check course level #2
	$id_check = mysqli_query($con, "SELECT CId FROM COURSE");
	while($id = mysqli_fetch_row($id_check)) if($id[0] == $new_tuple[0]) die("Duplicated key : $id[0]");//id check #3
	$sql="INSERT INTO Course (CId, Name, CType, CLevel)VALUES ('$new_tuple[0]','$new_tuple[1]','$new_tuple[2]','$new_tuple[3]')";	
	if($con->query($sql) === TRUE) echo "New record created successfully"; ?>
	<form action = "add_course.php" method = "GET"></br></br><input type = "submit" value = "Add another Course"/></form>
</body>