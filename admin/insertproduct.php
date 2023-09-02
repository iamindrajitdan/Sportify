<?php
include('../includes/connect.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <form method="POST" enctype="multipart/form-data">
    <div class="container mb-4 w-50 m-auto">
      <h3 style="text-align: center;">Insert Product</h3>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Product Title</label>
        <input type="text" class="form-control" id="exampleInputInput1"name="product_title" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Product Description</label>
        <input type="text" class="form-control" id="exampleInputInput1"name='product_description'required >
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label " >Product keywords</label>
        <input type="text" class="form-control" id="exampleInputInput1"name='product_keywords'required>
      </div>
      <div class="mb-3">
        <select class="form-select" name='product_category'>
          <option selected>Select a category</option>
          <?php
          $select_query = "SELECT * FROM `categories`";
          $result_query = mysqli_query($con, $select_query);
          while ($row_data = mysqli_fetch_assoc($result_query)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <select class="form-select" name='product_brand'>
          <option selected>Select a Brand</option>
          <?php
          $select_quer = "SELECT * FROM `brands`";
          $result_quer = mysqli_query($con, $select_quer);
          while ($row_dat = mysqli_fetch_assoc($result_quer)) {
            $brand_title = $row_dat['brand_title'];
            $brand_id = $row_dat['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">Product image</label>
        <input class="form-control" type="file" id="formFile" name="img">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Price MRP</label>
        <input type="text" class="form-control" id="exampleInputInput1"name="product_priceog"required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Price</label>
        <input type="text" class="form-control" id="exampleInputInput1"name="product_price"required>
      </div>
      <input type="submit" class="btn btn-primary" name="insertproduct" value="Insert">
    </div>
  </form>
  <?php
  if (isset($_POST['insertproduct'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_priceog=$_POST['product_priceog'];
    $product_price = $_POST['product_price'];
    $img = $_FILES['img']['name'];

    $i = $_FILES['img']['tmp_name'];
      move_uploaded_file($i, "product_images/$img");

      $insert_query = "INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `img`, `product_priceog`, `product_price`) VALUES (NULL, '$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$img', '$product_priceog', '$product_price');";
      if (mysqli_query($con,$insert_query)) {
        echo "<script>alert('Product inserted')</script>";
      }
    }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>