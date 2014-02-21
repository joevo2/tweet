<?php
	//print data 
	$result = mysqli_query($con, "SELECT * FROM Tweet");
	while ($row = mysqli_fetch_array($result)) {
		echo $row['Post'] . "<br>";
		echo "Posted by: " . $row['User'] . "<br>";
		echo "<i>" . $row['timestamp'] . "</i><br><br>";
	}
?>

