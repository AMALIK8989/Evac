<?php
include '../Conn.php';
// Start session to persist user login status
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Sign In</title>
    <!-- Add any necessary CSS stylesheets -->
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="email"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
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
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <h2>Hospital Sign In</h2>
    <form action="hospital-dashboard.php" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Sign In" name="signin">
        </div>
    </form>
</body>
</html>
<?php
if(isset($_POST['signin'])){
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation and authentication (you should use prepared statements to prevent SQL injection)
    $query = "SELECT * FROM hospitals WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    // Check if user credentials are correct
    if(mysqli_num_rows($result) == 1) {
        // User authenticated successfully, redirect to dashboard
        $_SESSION['hospital_email'] = $email; // Store email in session for future use
        header("Location: hospital-dashboard.php");
        exit();
    } else {
        // Invalid credentials, display error message
        echo "Invalid email or password. Please try again.";
    }
}
?>
?>