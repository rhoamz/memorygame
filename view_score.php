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
    $result = mysqli_query($con,"SELECT * FROM game_score ORDER BY duration, score LIMIT 0,10");
    
?>
    <table>
        <tbody>
<?php
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        foreach($row as $r)
            echo "<td>".$r."</td>";
        echo "</tr>";
    }
?>
        </tbody>
    </table>
<?php
    print(json_encode($output));
	
	mysqli_close($con);
	
?>