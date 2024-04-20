<?php
include 'Conn.php';

// Get form data
$id = $_POST['id'];
$hospital_name = $_POST['hospital_name'];
$vaccine_name = $_POST['vaccine_name'];
$doses_available = $_POST['doses_available'];

// Update data in the database
$query = "UPDATE hospital_list SET hospital_name='$hospital_name', vaccine_name='$vaccine_name', doses_available='$doses_available' WHERE id=$id";
mysqli_query($con, $query);

// Redirect back to index.php
header("Location: index.php");
exit();
?>
