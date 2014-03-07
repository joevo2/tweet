
<form action="" method="post">
<?php
	//print data 
	$result = mysqli_query($con, "SELECT * FROM Tweet");
	while ($row = mysqli_fetch_array($result)) {
		$id = $row['PID'];
		echo $row['Post'] . "<br>";
		echo "Posted by: " . $row['User'] . "<br>";
		echo "<i>" . $row['timestamp'] .'</i><br>';
		?>
		
		<input type="hidden" name="delete_id" value="<?php print $id; ?>">
		<input type="submit" name="delete" value="Delete">
		<br>
		
		<?php
	}
	?>
	</form>
	<br>
	<?php
	if(isset($_POST['delete'])) {
			$PID = $_POST['delete_id'];
			mysqli_query($con,"DELETE FROM Tweet WHERE PID=$PID");
		}
?>

