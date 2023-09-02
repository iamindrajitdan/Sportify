<?php
include('includes/connect.php');
include('functions/function.php');
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sportify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Sportify
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg><sup>
                                <?php
                                cart_item();
                                ?>
                            </sup></a>
                    </li>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    global $con;
                    $total = 0;
                    $ip = getIPAddress();
                    $query = "SELECT * FROM `cart` WHERE `ip` = '$ip';";
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<div class='alert alert-danger text-center' role='alert'>
                    EMPTY CART!
                  </div>";
                    }
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $qty=$row['quantity'];
                        $product = "SELECT * FROM `products` WHERE product_id='$product_id';";
                        $r = mysqli_query($con, $product);
                        while ($rows = mysqli_fetch_array($r)) {
                            $price = array($rows['product_price']);
                            $price_table = $rows['product_price'];
                            $product_title = $rows['product_title'];
                            $product_img = $rows['img'];
                            $t = array_sum($price);
                            $total = $total + $t;
                    ?>
                            <tr>
                                <td><?php echo "$product_title"; ?></td>
                                <td><?php echo "<img src='./admin/product_images/$product_img' alt='Image' style='width: 50px;height:50px;'>"; ?></td>
                                <td><?php echo "<input type='number' name='quantity' class='form-input w-50' placeholder='$qty'>";?></td>
                                <td><?php
                                    echo "₹$price_table";
                                    ?></td>
                                <td><input class="btn btn-light" type="submit" name="update" value="Update"></td>
                                <?php
                                global $con;
                                $ip = getIPAddress();
                                if (isset($_POST['update'])) {
                                    $quantity = $_POST['quantity'];
                                    $update = "UPDATE `cart` SET `quantity` = '$quantity' WHERE  `ip` = '$ip';";
                                    $result_update = mysqli_query($con, $update);
                                    (float)$total = (int) $total * (int)$quantity;
                                }
                                ?>
                                <td><input class="btn btn-light" type="submit" name="delete" value="Delete"></td>
                                <?php
                                global $con;
                                $ip = getIPAddress();
                                if (isset($_POST['delete'])) {
                                    $del = "DELETE FROM `cart` WHERE `ip` = '$ip' and product_id='$product_id'";
                                    $result_delete = mysqli_query($con, $del);
                                }
                                ?>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <h4>TOTAL:<?php echo "₹$total.00";?></h4>
    </div>
    <div class="container">
        <a class="btn btn-light" href="index.php" role="button">Continue Shopping</a>
        <a class="btn btn-light" href="#" role="button">Checkout</a>
    </div>
    </form>
    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>