<head><title>INSERTED?</title></head>
<body bgcolor = "dark lime"><?php
	$con = mysqli_connect('localhost','root','','TV'); if(mysqli_connect_errno())die('Failed to connect to MySQL:'.mysqli_connect_error());
	$searched = array(); //$new_tuple = array(); //dynamic variables
	$surnames = mysqli_query($con, "SELECT Surname FROM VIP");
	while($surname = mysqli_fetch_field($surnames)) array_push($searched, $surname -> name); //init field array	
	if(!$_REQUEST["letters"]) die("Missing field letters. Terminated"); //check if input is entered
/*		else array_push($new_tuple, $_REQUEST[$temp]);
	if($_REQUEST["WeekDay"] === "saturday" || $_REQUEST["WeekDay"] === "sunday") die("we dont Work on weekends!"); //day check
	if($_REQUEST["Duration"] > 60) die("Lesson is too bloody long"); //duration check
	$day = $new_tuple[1]; $course = $new_tuple[5];
	$date_check = mysqli_query($con,"SELECT WeekDay, CId FROM SCHEDULE"); 	//same course same day check 
	while($date = mysqli_fetch_row($date_check))if($date[1]===$day && $date[5]===$course)die("Course already scheduled for the day");
	$sql = "INSERT INTO SCHEDULE (SSN, WeekDay, StartTime, Duration, CId, GymRoom)
			VALUES ('$new_tuple[0]','$new_tuple[1]','$new_tuple[2]','$new_tuple[3]','$new_tuple[5]','$new_tuple[4]')";	

			if($con->query($sql)) echo "New lesson added successfully";
	*/else echo "Could not add the lesson "$con->errno ." : ". $con->error; ?>
	<form action = "search.php" method = "GET"></br></br><input type = "submit" value = "Search another VIP"/></form>
</body>