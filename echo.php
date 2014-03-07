<?php 
	$con = mysqli_connect('localhost', 'user_1', '123456', 'information_schema');
	$table = "ENGINES";
	$col = "*";
	$query = "SELECT " . $col .  " FROM " . $table;
	$x = mysqli_query($con, $query) or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($x)) {
		echo $row['ENGINE'] . "<br>";
	}

?>

