<head><title>INSERTED?</title></head>
<body bgcolor = "dark lime"><?php
	$con = mysqli_connect('localhost','root','','TV');if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	$fields = array(); $new_tuple = array(); //dynamic variables
	$vip_fields = mysqli_query($con,"SELECT * FROM VIP");
	while($field = mysqli_fetch_field($vip_fields))array_push($fields,$field->name); //init field array
	foreach($fields as $temp)
		if(!$_REQUEST[$temp]) die("Missing field [$temp]. Terminated"); //check if input is entered
		else array_push($new_tuple, $_REQUEST[$temp]);
	$vip_check = mysqli_query($con,"SELECT SSN FROM VIP"); //duplicate check
	while($ssn = mysqli_fetch_row($vip_check))if($ssn[0]===$new_tuple[0])die("Duplicated SSN [$ssn[0]]");
	$field = implode(",",$fields); $tuple = "'".implode("','",$new_tuple)."'";
	$sql = "INSERT INTO VIP (".$field.") VALUES (".$tuple.")";
	if($con->query($sql))echo"New VIP added successfully";
	else echo "Could not add the VIP: ".$con->errno ." : ". $con->error;?>
	<form action="insert.php"method="GET"></br></br><input type="submit"value="Add another VIP"/></form>
</body>