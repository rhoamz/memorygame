<?php

    $services_json = json_decode(getenv("VCAP_SERVICES"),true);
    $mysql_config = $services_json["mysql-5.1"][0]["credentials"];
    $username = $mysql_config["username"];
    $password = $mysql_config["password"];
    $hostname = $mysql_config["hostname"];
    $port = $mysql_config["port"];
    $db = $mysql_config["name"];

    // Create connection
    $con=mysqli_connect($hostname, $username, $password, $db,$port);
    // Check connection
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	
	$user=$_POST["user"]; 
	$duration=$_POST["duration"]; 
	$score=$_POST["score"]; 
	$location=$_POST["location"]; 

    $query = "INSERT INTO game_score (user, duration, score, location)
    VALUES ('". $user ."', ". $duration .", ". $score .", '". $location ."')";
    echo var_dump($query);
	$result = mysqli_query($con,$query);
	
    echo var_dump($result);
    
    echo mysqli_error();
    
	echo $user;
	mysqli_close($con);
	
?>
