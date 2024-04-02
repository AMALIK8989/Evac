<?php

include '../Conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Registration</title>
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
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h2>Hospital Registration</h2>
    <form action="" method="post">
        <div>
            <label for="hospital_name">Hospital Name:</label>
            <input type="text" id="hospital_name" name="hospital_name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div>
            <input type="submit" value="Register" name="register">
        </div>
    </form>
</body>
</html>
<?php
if(isset($_POST['register'])){ 
    $name = $_POST['hospital_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $add = $_POST['address'];
    $phone = $_POST['phone'];

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Check if email already exists
    $el = "SELECT * FROM hospital_list WHERE email='$email'";
    $res = mysqli_query($con, $el);
    $num = mysqli_num_rows($res);
    if($num > 0){
        echo "Email already exists.";
    } else {
        // Insert new hospital into database
        $qq = "INSERT INTO hospital_list (hospital_name, address, phone_number, email, password) VALUES ('$name', '$add', '$phone', '$email', '$hashed_password')";
        $a = mysqli_query($con, $qq);
        if($a) {
            header("location: hospital-login.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
} 
?>
