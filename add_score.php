<?php
	$con=mysqli_connect("localhost","root","", "score");
	
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	
	$user=$_POST["user"]; 
	$duration=$_POST["duration"]; 
	$score=$_POST["score"]; 
	$location=$_POST["location"]; 


	mysqli_query($con,"INSERT INTO game_score (user, duration, score, location)
	VALUES ('". $user ."', ". $duration .", ". $score .", '". $location ."')");
	
	echo $user;
	mysqli_close($con);
	
?>
