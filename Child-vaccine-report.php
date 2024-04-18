<?php
include 'Conn.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        #report-sect {
    text-align: center;
    margin-top: 20px;
    margin-left: 270px; /* Add margin to the left to create space for the sidebar */
}

#report {
    width: 70%;
    margin: 0 auto; /* Center the report section horizontally */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    background-color: #fff; /* Add background color to ensure visibility */
}

#report-sect h2 {
  color: #007bff;
  font-size: 24px;
  margin-top: 20px; /* Add margin to the top of the heading */
  margin-bottom: 20px; /* Add margin to the bottom of the heading */
  text-align: center; /* Center the heading */
}

form {
    display: flex;
    justify-content: center; /* Center the form horizontally */
    align-items: center; /* Center the form vertically */
    margin-bottom: 20px; /* Add margin to the bottom of the form */
}

label {
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
}

input[type="date"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

button[type="submit"] {
    padding: 8px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
    <title>Child Vaccination Report</title>
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

    <section id="report-sect">
    <h2>Child Vaccination Report (Date-wise)</h2>
    <div id="report">
    <form method="post">
        <label for="vaccination_date">Select Date:</label>
        <input type="date" id="vaccination_date" name="vaccination_date" required>
        <button type="submit" name="submit">Generate Report</button>
    </form>
</div>
</section>

    <?php
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Get selected date from the form
        $selected_date = $_POST['vaccination_date'];


        // Fetch vaccination records for children on the selected date
        $query = "SELECT * FROM vaccinesel WHERE vaccination_date = '$selected_date'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Vaccination Records for $selected_date:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Child Name</th><th>Vaccine Name</th><th>Vaccination Date</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['child_name'] . "</td>";
                echo "<td>" . $row['vaccine_name'] . "</td>";
                echo "<td>" . $row['vaccination_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No vaccination records found for $selected_date";
        }
    }
    ?>
    <div class="footer">
  &copy; 2024 Your Company Name. All rights reserved.
</div>
</body>
</html>
