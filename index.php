<!DOCTYPE html>
<html>
	<head>
		<title>Twitter Clone App</title>
		<style>
			body {
				text-align: center;
			}
			.error {
				color: red;
			}
		</style>
	</head>
	<body>
		<?php 
			//establish connection
			$con = mysqli_connect("localhost","user_1","123456","tweet_db");

			//check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

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
			$checkTable = mysqli_query($con, "SELECT 1 FROM Tweet");
			if ($checkTable == true) {
				//echo "Table exists<br><br>";
			}
			else {
				$sql = "CREATE TABLE Tweet(
				PID INT NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(PID),
				User CHAR(30),
				Post CHAR(120),
				timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
				)";
				if (mysqli_query($con,$sql)) {
					echo "Table created succesfully";
				}
				else {
					echo "Error creating table " . mysqli_error($con);
				}
			}

			//Make form info required
			$nameErr = $postErr = "";
			$name = $post = "";
			if($_SERVER["REQUEST_METHOD"] === "POST") {
				if(empty($_POST["name"])) {
					$nameErr = "Name is required";
				}
				if(empty($_POST["post"])) {
					$postErr = "Post content is require";
				}

				else {
					//Insert Data from FORM
					$sql = "INSERT INTO Tweet (User, Post) VALUES ('$_POST[name]', '$_POST[post]')";
					if(!mysqli_query($con,$sql)) {
						die('Error: ' . mysqli_error($con));
					}
				}
			}

			
		?>
		<h1>Twitter Clone App</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
			<!--To post on the same page, action="submit.php" to redirect to other page -->
			Name: <input type="text" name="name">
			<span class="error">* <?php echo $nameErr; ?></span>
			<br>
			Post: <textarea name="post" rows="5" cols="40"></textarea>
			<br>
			<span class="error">* <?php echo $postErr; ?></span>
			<br>
			<input type="submit">
			<br>


			<?php

			//Print Data from Database Table
			$result = mysqli_query($con, "SELECT * FROM Tweet");

			while($row = mysqli_fetch_array($result)) {
				echo $row['Post'] . "<br>";
				echo "Posted by: " . $row['User'] . "<br>";
				echo "<i>" . $row['timestamp'] . "</i><br><br>";
			}

			//Function to Delete all
			//mysqli_query($con, "DELETE FROM Tweet");

			mysqli_close($con);
			?>
		</form>
	</body>
</html>