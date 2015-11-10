<?php
	$point;
	$answers = json_decode(file_get_contents("php://input"));
	if($answers[0] === "A"){ $point += 1; }
	else if($answers[0] === "B"){ $point += 1; }
	// And so on...
?>
