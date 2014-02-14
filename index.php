<html>
	<body>
		<h1>Twitter App Clone</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">

			Name:<input type="text" name="name"><br>
			Post:<textarea name="post" rows="5" cols="40"></textarea><br>
			<input type="submit">
		</form>

		<?php 
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				echo "Post: " . $_POST["post"] . "<br>";
				echo "Posted by: " . $_POST["name"];
			}

		?>
	</body>
</html>