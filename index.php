<html>
	<body>
		<h1>Twitter App Clone</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">

			Name:<input type="text" name="name"><br>
			Post:<br>
			<textarea name="post" rows="5" cols="40"></textarea><br>
			<input type="submit">
		</form>

		<?php 
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				echo "Post: " . $_POST["post"] . "<br>";
				echo "Posted by: " . $_POST["name"];
			}

			$con = mysqli_connect("localhost","user_1","123456","tweet_db");

			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			echo "<br>Succesfully connected to MySQL";

		?>
	</body>
</html>