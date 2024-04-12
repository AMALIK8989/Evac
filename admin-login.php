<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Include your custom CSS file -->
  <style>
    /* Additional styles specific to admin-login.php */
    .login-container {
      max-width: 500px;
      height: auto;
      margin: 0 auto;
      padding: 20px;
      border-radius: 10px;
      background-color: #f9f9f9;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .login-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-form input[type="submit"]:hover {
      background-color: #0056b3;
    }

    
  </style>
</head>
<body>

<div class="login-container">
  <h2>Admin Login</h2>
  <form class="login-form" action="#" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login" name="save">
  </form>
</div>

<section id="foot">
<div id="footer">
  &copy; 2024 Your Company Name. All rights reserved.
</div>
</section>

</body>
</html>
<?php

if(isset($_POST['save'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sel = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($con, $sel);
    if($res){
        $num = mysqli_num_rows($res);
        if($num > 0){
            $fe = mysqli_fetch_assoc($res);{
                $_SESSION['abc'] = $fe['username']; // Use 'username' instead of 'name'
                header("location: Admin.php");
                exit; // Add exit to stop further execution after redirecting
            } 
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
