<?php
session_start();

// Check if email is set in session, if not, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Logout logic
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to index.php after logout
    header("Location: index.php");
    exit;
}

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

// Query to select data from users table
$email = $_SESSION['email'];
if($_SESSION['role'] == 'admin'){
    $sql = "SELECT * FROM users";
} else {
    $sql = "SELECT * FROM users WHERE email='$email'";
}
$result = $conn->query($sql);
include("header.php");
?>



    <style>
       /* body{

            background-color: transparent;?
        }*/
        table, th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logout-btn {
            margin-top: 10px;
        }
        

    </style>
<script>
    function verifyBeforeDelete (id) {
      var input = document.getElementById("verifyBeforeDelete");
      if (confirm('Are you sure you want to delete this data from the database?')) {
        window.location.href = "delete.php?id="+id;
      } 

    }
  </script>
    <div class="bg-white mt-5" >

        
   
    <h2>User Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row["name"] ."</td>";
                echo "<td>". $row["email"] ."</td>";
                echo "<td>". $row["password"] ."</td>";
                echo "<td>". $row["phone"] ."</td>";
                echo "<td>". $row["address"] ."</td>";
                echo "<td><a href='edit.php?user=".$row["id"]."' >Edit</a> </td>";
                if($_SESSION['role'] == 'admin'){
                  echo "<td><a onclick='verifyBeforeDelete(".$row["id"].")'>Delete</a> </td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <form method="post" action="">
        <button type="submit" name="logout" class="logout-btn">Logout</button>
    </form>
  
    </div>
<?php
include("footer.php");
// Close connection
$conn->close();
?>
