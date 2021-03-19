<?php
$todos = json_decode(file_get_contents('./todos.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="stylesheet" href="index.css">
</head>


<body>
<div class="container">

    <h1 class="main_heading"> Personal To Do List</h1>
    <form action="newtodo.php" method="post">
        <input type="Name of the task" name="todo_name" placeholder="Enter the task">
        <button class="btn">ADD TASK</button>
    </form>


    <br>

    <h3 class="heading">Updated List - </h3>

    <?php foreach ($todos as $todoName => $todo): ?>
        <div style="margin-bottom: 30px;">

            <?php echo $todoName ?>
            <form style="display: inline" action="delete.php" method="post">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <button class="bton">DELETE</button>
            </form>
    </div>

    <?php endforeach; ?>
</div>


</body>
</html>

