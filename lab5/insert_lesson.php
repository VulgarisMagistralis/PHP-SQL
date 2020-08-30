<head><title>INSERTED?</title></head>
<body bgcolor = "dark lime"><?php
	$con = mysqli_connect('localhost','root','','gym'); if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	$fields = array(); $new_tuple = array(); //dynamic variables
	$schedules = mysqli_query($con, "SELECT * FROM SCHEDULE");
	while($field = mysqli_fetch_field($schedules)) array_push($fields, $field -> name); //init field array	
	foreach($fields as $temp)
		if(!$_REQUEST[$temp]) die("Missing field [$temp]. Terminated"); //check if input is entered
		else array_push($new_tuple, $_REQUEST[$temp]);
	if($_REQUEST["WeekDay"] === "saturday" || $_REQUEST["WeekDay"] === "sunday") die("we dont Work on weekends!"); //day check
	if($_REQUEST["Duration"] > 60) die("Lesson is too bloody long"); //duration check
	$day = $new_tuple[1]; $course = $new_tuple[5];
	$date_check = mysqli_query($con,"SELECT WeekDay, CId FROM SCHEDULE"); 	//same course same day check 
	while($date = mysqli_fetch_row($date_check))if($date[1]===$day && $date[5]===$course)die("Course already scheduled for the day");
	$sql = "INSERT INTO SCHEDULE (SSN, WeekDay, StartTime, Duration, CId, GymRoom)
			VALUES ('$new_tuple[0]','$new_tuple[1]','$new_tuple[2]','$new_tuple[3]','$new_tuple[5]','$new_tuple[4]')";	
	if($con->query($sql)) echo "New lesson added successfully";
	else echo "Could not add the lesson "$con->errno ." : ". $con->error; ?>
	<form action = "add_lesson.php" method = "GET"></br></br><input type = "submit" value = "Add another Lesson"/></form>
</body>