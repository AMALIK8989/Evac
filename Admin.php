<?php
include 'Conn.php';
if(isset($_GET['id'])) {
    $childID = $_GET['id'];
  
    // Query to fetch child details
    $query = "SELECT * FROM child WHERE id = $childID";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Initialize an empty string to store the options HTML
        $optionsHTML = "";

        // Loop through the results and create option elements
        while ($row = mysqli_fetch_assoc($result)) {
            $childID = $row['id']; // Assuming 'id' is the column name for the child ID
            $childName = $row['name'];
            // Append each option to the optionsHTML string
            $optionsHTML .= "<option value='$childID'>$childName</option>";
        }
    } else {
        // Handle the case where the query fails
        $optionsHTML = "<option value=''>No options available</option>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="./style.css"> <!-- Create a CSS file for custom styles -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h2>Admin Dashboard</h2>
  <ul>
    <li><a href="#" class="active"><i class="fas fa-users"></i>All Child Details</a></li>
    <li><a href=""><i class="fas fa-calendar-alt"></i>Date & Time of Vaccination</a></li>
    <li class="rep"><a href="./Child-vaccine-report.php"><i class="fas fa-clipboard"></i>Report of Vaccination</a></li>
    <li class="vac"><a href=""><i class="fas fa-syringe"></i>List of Vaccine</a></li>
    <li><a href=""><i class="fas fa-handshake"></i>Request from Parents</a></li>
    <li><a href=""><i class="fas fa-hospital"></i>Add Hospital</a></li>
    <li><a href=""><i class="fas fa-list"></i>List of Hospitals</a></li>
    <li><a href=""><i class="fas fa-book"></i>Booking Details</a></li>
  </ul>
  <script>
$(document).ready(function() {
    $('.rep a').click(function(event) {
      event.preventDefault(); // Prevent default anchor tag behavior (navigation)
      var href = $(this).attr('href'); // Get the target URL from the link's href attribute
      window.location.href = href; // Redirect the browser to the target URL
    });
});
  </script>
  <script>
    $(document).ready(function() {
    $('.vac a').click(function(event) {
      event.preventDefault(); // Prevent default anchor tag behavior (navigation)
      var href = $(this).attr('href'); // Get the target URL from the link's href attribute
      window.location.href = href; // Redirect the browser to the target URL
    });
});
  </script>
</div>
<main>
  <section id="child-det">
  <div class="content">
<label for="child">Select Available Childrens:</label>
    <select id="child-names" name="children" required>
    <?php echo $optionsHTML; ?>
    </select><br>
  
    <div id="childDetails">

    </div>
     <!-- This div will be used to display child details -->
     <script>
      $('#child-names').change(function() {
    var childID = $(this).val();
    $.ajax({
        url: 'getChildDetails.php',
        method: 'GET',
        data: { childID: childID },
        success: function(response) {
            $('#childDetails').html(response);
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + error);
        }
    });
});
     </script>
</div>
</section>

</main>

<div class="footer">
  &copy; 2024 Your Company Name. All rights reserved.
</div>

</body>
</html>
