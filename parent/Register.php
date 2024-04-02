<?php
include '../Conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include Font Awesome CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Include your custom CSS file -->
  <style>
    /* Additional styles specific to parent.php */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
  header{
    width:100%;
    height: auto;
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

    main{
        width:100%;
        height: auto;
    }

    .container {
      max-width: 100%;
      margin: 20px auto;
      padding: 0 20px;
    }

    h2 {
      margin-top: 0;
    }

    .register-form {
      max-width: 340px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .register-form input[type="text"],
    .register-form input[type="password"],
    .register-form input[type="submit"] {
      width: 320px;
      height: auto;
      padding: 5px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .register-form input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .register-form input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<header>
<!-- Navbar -->
<div class="navbar">
  <ul>
    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fas fa-child"></i>Our Purpose</a></li>
    <li><a href="#"><i class="fas fa-calendar-alt"></i> Vaccination Dates</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Book Hospital</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Request for Hospital</a></li>
    <li><a href="#"><i class="fas fa-file-medical"></i> Report of Vaccination Taken</a></li>
    <li><a href="#register"><i class="fas fa-user-plus"></i> Register & Login</a></li>
  </ul>
</div>
</header>
<main>
<section id="register">
<h2>Register</h2>
<div class="container">
  <form class="register-form" action="#" method="post">
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="text" name="email1" placeholder="Retype Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password1" placeholder=" Retype Password" required>

    <input type="submit" value="Register" name="sub">
  </form>
  <a href="./login.php">Already have an account? Login here.</a>
</div>
</section>
<!-- Main Content -->
<div class="container">
  <!-- Your content here -->
</div>
</main>
</body>
</html>
<?php
if(isset($_POST['sub'])){ 
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass1 = $_POST['password1']; // Corrected input name for retype password

    // Check if passwords match
    if($pass !== $pass1) {
        echo "Passwords do not match";
        exit; // Stop further execution
    }

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Check if email already exists
    $el = "SELECT * FROM parent WHERE email='$email'";
    $res = mysqli_query($con, $el);
    $num = mysqli_num_rows($res);
    if($num > 0){
        echo "Email already exists.";
    } else {
        // Insert new user into database
        $qq = "INSERT INTO Parent (name, password, email) VALUES ('$name','$hashed_password', '$email')";
        $a = mysqli_query($con, $qq);
        if($a) {
            header("location: login.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>