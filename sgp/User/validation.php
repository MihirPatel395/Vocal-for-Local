<?php

session_start();

if (isset($_POST['sin_username']) && isset($_POST['sin_password'])) {

    $flag=false;

    $conn = mysqli_connect('localhost', 'root', '', 'dropshipping');

    $_SESSION['username']=$sin_username = $_POST['sin_username'];
    $sin_password = $_POST['sin_password'];

    $sqlcheck = "SELECT * FROM `signin` where username='$sin_username' and password='$sin_password'";
    $result = mysqli_query($conn, $sqlcheck);
    $num=mysqli_num_rows($result);
    
    if ($num ==1) {
        $sq="select * from `signin` where username='$sin_username' and work_in_company='Y';";
        $r1=mysqli_query($conn, $sq);
        $num1=mysqli_num_rows($r1);
        if($num1==1){
            $conn->close();
            header('location:/sgp/User/worker.php'); //this is for company man

        }
        else{
            $conn->close();
            header('location:/sgp/User/finish.php');  //this is customer
        }
    }
    else{
        $conn->close();
        header('location:/sgp/User/Login.php');
    }
}
