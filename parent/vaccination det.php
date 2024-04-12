<?php
include '../Conn.php';

// Query to fetch vaccine options from the database
$query = "SELECT vaccine_name FROM vaccination_list";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Initialize an empty string to store the options HTML
    $optionsHTML = "";

    // Loop through the results and create option elements
    while ($row = mysqli_fetch_assoc($result)) {
        $vaccineName = $row['vaccine_name'];
        // Append each option to the optionsHTML string
        $optionsHTML .= "<option value='$vaccineName'>$vaccineName</option>";
    }
} else {
    // Handle the case where the query fails
    $optionsHTML = "<option value=''>No options available</option>";
}
// // Create table 'vaccinesel' with foreign key restraint and auto-increment ID
// $sql = "CREATE TABLE vaccinesel (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   vaccine VARCHAR(50) NOT NULL,
//   date DATE NOT NULL,
//   time TIME NOT NULL
// )";
// mysqli_query($con,$sql);
// $sql = "SELECT v.id, v.vaccine, v.date, v.time, c.child_name, h.hospital_name 
//         FROM vaccinesel v 
//         INNER JOIN child c ON v.child_id = c.id
//         INNER JOIN hospital_list h ON v.hospital_id = h.id";

// $result = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Details</title>
    <link rel="stylesheet" href="../style.css"> <!-- Include your custom CSS file -->
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
        margin-top:50px;
    }
    h2 {
    text-align: center;
    margin-bottom: 20px;
}

.vacc-frm {
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.vacc-frm label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

.vacc-frm select,
.vacc-frm input[type="date"],
.vacc-frm input[type="time"],
.vacc-frm input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

.vacc-frm input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.vacc-frm input[type="submit"]:hover {
    background-color: #0056b3;
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
    <section id="vacc-det">
        <div class="vacc-frm">
<h2>Vaccination Details</h2>

<form action="" method="post">
    <label for="vaccine">Select Vaccine:</label>
    <select id="vaccine" name="vaccine" required>
    <?php echo $optionsHTML; ?>
    </select><br>

    <label for="date">Date of Vaccination:</label>
    <input type="date" id="date" name="date" required><br>

    <label for="time">Time of Vaccination:</label>
    <input type="time" id="time" name="time" required><br>

    <input type="submit" name="vac" value="Submit">
</form>
</div>
</section>
</main>

</body>
</html>
<?php
if(isset($_POST['vac'])){ 
    $vac = $_POST['vaccine'];
    $date = $_POST['date'];
    $time = $_POST['time'];
   
    // Check if vaccination details already exist
    $el = "SELECT * FROM vaccinesel WHERE vaccine='$vac' AND date='$date' AND time='$time'";
    $res = mysqli_query($con, $el);
    $num = mysqli_num_rows($res);
    if($num > 0){
        echo "Vaccination details already exist for this vaccine, date, and time.";
    } else {
        // Insert new vaccination details into database
        $qq = "INSERT INTO vaccinesel (vaccine, date, time) VALUES ('$vac', '$date', '$time')";
        $a = mysqli_query($con, $qq);
        if($a) {
            header("location: ");
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
