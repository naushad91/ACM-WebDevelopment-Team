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
<div class="task">
<form action='todo.php' method="get">
List name :<br> <input type="text" name="list_heading" class="task_input">	<br>
Task:<br> <input type="text" name="task" class="task_input">
	<br><br><br>
	<button type="submit" name="submit" class="task_button">View List &nbsp;</button>
</form>
</div>

<div class="store">
<div class="task">
<?php

$task = $_GET['task']??"";
$lhead = $_GET['list_heading']??"";
echo $lhead."<br>";
$myfile = fopen("$lhead.txt", "a") or die("Unable to open file!");
while(!feof($myfile)) 
{
fwrite($myfile, $task."\n");
fclose($myfile);	
break;
}

$myfile = fopen("$lhead.txt", "r") or die("Unable to open file!");
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
</html>>