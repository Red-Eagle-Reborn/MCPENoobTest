<html>
<head>
</head>
<body>
<div>
<?php
$file = file_get_contents("../question/quest1.txt");
$jsonFile = json_decode($file,true);
$rnd = rand(0,3);
$output;
if($rnd == 1) {
  foreach($jsonFile["question"] as $q1) {
    for($i = 0; i < 10; i++) {
      $output .= "<form method=\"POST\" action=\"result.php\"";
      $output .= $i . ". <b>" . $q1["quest"] . "</b><br>";
      $output .= "<input type=\"radio\" name=\"quest" . $i . "\" value=\"" . $q1["opt1"] . "\">";
      $output .= "<input type=\"radio\" name=\"quest" . $i . "\" value=\"" . $q1["opt2"] . "\">";
      $output .= "<input type=\"radio\" name=\"quest" . $i . "\" value=\"" . $q1["opt3"] . "\">";
      $output .= "<input type=\"radio\" name=\"quest" . $i . "\" value=\"" . $q1["opt4"] . "\">";
    }
  }
}
if($rnd == 2) {
echo $file;
}
if($rnd == 3) {
echo $file;
}
?>
</div>
</body>
</html>
