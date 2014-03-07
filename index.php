<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body {
			text-align: center;
			padding-top: 10px;
		}

		img {
			padding: 10px 0px 10px 0px;
		}

		.err {
			color: red;
			font-style: italic;
		}
	</style>
</head>
<body>
	<button onclick="location.href='func1.php'">func1.php</button>
	<br>
	<img src="http://placehold.it/550x150&text=Twitter Clone App">
	<?php include "func.php";?>
	<form action="" method="post">
	User: <input type="text" name="user">
	<span class="err">* <?php echo $errUser;?> </span>
	<br>
	Post: <textarea type="text" name="post" row="2"></textarea> 
	<span class="err">* <?php echo $errPost;?> </span>
	<br>
	<input type="submit">
	<input type="submit" name="deleteAll" value="Delete All">
	</form>
	<br>
	<?php include "print.php"; ?>
</body>
</html>