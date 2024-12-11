<?php
$servername = "localhost";
$username = "gym";
$password = "gym";
$dbname = "gym";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: Hash your passwords for security before storing
    $phone = $_POST['phone'];
    $address = $_POST['address'];
   

    // SQL statement to insert data into users table
    $sql = "INSERT INTO users (name, email, password, phone, address)
            VALUES ('$name', '$email', '$password', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 110vh;
        margin: 0;
    }
    .signup-form {
        background-color: #ffffff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 20px;
        width: 300px;
        max-width: 100%;
        text-align: center;
    }
    .signup-form h2 {
        margin-top: 0;
        font-size: 24px;
        color: orange;
        
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group input {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    .form-group input:focus {
        outline: none;
        border-color: #66afe9;
        box-shadow: 0 0 6px rgba(102, 175, 233, 0.5);
    }
    .form-group label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="submit"] {
        background-color: #232323;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 4px;
    }
</style>
</head>
<
    <div class="signup-form">
        <h2>Sign Up</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone"  required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Sign Up">
            </div>
        </form>
        <p>Already have an account?  <a href="login.php"> Login</a></p>
    </div>
</body>
</html>
