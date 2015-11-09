<?php
	$answers = json_decode(file_get_contents("php://input"));
	for($i = 0; $i < count($answers); $i++){
		echo $answers[$i];
	}
?>
