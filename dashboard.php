<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: darkgray;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .div-header {
            color: black;
            display: grid;
            padding: 20px;
            align-items: center;
            justify-content: center;
        }

        .div-header h1 {
            font-size: 50px;
            text-align: center;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            gap: 120px;
        }
            

        .form-1 {
            width: 560%;
           max-width: 100%;
            border: 3px solid black;
            border-radius: 20px;
            margin-top: 50px;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-self: center;
            background: linear-gradient(45deg, #f3f4f6, #d1d5db, #9ca3af);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 13px;
        }

        .form-2 {
            width: 400%;
            height: 190px;
            border: 3px solid black;
            margin: auto;
            border-radius: 20px;
            margin-top: 50px;
            font-size: 13px;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-self: center;
            background: linear-gradient(45deg, #f3f4f6, #d1d5db, #9ca3af);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            overflow-x: hidden;
        }

        #taskList {
    list-style: none;
    padding: 0;
    margin: 0;
}
#taskList li {
    display: flex;
    gap: 20px;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    margin: 5px 0;
    background-color: white;
    border-radius: 5px;
}





        input[type="text"] {
            width: 55%;
            padding: 10px;
            margin: 8px 0;
            border: 3px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: black;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
            outline: none;
        }

        input[type="submit"] {
            background: darkgray;
            color: black;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.7s ease;
        }

        input[type="submit"]:hover {
            background: black;
            color: white;
        }

        .deleteBut {
            background-color: #000;    
    color: white;
    font-size: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    transition: background 0.7s ease;
        }

        .deleteBut:hover {
            background-color: darkgray;
            color: black;
            
        }

   


       
    </style>
</head>
<body>

   <?php 
  $userInput = [
   'username' => '',
   'task' => '' 
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput['username'] = isset($_POST['username']) ? $_POST['username'] : '';
    $userInput['task'] = isset($_POST['task']) ? $_POST['task'] : '';
  }

?>
    
<div class="div-header">
    <h1>Dashboard</h1>

    <div class="form-container">
        <form class="form-1" method="post">
        <h1>Welcome <?php echo htmlspecialchars($userInput['username']); ?></h1>
            <h3>Enter in your task for today: </h3>
            <input type="text" id="taskInput" name="task" placeholder="Enter your task">
            <input type="submit" value="Submit" onclick="addNewTask(); return false;">
        </form>

        <form class="form-2" method="post">
            <h3>Your task for today: </h3>
            <ul id="taskList">
                <?php
                $tasks = [];
                if (isset($_SESSION['tasks'])) {
                    $tasks = $_SESSION['tasks'];
                }

               foreach ($tasks as $task) {
                    echo '<li> . htmlspecialchars($task) . </li>';
                    echo '<button class="deleteBut" onclick="deleteTask(this)">Delete</button>';
                }
                ?>
            </ul>
        </form>
    </div>
</div>
</body>



<script>

function addNewTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList"); 

    if (taskInput.value.trim() !== "") {
        // Create list item
        var newTask = document.createElement("li");
        newTask.innerHTML = taskInput.value;
        
        // Create delete button
        var deleteButton = document.createElement("button");
        deleteButton.className = "deleteBut";
        deleteButton.innerHTML = "X";
        deleteButton.onclick = function() {
            deleteTask(this);
        };
        
        // Add task and delete button
        taskList.appendChild(newTask);
        newTask.appendChild(deleteButton);
        
        // Clear input
        taskInput.value = "";
    }
}

function deleteTask(button) {
    var li = button.parentElement;
    li.remove();
}







</script>

</html>
