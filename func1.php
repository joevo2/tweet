<?php
	/*
	1. Query one or more item and return the whole row (using array as parameter + implode and explode)
	2. Search function (SQL, "LIKE")
	3. Optimse code
	*/

	function queryItem($con, $table, $col, $item) {
		if (is_array($col) && is_array($item)) {
			$query = "SELECT * " . "FROM " . $table . " WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col[$i] . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " AND ";
				}
			}
		}
		else {
			$query = "SELECT * " . "FROM " . $table . " WHERE " . $col . " = '" . $item . "'";
		}
		$result = mysqli_query($con, $query) or die(mysqli_error($con));

		return $result;
	}

	function queryAll($con, $table) {
		$query = "SELECT * " . "FROM " . $table;
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		
		return $result;
	}

	function queryDelete($con, $table, $col, $item) {
		if (is_array($col) && is_array($item)) {
			$query = "DELETE FROM " . $table . " WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col[$i] . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " AND ";
				}
			}
		}
		else {
			$query = "DELETE FROM " . $table . " WHERE " . $col . " = '" . $item . "'";
		}
		$result = mysqli_query($con, $query) or die(mysqli_error($con));

		return $result;
	}


	//Can count 2 or more item from the same field using OR
	function queryCount($con, $table, $col, $item) {
		if (is_array($item)) {
			$query = "SELECT COUNT(" . $col . ") FROM " . $table . " WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " OR ";
				}
			}
		}
		else
			$query = "SELECT COUNT(" . $col . ") FROM " . $table . " WHERE " . $col . "='" . $item . "'";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
		return $result;
	}

	function queryUpdate($con, $table, $col, $new, $old) {
		$query = "UPDATE " . $table . " SET " . $col . "='" . $new . "' WHERE " . $col . "='" . $old . "'";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
	}


	function queryDisplay($result) {
		$rowCount = mysqli_num_rows($result);
		for ($x=0; $x < $rowCount; $x++) { 
			$row = mysqli_fetch_array($result,MYSQLI_NUM);
			for ($i=0; $i < count($row); $i++) {
					echo $row[$i] . " ";
			}
			echo "<br>";
		}
	}


	//Testing
	$table = "customers";
	$db = "classicmodels";
	$con = mysqli_connect('localhost', 'root', '', $db);

	//queryDisplay(queryAll($con, $table));
	queryDisplay(queryItem($con, $table, array("country","state"), array("USA","CA")));
	//queryDelete($con, $table, "customerNumber", "124");
	//queryDisplay(queryCount($con, $table, "country", array("USA","Singapore")));




	





	


	//insert
	//use array for multiple col and item? overloading?
	function queryInsert ($con, $table, $col, $item) {
		$query = "INSERT INTO " . $table . " (" . $col . ") VALUES ('" . $item . "')";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
	}

	//update, limit to 1
	

	//group by
	function queryGroupBy($con, $table, $col) {
		$query = "SELECT " . $col ;
	}


	//testing	
	if(isset($_POST['add'])) {
		queryInsert($con,  $table, $col, $_POST['content']);
	}
	if(isset($_POST['delete'])) {
		queryDelColItem($con,  $table, $col, $_POST['content']);
	}

	if(isset($_POST['count'])) {
		echo "Count of '" . $_POST['content'] . "': ";
		queryDisplay(queryCount($con,  $table, $col, $_POST['content']));
	}

	if(isset($_POST['update'])) {
		queryUpdate($con,  $table, $col, $_POST['new'], $_POST['old']);
	}

	
?>

<form action="" method="post">
	<input type="text" name="content">
	<input type="submit" name="add" value="Add Record">
	<input type="submit" name="delete" value="Delete Record">
	<input type="submit" name="count" value="Count Record">
	<!--For updating query-->
	<br>
	<input type="text" name="old" placeholder="Old">
	<input type="text" name="new" placeholder="New">
	<input type="submit" name="update" value="Update Record">
</form>