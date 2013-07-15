<?php

	$con=mysqli_connect("localhost","root","","score");
	$result = mysqli_query($con,"SELECT TOP 10 * FROM game_score ORDER BY duration, score");
	$output = mysqli_fetch_array($result);
	
	print(json_encode($output));
	
	mysqli_close($con);
	
?>