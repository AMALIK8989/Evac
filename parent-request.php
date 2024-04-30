<?php
// Include database connection
include 'Conn.php';

// Fetch parent requests that need approval or rejection
$query = "SELECT * FROM request";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Requests Management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #request {
  margin-top: 50px; /* Adjust as needed */
  padding: 20px;
}

.main-content {
  max-width: 800px; /* Adjust as needed */
  margin: 0 auto;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

/* Request styles */
.request {
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  padding: 15px;
  margin-bottom: 20px;
}

.request p {
  margin-bottom: 10px;
}

.request p:last-child {
  margin-bottom: 0;
}

.request p a {
  color: #007bff;
  text-decoration: none;
  margin-right: 10px;
}

.request p a:hover {
  text-decoration: underline;
}
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
    <li><a href="#" class="active"><i class="fas fa-users"></i>All Child Details</a></li>
    <li class="date"><a href="./Date & Time Of Vaccination.php"><i class="fas fa-calendar-alt"></i>Date & Time of Vaccination</a></li>
    <li class="rep"><a href="./Child-vaccine-report.php"><i class="fas fa-clipboard"></i>Report of Vaccination</a></li>
    <li class="vac"><a href="./vaccine-list.php"><i class="fas fa-syringe"></i>List of Vaccine</a></li>
    <li class="req"><a href="./parent-request.php"><i class="fas fa-handshake"></i>Request from Parents</a></li>
    <li class="add"><a href="./AddHospital.php"><i class="fas fa-hospital"></i>Add Hospital</a></li>
    <li class="lish"><a href="./ListOfHospital.php"><i class="fas fa-list"></i>List of Hospitals</a></li>
    <li class="bookdet"><a href="./Booking-details.php"><i class="fas fa-book"></i>Booking Details</a></li>
  </ul>
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
  $('.rep a, .vac a, .date a, .req a, .add a, .lish a, .bookdet a').click(handleAnchorClick);
});
</script>
</div>
<main>
    <section id="request">
<div class="main-content">
    <h2>Parent Requests Management (Approve/Reject)</h2>
    <?php
    if(mysqli_num_rows($result) > 0) {
        // Parent requests found, display them
        while($row = mysqli_fetch_assoc($result)) {
            $parent_id = $row['parent_id'];
            $vaccine_id = $row['vaccine_id'];

            // Check if the selected vaccine is available in hospitals
            $check_query = "SELECT * FROM hospital WHERE vaccine_id = '$vaccine_id'";
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
</section>
</main>

</body>
</html>
