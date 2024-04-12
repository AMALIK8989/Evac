<?php
include '../Conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Dashboard | Details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include Font Awesome CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Include your custom CSS file -->
  <style>
    /* Additional styles specific to parent.php */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
  header{
    width:100%;
    height: auto;
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

    main{
        width:100%;
        height: auto;
    }
    #details{
        width: 100%;
        height: auto;
    }
    .container {
      max-width: 100%;
      margin: 20px auto;
      padding: 0 20px;
    }

    h2 {
      margin-top: 0;
    }

    #child-form {
    width: 100%;
    height: auto;
    margin-top: 50px;
}

.child {
    margin-top: 50px;
    max-width: 500px;
    height: auto;
    display: flex;
    flex-direction: column; /* Align child elements vertically */
    margin: 0 auto; /* Center the form horizontally */
}

.child label {
    margin-bottom: 8px;
}

.child input[type="text"],
.child input[type="number"],
.child select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Ensure padding is included in the width */
    outline: none;
}

.child input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.child input[type="submit"]:hover {
    background-color: #0056b3;
}

  </style>
</head>
<body>
<header>
<!-- Navbar -->
<div class="navbar">
  <ul>
  <li><a href="./detail.php"><i class="fas fa-child"></i> Details of Child</a></li>
    <li><a href="#"><i class="fas fa-calendar-alt"></i> Vaccination Dates</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Book Hospital</a></li>
    <li><a href="#"><i class="fas fa-hospital"></i> Request for Hospital</a></li>
    <li><a href="#"><i class="fas fa-file-medical"></i> Report of Vaccination Taken</a></li>
    <li><a href="#"><i class="fas fa-user-circle"></i> My Profile</a></li>
  </ul>
</div>
</header>
<main>
<section id="child-form">
    <div class="child">
    <form action="" method="post">
    <!-- Input fields for child details -->
    <label for="child_name">Child's Name:</label>
    <input type="text" id="child_name" name="child_name" required><br>

    <label for="child_age">Child's Age:</label>
    <input type="number" id="child_age" name="child_age" required><br>

    <label for="child_gender">Child's Gender:</label>
    <select id="child_gender" name="child_gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select><br>

    <!-- Submit button -->
    <input type="submit" name="det" value="Submit">
</form>
    </div>
</section> 
</main>
</body>
</html>
<?php
if(isset($_POST['det'])){ 
    $name = $_POST['child_name'];
    $age = $_POST['child_age'];
    $gen = $_POST['child_gender'];
   
    // Check if email already exists
    $el = "SELECT * FROM child WHERE fullname='$name'";
    $res = mysqli_query($con, $el);

    // Check if query executed successfully
    if($res) {
        $num = mysqli_num_rows($res);
        if($num > 0){
            echo "name already exists.";
        } else {
            // Insert new user into database
            $qq = "INSERT INTO child (fullname, age, gender) VALUES ('$name','$age', '$gen')";
            $a = mysqli_query($con, $qq);
            if($a) {
                header("location: vaccination det.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }
}

?>