<?php
include 'Conn.php';

// Get the ID from the URL parameter
$id = $_GET['id'];

// Fetch data from database based on ID
$query = "SELECT * FROM hospital_list WHERE id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
</head>
<body>
    <h1>Edit Entry</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="hospital_name">Hospital Name:</label>
        <input type="text" id="hospital_name" name="hospital_name" value="<?php echo $row['hospital_name']; ?>" required><br>
        <label for="vaccine_name">Vaccine Name:</label>
        <input type="text" id="vaccine_name" name="vaccine_name" value="<?php echo $row['vaccine_name']; ?>" required><br>
        <label for="doses_available">Doses Available:</label>
        <input type="number" id="doses_available" name="doses_available" value="<?php echo $row['doses_available']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>