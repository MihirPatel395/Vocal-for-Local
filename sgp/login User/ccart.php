<?php

$conn = mysqli_connect('localhost', 'root', '', 'dropshipping');
$sql = "select * from `carttable` order by username;";
$result = mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" class="rel">
    <title>Cart</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/sgp/Login User/index2.html">Vocal For Local</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/sgp/Login User/index2.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hot Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Household</a></li>
                            <li><a class="dropdown-item" href="/sgp/Login User/Electronic.php">Electronics</a></li>
                            <li><a class="dropdown-item" href="#">Sports</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="/sgp/Login User/about2.html">About us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/sgp/Login User/contact2.html">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sgp/User/index.html">Logout</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <a class="cart" style="margin-left: 7px;" href="cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 2 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
                    </svg> Cart <span>0</span>
                </a>

            </div>
        </div>
        </div>
    </nav>

    <div class="products-container">
        <div class="products">
            <table style="width: 80%; text-align: center;">
                <tr>
                    <th id="uname">Username</th>
                    <th id="product">Product</th>
                    <th id="price">Price</th>
                    <th id="total">Total</th>
                </tr>
                <tbody>
                <?php
                    for($i=0;$i<$num;$i++){
                        $v=mysqli_fetch_assoc($result);
                        $prid=$v['productId'];
                        $sql2="select * from `producat` where productId='$prid';";
                        $result2=mysqli_query($conn, $sql2);
                        $values=mysqli_fetch_assoc($result2);
                        ?>
                        <tr>
                            <td><?php echo $v['username'];?></td>
                            <td><?php echo $values['dsc'];?></td>
                            <td><?php echo '₹ ',$values['price'],'.00';?></td>
                            <td><?php echo '₹ ',$values['price'],'.00';?></td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="main.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>


    <!-- <h2 style="text-align: center; text-shadow: 2px;">Electronic Items</h2> -->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>

</html>