<?php
include 'Conn.php';

// Get the ID from the URL parameter
$id = $_GET['id'];

// Delete data from database based on ID
$query = "DELETE FROM hospital_list WHERE id=$id";
mysqli_query($con, $query);

// Redirect back to index.php
header("Location: AddHospital.php");
exit();
?>