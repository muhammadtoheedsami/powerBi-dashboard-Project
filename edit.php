<?php 


    if (isset($_POST['edit'])) {

        $name = $_POST['name'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $phone = $_POST['phone'];

        $address = $_POST['address'];

        $classes = $_POST['classes'];


        $sql = "EDIT `users` SET `name`='$name',`email`='$email',`password`='$password',`phone`='$phone',`address`='$address',`classes`='$classes' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record edit successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];

            $email = $row['email'];

            $password  = $row['password'];

            $phone  = $row['phone'];

            $address  = $row['address'];

            $classes  = $row['classes'];


            $id = $row['id'];

        } 

    ?>

        <h2>User Edit Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>">

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>


            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">

            <br>

            Password:<br>

            <input type="password" name="password" value="<?php echo $password; ?>">

            <br>

            Phone:<br>

            <input type="phone" name="phone" value="<?php echo $phone; ?>">

            <br>

            Address:<br>

            <input type="address" name="address" value="<?php echo $address; ?>">

            <br>

            Classes:<br>

            <input type="classes" name="classes" value="<?php echo $classes; ?>">

           <br>

            <input type="submit" value="Edit" name="edit">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?>