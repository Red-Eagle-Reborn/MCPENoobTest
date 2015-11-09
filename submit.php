<?php
	$answers = json_decode(file_get_contents("php://input"));
	foreach($answers as $a){
		echo $a;
	}
?>
