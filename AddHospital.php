<?php
include 'Conn.php';
session_start();
// Fetch hospital vaccine information
$query = "SELECT * FROM hospital_list";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Vaccines Information</title>
    <link rel="stylesheet" href="./style.css"> <!-- Create a CSS file for custom styles -->
    <style>
          #hospital-det {
    text-align: center;
    padding: 20px;
    width: 80%;
    margin: 50px auto;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  #hospital-det h1 {
    margin-bottom: 20px;
  }
  
  #hospital-det table {
    width: 100%;
    border-collapse: collapse;
  }
  
  #hospital-det th, #hospital-det td {
    border: 1px solid #ccc;
    padding: 8px;
  }
  
  #hospital-det th {
    background-color: #f2f2f2;
  }
  
  #hospital-det td a {
    margin-right: 5px;
  }
  
  /* Add hospital section */
  #add-hospital {
    text-align: center;
    padding: 20px;
    width: 80%;
    margin: 50px auto;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  #add-hospital h2 {
    margin-bottom: 20px;
  }
  
  #add-hospital form {
    width: 70%;
    margin: 0 auto;
  }
  
  #add-hospital form label {
    display: block;
    margin-bottom: 10px;
  }
  
  #add-hospital form input[type="text"],
  #add-hospital form input[type="number"],
  #add-hospital form input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
    </style>
</head>
<body>
<div class="sidebar">
  <h2>Admin Dashboard</h2>
  <ul>
    <li><a href="#" class="active"><i class="fas fa-users"></i>All Child Details</a></li>
    <li><a href=""><i class="fas fa-calendar-alt"></i>Date & Time of Vaccination</a></li>
    <li><a href=""><i class="fas fa-clipboard"></i>Report of Vaccination</a></li>
    <li><a href=""><i class="fas fa-syringe"></i>List of Vaccine</a></li>
    <li><a href=""><i class="fas fa-handshake"></i>Request from Parents</a></li>
    <li><a href=""><i class="fas fa-hospital"></i>Add Hospital</a></li>
    <li><a href=""><i class="fas fa-list"></i>List of Hospitals</a></li>
    <li><a href=""><i class="fas fa-book"></i>Booking Details</a></li>
  </ul>
</div>
<main>
    <section id="hospital-det">
    <h1>Hospital Vaccine Information</h1>
    <div id="hospit-det">
    <table>
        <tr>
            <th>Hospital Name</th>
            <th>Vaccine Name</th>
            <th>Doses Available</th>
            <th>Action</th>
        </tr>
        <?php
        // Display hospital vaccine information in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['hospital_name']}</td>";
            echo "<td>{$row['vaccine_name']}</td>";
            echo "<td>{$row['doses_available']}</td>";
            echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</section>
<section id="add-hospital">
    <div id="hospit-det">
    <!-- Form for adding new entry -->
    <form action="" method="post">
        <h2>Add New Entry</h2>
        <label for="hospital_name">Hospital Name:</label>
        <input type="text" id="hospital_name" name="hospital_name" required><br>
        <label for="vaccine_name">Vaccine Name:</label>
        <input type="text" id="vaccine_name" name="vaccine_name" required><br>
        <label for="doses_available">Doses Available:</label>
        <input type="number" id="doses_available" name="doses_available" required><br>
        <input type="submit" value="Add">
    </form>
</div>
</section>
</main>
</body>
</html>
<?php

// Get form data
$hospital_name = $_POST['hospital_name'];
$vaccine_name = $_POST['vaccine_name'];
$doses_available = $_POST['doses_available'];

// Insert data into database
$query = "INSERT INTO hospital_list (hospital_name, vaccine_name, doses_available) VALUES ('$hospital_name', '$vaccine_name', '$doses_available')";
mysqli_query($con, $query);

// Redirect back to index.php
header("Location: index.php");
exit();
?>