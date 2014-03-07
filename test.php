<?php
	//array as parameter
	function arrayParam($test) {
		$query = "";
		if(is_array($test)) {
			count($test);
			for ($i=0 ; $i < count($test) ; $i++ ) { 
				$query .= $test[$i];
				if ($i < count($test)-1) {
					$query .= ", ";
				}
			}
		}
		echo $query . "<br>";
		
	}

	//array as parameter v2
	function arrayParam2($test) {
		if(is_array($test)) 
			$query = implode(", ", $test);
		echo $query . "<br>";
		
	}

	arrayParam(array("Hello","My","Name","Joel"));
	arrayParam2(array("Testing","of","Implode","Array Parameter"));

	//implode
	$test = array("Testing","Hello","Implode");
	echo implode(", ", $test);

	//explode
	$explodeTest = "Hello my name is Joel Yek how are you doing?";
	$pieces = explode(" ", $explodeTest);
	echo "<br>" . $pieces[0];
?>