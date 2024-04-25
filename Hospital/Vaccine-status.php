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
    <title>Update Vaccine Status</title>
</head>
<body>

<h2>Update Vaccine Status</h2>

<form method="post" action="update_vaccine_status.php">
    <label for="vaccine">Select Vaccine:</label>
    <select id="vaccine" name="vaccine" required>
        <option value="1">Vaccine 1</option>
        <option value="2">Vaccine 2</option>
        <!-- Add more options for other vaccines -->
    </select>
    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="available">Available</option>
        <option value="not_available">Not Available</option>
    </select>
    <input type="submit" name="submit" value="Update Status">
</form>

</body>
</html>
