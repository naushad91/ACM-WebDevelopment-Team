<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
         <form action="app/app.php" method="POST" autocomplete = "off">
         <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
            <input type="text" 
         name="title"
         style="border-color: red"
         placeholder="This field is req" />
         <button type="submit">Add &nbsp; <span>&#43; </span> </button>  

            <?php } else { ?>
         <input type="text" 
         name="title"
         placeholder="what do you need?" />
         <button type="submit">Add &nbsp; <span>&#43; </span> </button>
         <?php } ?>
         </form>
         </div>
         <?php
            $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");

         ?>         
         <div class="show-todo-section">
         <?php
         if($todos->rowCount() <= 0){
         ?>

         <div class="todo-item">
                <div class="empty">
                <img src="img/todo.jpg" width="100%" >
                </div>
    </div>
    <?php } ?>

    <?php
        while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>

         <div class="todo-item">
         <span id="<?php echo $todo['id']; ?>"
            class="remove-to-do">x</span>
            <?php if($todo['checked']) {?>
                <input type="checkbox"
                        class="check-box"
                        checked />
         <h2 class="checked"><?php echo $todo['Title'] ?></h2>
         
            <?php } else { ?>
                <input type="checkbox"
                        class="check-box"/>
         <h2><?php echo $todo['Title'] ?></h2>
            <?php } ?>
            <br>
                 <small>created: <?php echo $todo['date_time'] ?> </small>
    </div>
    <?php } ?>
    </div>
    </div>
</body>
</html>