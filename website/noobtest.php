<html>
<head>
</head>
<body>
<div>
<?php
$file;
$rnd = rand(0,3);
if($rnd == 1) {
$file = file_get_contents("../question/quest1.txt");
echo $file;
}
if($rnd == 2) {
$file = file_get_contents("../question/quest2.txt");
echo $file;
}
if($rnd == 3) {
$file = file_get_contents("../question/quest3.txt");
echo $file;
}
?>
</div>
</body>
</html>
