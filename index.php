<!DOCTYPE html>
<html>
	<head>
		<title>Twitter Clone App</title>
		<style>
			body {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1>Twitter App Clone</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
			<!--To post on the same page, action="submit.php" to redirect to other page -->

			Name:<input type="text" name="name"><br>
			Post:<br>
			<textarea name="post" rows="5" cols="40"></textarea><br>
			<input type="submit">
		</form>

		<?php 
			//Post content to same page without using database
			/*
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				echo "Post: " . $_POST["post"] . "<br>";
				echo "Posted by: " . $_POST["name"];
			}
			*/

			//establish connection
			$con = mysqli_connect("localhost","user_1","123456","tweet_db");

			//check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			echo "<br>Succesfully connected to MySQL<br>";

			//To create Database
			/*
			$sql = "CREATE DATABASE my_db";
			if (mysqli_query($con,$sql)) {
				echo "Database created succesfully";
			}
			else {
				echo "Error Creating database" . mysqli_error($con);
			}
			*/

			//Create Table
			/*
			$sql = "CREATE TABLE Tweet(
				PID INT NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(PID),
				User CHAR(30),
				Post CHAR(120)
				)";
			if (mysqli_query($con,$sql)) {
				echo "Table created succesfully";
			}
			else {
				echo "Error creating table " . mysqli_error($con);
			}
			*/

			//Insert Data from FORM
			$sql = "INSERT INTO Tweet (User, Post) VALUES ('$_POST[name]', '$_POST[post]')";
			if(!mysqli_query($con,$sql)) {
				die('Error: ' . mysqli_error($con));
			}
			echo "Record added <br><br>";

			//Print Data from Database Table
			$result = mysqli_query($con, "SELECT * FROM Tweet");

			while($row = mysqli_fetch_array($result)) {
				echo $row['Post'] . "<br>" . "Posted by: " . $row['User'] . "<br><br>";
			}

			mysqli_close($con);
		?>
	</body>
</html>