<?php
session_start();

$servername = "localhost";
$username = "gym";
$password = "gym";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        header("Location: view.php");
        exit();
    } else {
        $error = "Invalid email or password. Please try again.";
    }
}

$conn->close();
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 1rem 6.5rem;
        background-color: white;
        z-index: 10000;
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
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.header {
    width: 100%;
    padding: 1rem 6.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    z-index: 10000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-link {
    margin-right: 15px;
    text-decoration: none;
    color: #333;
}

.nav-link:last-child {
    margin-right: 0;
}

.signup-form {
    background-color: white;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.signup-form h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.form-group input[type="submit"] {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: red;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.header {
    width: 100%;
    padding: 1rem 6.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    z-index: 10000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-link {
    margin-right: 15px;
    text-decoration: none;
    color: #333;
}

.nav-link:last-child {
    margin-right: 0;
}

.signup-form {
    background-color: white;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.signup-form h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.form-group input[type="submit"] {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: red;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.header {
    width: 100%;
    padding: 1rem 6.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    z-index: 10000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-link {
    margin-right: 15px;
    text-decoration: none;
    color: #333;
}

.nav-link:last-child {
    margin-right: 0;
}

.signup-form {
    background-color: white;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.signup-form h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.form-group input[type="submit"] {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: red;
}

ont-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.header {
    width: 100%;
    padding: 1rem 6.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    z-index: 10000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-link {
    margin-right: 15px;
    text-decoration: none;
    color: #333;
}

.nav-link:last-child {
    margin-right: 0;
}

.signup-form {
    background-color: white;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.signup-form h2 {
    margin-top: 50px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.form-group input[type="submit"] {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: red;
}
</style>
</head>
<body>
    <div class="signup-form">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <?php
            if (isset($error)) {
                echo '<p style="color: red;">' . $error . '</p>';
            }
            ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="login.php">Signup</a></p>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
