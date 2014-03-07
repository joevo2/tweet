<?php
	//connection to database
	$con = mysqli_connect('localhost','user_1','123456','tweet_db');
	//check input data
	$errPost = NULL;
	$errUser = NULL;
	if(empty($_POST['user'])) {
		$errUser = "User name is required";
	}
	if (empty($_POST['post'])) {
		$errPost = "Post is required";
	}
	else {
		mysqli_query($con,"INSERT INTO Tweet (User, Post) VALUES ('$_POST[user]', '$_POST[post]')");
	}

	//delete all
	if (isset($_POST['deleteAll'])) {
		mysqli_query($con,"DELETE FROM Tweet");
	}
	
?>