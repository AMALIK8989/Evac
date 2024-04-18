<?php
// Include database connection
include 'Conn.php';

// Query to retrieve information about available and unavailable vaccines
// $query = "SELECT v.vaccine_name, v.description, v.availability, h.hospital_name 
//           FROM vaccines v
//           JOIN hospital_list h ON v.hospital_id = h.id";
// $result = mysqli_query($con, $query);
// Query to fetch vaccine options from the database

$query = "SELECT hospital_name FROM hospital_list";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Initialize an empty string to store the options HTML
    $optionsHTML = "";

    // Loop through the results and create option elements
    while ($row = mysqli_fetch_assoc($result)) {
        $hospitalname = $row['hospital_name'];
        // Append each option to the optionsHTML string
        $optionsHTML .= "<option value='$hospitalname'>$hospitalname</option>";
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
    <title>List of Vaccines</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .sidebar ul li a.active {
    background-color: #666;
}

/* Main content styles */
.main-content {
    margin-left: 250px; /* Adjust based on sidebar width */
    padding: 20px;
}

#vaccine-listed {
    margin-top: 20px;
}

#vaccine-listed h2 {
    margin-bottom: 20px;
    text-align: center;
}

#vaccine-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

/* Card styles */
.vaccine-card {
    width: 300px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin: 10px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.vaccine-card h3 {
    margin-top: 0;
    color: #333;
}

.vaccine-card p {
    margin: 0;
    color: #666;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<section id="vaccine-listed">
<div class="main-content">
    <h2>List of Vaccines (Available/Unavailable)</h2>
    <label for="hospital_list">Select Available Childrens:</label>
    <select id="hospital-list" name="hospitallist" required>
    <?php echo $optionsHTML; ?>
    </select><br>
    <!-- Container to display vaccine information dynamically -->
    <div id="vaccine-container">
        <!-- Vaccine cards will be loaded here -->
    </div>
</div>
</section>
<!-- Script for AJAX request to fetch vaccine information -->
<script>
    $(document).ready(function(){
        // AJAX request to fetch vaccine information
        $.ajax({
            url: 'get_vaccine_info.php', // PHP script to handle database query
            type: 'GET',
            success: function(response) {
                $('#vaccine-container').html(response); // Insert fetched data into the container
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    });
</script>

</body>
</html>