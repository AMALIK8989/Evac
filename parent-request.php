<?php
// Include database connection
include 'Conn.php';

// Fetch parent requests that need approval or rejection
$query = "SELECT * FROM parent_requests";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Requests Management</title>
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
    <h2>Parent Requests Management (Approve/Reject)</h2>
    <?php
    if(mysqli_num_rows($result) > 0) {
        // Parent requests found, display them
        while($row = mysqli_fetch_assoc($result)) {
            $parent_id = $row['parent_id'];
            $vaccine_id = $row['vaccine_id'];

            // Check if the selected vaccine is available in hospitals
            $check_query = "SELECT * FROM hospital_list WHERE vaccine_id = '$vaccine_id'";
            $check_result = mysqli_query($con, $check_query);

            if(mysqli_num_rows($check_result) > 0) {
                // Selected vaccine is available in hospitals, display message to change vaccine
                echo "<div class='request'>";
                echo "<p>Parent ID: $parent_id</p>";
                echo "<p>Vaccine ID: $vaccine_id</p>";
                echo "<p>Please change the selected vaccine.</p>";
                echo "</div>";
            } else {
                // Selected vaccine is not available in hospitals, display approval options
                echo "<div class='request'>";
                echo "<p>Parent ID: $parent_id</p>";
                echo "<p>Vaccine ID: $vaccine_id</p>";
                echo "<p>Options: <a href='#'>Approve</a> / <a href='#'>Reject</a></p>";
                echo "</div>";
            }
        }
    } else {
        // No parent requests found
        echo "<p>No parent requests need approval or rejection.</p>";
    }
    ?>
</div>

</body>
</html>
