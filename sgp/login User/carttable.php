<?php
    session_start();
    $username=$_SESSION['username'];
    $prId=json_decode($_POST['id']);
    // echo $prId;
    $conn=mysqli_connect('localhost','root','','dropshipping');
    $sql="insert into `carttable` (`username`,`productId`) values ('$username' , '$prId');";
    $result=mysqli_query($conn,$sql);
    
?>