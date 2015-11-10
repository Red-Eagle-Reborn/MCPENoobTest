<?php
	$answers = json_decode(file_get_contents("php://input"));
	$point = 0;
	$noobie = 1;
	$pro = 2;
	if($answers[0] === "A"){
		$point += $pro;
	}
	if($answers[0] === "B"){
		$point += $noobie;
	}
	if($answers[0] === "C"){
		$point += $noobie;
	}
	
	if($answers[1] === "A"){
		$point += $noobie;
	}
	if($answers[1] === "B"){
		$point += $pro;
	}
	if($answers[1] === "C"){
		$point += $noobie;
	}
	
	if($answers[2] === "A"){
		$point += $noobie;
	}
	if($answers[2] === "C"){
		$point += $pro;
	}
	
	if($answers[3] === "A"){
		$point += $noobie;
	}
	if($answers[3] === "B"){
		$point += $noobie;
	}
	if($answers[3] === "C"){
		$point += $pro;
	}
	
	if($answers[4] === "D"){
		$point += $pro;
	}
	if($answers[4] === "B"){
		$point += $noobie;
	}
	if($answers[4] === "C"){
		$point += $noobie;
	}
	
	if($answers[5] === "A"){
		$point += $noobie;
	}
	if($answers[5] === "B"){
		$point += $pro;
	}
	if($answers[5] === "C"){
		$point += $noobie;
	}
	
	if($answers[6] === "A"){
		$point += $noobie;
	}
	if($answers[6] === "B"){
		$point += $noobie;
	}
	if($answers[6] === "C"){
		$point += $pro;
	}
?>
