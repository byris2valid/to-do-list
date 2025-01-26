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

        .header1 {
            color: black;
            text-align: center;
            padding: 20px;
            align-items: center;
        }   

        form {
            width: 30%;
            border: 3px solid black;
            border-radius: 20px;
            margin-top:  50px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-self: center;
            background: linear-gradient(45deg, #f3f4f6, #d1d5db, #9ca3af);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


 input[type="text"],
input[type="password"] {
    width: 45%;
    padding: 10px;
    margin: 8px 0;
    border: 3px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
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

  .errorMessage {
    display: none;
    color: red;
  }



    </style>
</head>
<body>
    
<?php



     $loginInput = [
        'userName' => '',
        'userPassword' => '',
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $loginInput['userName'] = isset($_POST['username']) ? $_POST['username'] : '';
        $loginInput['userPassword'] = isset($_POST['password']) ? $_POST['password'] : '';
    
     if (empty($loginInput['userName']) || empty($loginInput['userPassword'])) {
        $errorMessage = "Please fill in all fields.";   
    }  else if (!empty($loginInput['userName']) && !empty($loginInput['userPassword'])) {
        $moneyMessage = "You have logged in successfully";
         header("Location: dashboard.php");
    } 
  }
if ($loginInput['userName'] === 'admin' && $loginInput['userPassword'] === 'password') {
    header("Location: dashboard.php");
    exit();
 }
 
      ?>

      
<div class="header1">
    <h1>Login into your account</h1>

    <?php if (isset($errorMessage)) {
        echo "<p class='errorMessage' >$errorMessage</p>";
} 
?>

   <?php if (isset($moneyMessage)) {
        echo "<p class='moneyMessage' >$moneyMessage</p>";
    }
?>

    <form action="dashboard.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
</div>


</body>


</html>