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
            width: 420%;
            max-width: 100%;
            height: 190px;
            border: 3px solid black;
            margin: auto;
            border-radius: 20px;
            margin-top: 50px;
            font-size: 13px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-self: center;
            background: linear-gradient(45deg, #f3f4f6, #d1d5db, #9ca3af);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
                    echo "<li>" . htmlspecialchars($task) . "</li>";
                }
                ?>
            </ul>
        </form>
    </div>
</div>
</body>



<script>


function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");
    var taskText = taskInput.value.trim();
    if (taskText !== "") {
        var li = document.createElement("li");
        li.className = "task";
        li.innerHTML = taskText;
        taskList.appendChild(li);
        taskInput.value = "";
    }
}

function deleteTask(task) {
    var taskList = document.getElementById("taskList");
    taskList.removeChild(task);
}
function editTask(task) {
    var taskText = task.innerHTML;
    var newTaskText = prompt("Edit task:", taskText);
    if (newTaskText !== null) {
        task.innerHTML = newTaskText;
    }
}
function markTaskAsDone(task) {
    task.classList.toggle("done");
}

function addNewTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");
    var taskText = taskInput.value.trim();
    if (taskText !== "") {
        var li = document.createElement("li");
        li.className = "task";
        li.innerHTML = taskText;
        taskList.appendChild(li);
        taskInput.value = "";
    }
}
</script>

</html>
