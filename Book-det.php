<?php
// Include database connection
include 'Conn.php';

// Fetch available hospitals
$query = "SELECT * FROM hospital_list";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Initialize an empty string to store the options HTML
    $optionsHTML = "";

    // Loop through the results and create option elements
    while ($row = mysqli_fetch_assoc($result)) {
        $HospitalName = $row['hospital_name'];
        // Append each option to the optionsHTML string
        $optionsHTML .= "<option value='$HospitalName'>$HospitalName</option>";
    }
} else {
    // Handle the case where the query fails
    $optionsHTML = "<option value=''>No options available</option>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hospital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="#"><i class="fas fa-users"></i>All Child Details</a></li>
        <li><a href="#"><i class="fas fa-calendar-alt"></i>Date & Time of Vaccination</a></li>
        <li><a href="#"><i class="fas fa-clipboard"></i>Report of Vaccination</a></li>
        <li><a href="#"><i class="fas fa-syringe"></i>List of Vaccine</a></li>
        <li><a href="#"><i class="fas fa-handshake"></i>Request from Parents</a></li>
        <li><a href="#"><i class="fas fa-hospital"></i>Add Hospital</a></li>
        <li><a href="#"><i class="fas fa-list"></i>List of Hospitals</a></li>
        <li><a href="#"><i class="fas fa-book"></i>Booking Details</a></li>
    </ul>
</div>

<div class="main-content">
    <h2>Book Hospital</h2>
    <form method="post">
        <label for="hospital">Select Hospital:</label>
        <select id="hospital" name="hospital" required>
            <?php
         echo $HospitalName;
            ?>
        </select><br>
        <label for="date">Date of Appointment:</label>
        <input type="date" id="date" name="date" required><br>
        <label for="time">Time of Appointment:</label>
        <input type="time" id="time" name="time" required><br>
        <input type="submit" name="book" value="Book Appointment">
    </form>
    <?php
    // Handle form submission to book hospital appointment
    if(isset($_POST['book'])) {
        $hospital_id = $_POST['hospital'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Add code to insert appointment into database
        // Example:
        // $insert_query = "INSERT INTO appointments (hospital_id, appointment_date, appointment_time) VALUES ('$hospital_id', '$date', '$time')";
        // $insert_result = mysqli_query($con, $insert_query);
        // if($insert_result) {
        //     echo "<p>Appointment booked successfully.</p>";
        // } else {
        //     echo "<p>Error booking appointment.</p>";
        // }
    }
    ?>
</div>

</body>
</html>
