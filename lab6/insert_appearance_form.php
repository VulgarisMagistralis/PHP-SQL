<head><title>INSERTED?</title></head>
<body bgcolor = "dark lime"><?php
	$con=mysqli_connect('localhost','root','','TV');if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	$fields = array(); $new_tuple = array(); //dynamic variables
	$appearance=mysqli_query($con, "SELECT * FROM APPEARANCE");
	while($field=mysqli_fetch_field($appearance))array_push($fields,$field->name); //init field array	
	foreach($fields as $temp)
		if(!$_REQUEST[$temp])die("Missing field [$temp]. Terminated"); //check if input is entered
		else array_push($new_tuple, $_REQUEST[$temp]);
	// validation of date
	$test_date  = explode('-',$_REQUEST['Date']);
	if(count($test_date)==3){if(!checkdate($test_date[1],$test_date[2],$test_date[0]))die("Invalid date");
	}else die("Missing time input");
	//validation of StartTime
	$test_time = explode(':',$_REQUEST['StartTime']);
	if(count($test_time)==2){if(!is_numeric($test_time[0])||!is_numeric($test_time[1]))die("Enter numbers for time");
	}else die("Missing start time input");
	//validation of EndTime
	unset($test_time);
	$test_time = explode(':',$_REQUEST['EndTime']);
	if(count($test_time)==2){if(!is_numeric($test_time[0])||!is_numeric($test_time[1]))die("Enter numbers for time");
	}else die("Missing end time input");
	$peep = $new_tuple[0];
	$dates = mysqli_query($con,"SELECT Date FROM APPEARANCE WHERE SSN = '$peep'");
	while($date = mysqli_fetch_row($dates)) //schedule overlap check
		if($date[0] === $_REQUEST['Date']){
			$starts = mysqli_query($con,"SELECT StartTime,EndTime FROM APPEARANCE WHERE SSN='$peep' AND Date='".$date[0]."'");
			while($start = mysqli_fetch_row($starts)) if(($start[0]<=$_REQUEST['StartTime'] &&$start[1]>$_REQUEST['StartTime'])
				|| ($start[0] < $_REQUEST['EndTime'] && $start[1] > $_REQUEST['StartTime'])) die("Overlapping time schedule");
		}
	$field=implode(",",$fields);$tuple="'".implode("','",$new_tuple)."'";
	$sql="INSERT INTO APPEARANCE(".$field.")VALUES(".$tuple.")";		
	if($con->query($sql))echo"New appearance added successfully";
	else echo "Could not add the Appearance ".$con->errno." : ".$con->error;?>
	<form action="insert_appearance.php"method="GET"></br></br><input type="submit"value="Add another Appearance"/></form>
</body>