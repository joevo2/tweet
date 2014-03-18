<?php
	/*
	1. Query one or more item and return the whole row (using array as parameter + implode and explode)
	2. Search function (SQL, "LIKE")
	3. Optimse code
	*/

	function queryItem($con, $table, $col, $item) {
		if (is_array($col) && is_array($item)) {
			$query = "SELECT * FROM $table WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col[$i] . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " AND ";
				}
			}
		}
		else {
			$query = "SELECT * FROM $table WHERE $col = '$item'";
		}
		$result = mysqli_query($con, $query) or die(mysqli_error($con));

		return $result;
	}

	function queryAll($con, $table) {
		$query = "SELECT * FROM $table";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		
		return $result;
	}

	//Not working, foreign ket constraint fail
	function queryDelete($con, $table, $col, $item) {
		if (is_array($col) && is_array($item)) {
			$query = "DELETE FROM $table WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col[$i] . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " AND ";
				}
			}
		}
		else {
			$query = "DELETE FROM $table WHERE $col = '$item'";
		}
		$result = mysqli_query($con, $query) or die(mysqli_error($con));

		return $result;
	}

	function queryCount($con, $table, $col, $item) {
		if (is_array($item)) {
			$query = "SELECT COUNT($col) FROM $table WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " OR ";
				}
			}
		}
		else
			$query = "SELECT COUNT($col) FROM $table WHERE $col = '$item'";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
		return $result;
	}

	function queryUpdate($con, $table, $col, $old, $new) {
		if (is_array($col) && is_array($item)) {
			$query = "DELETE FROM $table WHERE ";
			for ($i=0; $i < count($item); $i++) { 
				$query .= $col[$i] . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " AND ";
				}
			}
		}
		else 
			$query = "UPDATE $table SET $col = '$new' WHERE $col = '$old'";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
	}

	//Not working, foreign ket constraint fail
	function queryInsert ($con, $table, $col, $item) {
		if (is_array($col) && is_array($item)) {
			$query = "INSERT INTO $table (" . implode(', ', $col) . ") VALUES ('" . implode("', '", $item) . "')";
		}
		else {
			$query = "INSERT INTO $table ($col) VALUES ('$item')";
		}
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
	}

	function qSearch ($con, $table, $col, $item) {
		//$query = "SELECT * FROM " . $table . " WHERE " . $col . " LIKE '%" . $item ."%'"  ;
		return mysqli_query($con, "SHOW COLUMNS FROM $table");
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
	
	$field = array("customerName","contactLastName","contactFirstName", "phone"
		, "customerNumber", "addressLine1", "addressLine2", "city", "state", "postalCode", "country"
		, "salesRepEmployeeNumber", "creditLimit");
	$content = array("Joel", "Yek", "Zong Yong", "0146469678", "585", "42c-2-6 BAM Villa", "Jalan Pria, Taman Maluri"
		,"Kuala Lumpur", "Wilayah Persekutuan", "55100", "Malaysia"
		, NULL, "20000");
	
	queryInsert($con, $table, $field, $content);
	//queryDisplay(qSearch($con, $table));
	
?>