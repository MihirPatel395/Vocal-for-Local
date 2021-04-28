<?php

session_start();
if (isset($_POST['sup_username']) && isset($_POST['sup_password']) && isset($_POST['email'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'dropshipping');

        $sup_username = $_POST['sup_username'];
        $sup_password = $_POST['sup_password'];
        $email = $_POST['email'];
        $cm=$_POST['cname'];

        $sql = "SELECT * FROM `signin` where username='$sup_username' and password='$sup_password'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            echo '<p>Username already taken</p><br>';
            echo '<a href="/sgp/User/Login.php">Back to Sign up Page</a>';
        } 
        else {
            $reg = "insert into `signin` (`username`, `password`,  `email`, `work_in_company` ) values ('$sup_username', '$sup_password', '$email', '$cm');";
            mysqli_query($conn, $reg);    
            $conn->close();
            header('location:Login.php');
            
        }
    
}
