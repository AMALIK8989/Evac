<?php
include '../Conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include Font Awesome CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Include your custom CSS file -->
  <style>
    /* Additional styles specific to parent-login.php */
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #007bff;
      padding: 10px 20px;
    }

    .navbar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .navbar ul li {
      display: inline;
      margin-right: 20px;
    }

    .navbar ul li a {
      color: #fff;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .navbar ul li a:hover {
      color: #f8f9fa;
    }

    .container {
      max-width: 400px;
      margin: 20px auto;
      padding: 0 20px;
    }

    h2 {
      margin-top: 0;
      text-align: center;
    }

    .login-form input[type="text"],
    .login-form input[type="password"],
    .login-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .login-form input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-form input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <ul>
    <li class="reg"><a href="./Register.php"><i class="fas fa-user-plus"></i> Register & Login</a></li>
    <!-- <li><a href="#"><i class="fas fa-child"></i> Details of Child</a></li>
    <li><a href="#"><i class="fas fa-calendar-alt"></i> Vaccination Dates</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Book Hospital</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Request for Hospital</a></li>
    <li><a href="#"><i class="fas fa-file-medical"></i> Report of Vaccination Taken</a></li>
    <li><a href="#"><i class="fas fa-user-circle"></i> My Profile</a></li> -->
  </ul>
</div>
<script>
$(document).ready(function() {
  // Function to handle click events on anchor tags
  function handleAnchorClick(event) {
    // Get the target URL from the link's href attribute
    var href = $(this).attr('href');
    // Redirect the browser to the target URL
    window.location.href = href;
  }

  // Attach click event handlers to anchor tags with specific classes
  $('.reg a,').click(handleAnchorClick);
});
</script>
<!-- Main Content -->
<div class="container">
  <h2>Parent Login</h2>
  <form class="login-form" action="#" method="post">
    <input type="text" name="email1" placeholder="Username" required>
    <input type="password" name="password1" placeholder="Password" required>
    <input type="submit" value="Login" name="login">
  </form>
</div>

<!-- Footer -->
<div class="footer">
  &copy; 2024 Your Company Name. All rights reserved.
</div>

</body>
</html>
<?php
if(isset($_POST['login'])){
    $email = $_POST['email1'];
    $pass1 = $_POST['password1'];

    // Select user from the database using the provided email
    $sel = "SELECT * FROM parent WHERE email='$email'";
    $res = mysqli_query($con, $sel);

    // Check if the user exists
    if(mysqli_num_rows($res) > 0){
        $fe = mysqli_fetch_assoc($res);
        // Verify the provided password with the hashed password from the database
        $dbpass = $fe['password']; // Assuming the column name is 'password' in your database
        if(password_verify($pass1, $dbpass)){
            // Passwords match, set session and redirect to dashboard
            $_SESSION['abc'] = $fe['name'];
            header("location: parent-dashboard.php");
            exit; // Stop further execution after redirecting
        } else {
          // Passwords don't match, show alert
          echo "<script>alert('Password does not match');</script>";
      }
  } else {
      // User not found, show alert
      echo "<script>alert('Email is not registered');</script>";
  }
}
?>
