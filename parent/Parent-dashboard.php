<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include Font Awesome CSS -->
    <title>Parent-Dashboard</title>
    <link rel="stylesheet" href="../style.css">
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
<header>
<!-- Navbar -->
<div class="navbar">
  <ul>
    <li><a href="./detail.php"><i class="fas fa-child"></i> Details of Child</a></li>
    <li><a href="#"><i class="fas fa-calendar-alt"></i> Vaccination Dates</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Book Hospital</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Request for Hospital</a></li>
    <li><a href="#"><i class="fas fa-file-medical"></i> Report of Vaccination Taken</a></li>
    <li><a href="#"><i class="fas fa-user-circle"></i> My Profile</a></li>
  </ul>
</div>
</header>
<main>
    

</main>
    
</body>
</html>