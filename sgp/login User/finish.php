<?php
session_start();
session_destroy();
header('location:/sgp/User/index.html'); //this login user back to user
?>