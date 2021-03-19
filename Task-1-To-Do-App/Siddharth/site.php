<?php 
    $errors = "";

    $db=mysqli_connect('localhost','root','','to_do');

    if(isset($_POST['submit'])){
        if(empty($_POST['task'])){
            $errors="You ,must fill in the task";
        }else{
            $task = $_POST['task'];
            $sql="INSERT INTO tasks (tasks) VALUES ('$task')";
            mysqli_query($db,$sql);
            header('location: site.php');
        }
    }

    if(isset($_GET['del_task'])){
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location site.php');
    }
    $tasks = mysqli_query($db,"SELECT * FROM tasks ORDER BY id ASC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>To-Do</title>
</head>
<body>
    <div class="heading">
        <h1>ToDo List App</h1>
    </div>

    <form method="POST" action="site.php">
        <input type="text" name="task" class="taskin">
        <button type="submit" class="btn" name="submit">Add+</button>
    </form>

    <table>
        <thread>
            <tr>
                <th></th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thread>

        <tbody>
        <?php $i = 1; while($row = mysqli_fetch_array($tasks)){ ?>
            <tr class="tbt">
                <td><?php echo $i; ?></td>
                <td class="task"><?php echo $row['tasks']; ?></td>
                <td class="delete"> 
                    <a href="site.php?del_task=<?php echo $row['id'];?>">x</a>
                </td>
            </tr>

        <?php $i++; }  ?>
            
        </tbody>
    </table>
</body>
</html>
