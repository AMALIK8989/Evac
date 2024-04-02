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
    <li><a href="./Register.php"><i class="fas fa-user-plus"></i> Register & Login</a></li>
  </ul>
</div>
</header>
<main>
  <section id="hero">
<div class="hero-container">
  <!-- Your content here -->
</div>
  </section>
</main>
</body>
</html>
