<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registeration</title>
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
          
        }
input[type="text"],
input[type="email"],
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
input[type="email"]:focus,
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
        
        
    </style>
</head>
<body>
    <?php 
        $userInput = [
            'userFirstName' => '',
            'userLastName' => '',
            'userEmail' => '',
        ];

       if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $userInput['userFirstName'] = $_POST['firstname'];
        $userInput['userLastName'] = $_POST['lastname'];
        $userInput['userEmail'] = $_POST['email'];
       
        $to = $userInput['userEmail'];
        $subject = "Welcome to Our Platform";
        $message = "Dear " . $userInput['userFirstName'] . ",\n\n";
        $message .= "Thank you for signing up!\n";
        $message .= "We're excited to have you on board.\n\n";
        $message .= "Best regards,\nYour Team";
        
        $headers = "From: noreply@yourwebsite.com";

        // Send email
        if(mail($to, $subject, $message, $headers)) {
            echo "<div style='text-align: center; color: green;'>Thank you for signing up! Please check your email.</div>";
        }
        }


            ?>

          <div class="header1">
                <h1>Let's get you signed up</h1>
            </div>

             <form action="login.php" method="post">
                <input type="text" name="firstname" placeholder="First Name">
                <input type="text" name="lastname" placeholder="Last Name">
                <input type="email" name="email" placeholder="Email">
               <input type="submit" value="Sign Up">
            </form> 
            
</body>
</html>