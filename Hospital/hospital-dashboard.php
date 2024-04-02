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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
    <!-- Add any necessary CSS stylesheets -->
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
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li style="float:right"><a href="./hospital-login.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2>Choose Vaccines</h2>
        <form id="vaccineForm" action="" method="post">
            <div>
                <label>Select Available Vaccines (Max 3):</label><br>
                <select id="available_vaccines" name="available_vaccines[]" multiple required>
                    <?php echo $optionsHTML; ?>
                </select>
            </div>
            <div>
                <label>Select Unavailable Vaccines (Max 3):</label><br>
                <select id="unavailable_vaccines" name="unavailable_vaccines[]" multiple required>
                    <?php echo $optionsHTML; ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>

    <!-- Add any necessary JavaScript scripts -->
    <script>
        // Function to limit the number of selections in a select element
        function limitSelection(selectElement, limit) {
            selectElement.addEventListener('change', function() {
                var selectedOptions = selectElement.selectedOptions;
                if (selectedOptions.length > limit) {
                    alert("You can only select up to " + limit + " options.");
                    for (var i = 0; i < selectedOptions.length; i++) {
                        if (i >= limit) {
                            selectedOptions[i].selected = false;
                        }
                    }
                }
            });
        }

        // Call the function for both select elements
        limitSelection(document.getElementById('available_vaccines'), 3);
        limitSelection(document.getElementById('unavailable_vaccines'), 3);
    </script>
</body>
</html>
