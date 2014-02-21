<?php
	//connection to database
	$con = mysqli_connect('localhost','user_1','123456','tweet_db');
	//check input data
	$errUser = $errPost = "";
	if(empty($_POST['user'])) {
		$errUser = "User name is required";
	}
	if (empty($_POST['post'])) {
		$errPost = "Post is required";
	}
	else {
		//Insertion of data
		mysqli_query($con,"INSERT INTO Tweet (User, Post) VALUES ('$_POST[user]', '$_POST[post]')");
	}
	
?>