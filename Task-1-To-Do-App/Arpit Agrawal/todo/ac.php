<!DOCTYPE html>
<html>
<head>
	<title>To do List</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">
<div class="heading">
	<h2>Your Personal To-Do List</h2>
</div>

<div class="store">
<div class="task">
<?php
$myfile = fopen("store.txt", "a") or die("Unable to open file!");
$task = $_GET['task'];

while(!feof($myfile)) 
{
fwrite($myfile, $task."\n");
fclose($myfile);	
break;
}

$myfile = fopen("store.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) 
{
echo fgets($myfile);
echo "<br>";
}

fclose($myfile);
?>
</div>
</div>
</div>
</body>
</html>