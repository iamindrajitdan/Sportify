  <!---------------
    All the Functions are here
  ----------------->
  
  <?php
  // Including 
  include('includes/connect.php');

  // Displaying all the products
  function get_products()
  {
    global $con;
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {

        $select_query = "SELECT * FROM `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_img = $row['img'];
          $product_priceog = $row['product_priceog'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col'>
      <div class='card'>
      <img src='./admin/product_images/$product_img' class='card-img-top' alt='$product_title''>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <h6 class='card-subtitle mb-2 text-body-secondary'><del>₹$product_priceog </del><strong> ₹$product_price</strong></h6>
        <p class='card-text'>$product_description</p><a href=''
            class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-currency-rupee' viewBox='0 0 16 16'>
            <path d='M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z' />
          </svg></a>
        <a href='index.php?cart=$product_id
            ' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
            <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z' />
            <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
          </svg></a>
      </div>
    </div>
    </div>";
        }
      }
    }
  }

  // Displaying all the products of the selected category
  function get_category_products()
  {
    global $con;
    if (isset($_GET['category'])) {
      $category_id = $_GET['category'];

      $select_query = "SELECT * FROM `products` where category_id=$category_id";
      $result_query = mysqli_query($con, $select_query);
      $num = mysqli_num_rows($result_query);
      if ($num == 0) {
        echo "<div class='alert alert-danger' role='alert' style='text-align: center;'>
        Currently Unavailable!
      </div>";
      }

      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_img = $row['img'];
        $product_priceog = $row['product_priceog'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col'>
      <div class='card'>
      <img src='./admin/product_images/$product_img' class='card-img-top' alt='$product_title''>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <h6 class='card-subtitle mb-2 text-body-secondary'><del>₹$product_priceog </del><strong> ₹$product_price</strong></h6>
        <p class='card-text'>$product_description</p><a href=''
            class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-currency-rupee' viewBox='0 0 16 16'>
            <path d='M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z' />
          </svg></a>
        <a href='index.php?cart=$product_id
            ' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
            <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z' />
            <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
          </svg></a>
      </div>
    </div>
    </div>";
      }
    }
  }

  // Displaying all the products of the selected brand
  function get_brand_products()
  {
    global $con;
    if (isset($_GET['brand'])) {
      $brand_id = $_GET['brand'];

      $select_query = "SELECT * FROM `products` where brand_id=$brand_id";
      $result_query = mysqli_query($con, $select_query);
      $num = mysqli_num_rows($result_query);
      if ($num == 0) {
        echo "<div class='alert alert-danger' role='alert' style='text-align: center;'>
        Currently Unavailable!
      </div>";
      }

      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_img = $row['img'];
        $product_priceog = $row['product_priceog'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col'>
        <div class='card'>
        <img src='./admin/product_images/$product_img' class='card-img-top' alt='$product_title''>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <h6 class='card-subtitle mb-2 text-body-secondary'><del>₹$product_priceog </del><strong> ₹$product_price</strong></h6>
          <p class='card-text'>$product_description</p><a href=''
              class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-currency-rupee' viewBox='0 0 16 16'>
              <path d='M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z' />
            </svg></a>
          <a href='index.php?cart=$product_id
              ' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z' />
              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
            </svg></a>
        </div>
      </div>
      </div>";
      }
    }
  }

  // Get products on the basis of search
  function search_products()
  {
    global $con;
    if (isset($_GET['search_product'])) {

      $search_data = $_GET['search_data'];
      $search_query = "SELECT * FROM `products` where product_keywords like '%$search_data%'";
      $result_query = mysqli_query($con, $search_query);
      $num = mysqli_num_rows($result_query);
      if ($num == 0) {
        echo "<div class='alert alert-danger' role='alert' style='text-align: center;'>
        Not Found!
      </div>";
      }
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_img = $row['img'];
        $product_priceog = $row['product_priceog'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col'>
      <div class='card'>
      <img src='./admin/product_images/$product_img' class='card-img-top' alt='$product_title''>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <h6 class='card-subtitle mb-2 text-body-secondary'><del>₹$product_priceog </del><strong> ₹$product_price</strong></h6>
        <p class='card-text'>$product_description</p><a href=''
            class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-currency-rupee' viewBox='0 0 16 16'>
            <path d='M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z' />
          </svg></a>
        <a href='index.php?cart=$product_id
            ' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
            <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z' />
            <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
          </svg></a>
      </div>
    </div>
    </div>";
      }
    }
  }

  // Fetching the banners from the banner 
  function get_banners()
  {
    global $con;
    $select_query = "SELECT * FROM `banners` order by rand()";
    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {

      $banner_img = $row['img'];

      echo "<div class='carousel-item active'>
          <img src='./admin/banners/$banner_img' class='d-block w-100' alt='Image'>
        </div>";
    }
  }

  // Getting the IP address of the Machine
  function getIPAddress()
  {
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
    // $ip = getIPAddress();
    // echo 'User Real IP Address - ' . $ip;
  }

  // Creating function for adding the products to the cart.
  function cart()
  {
    global $con;
    if (isset($_GET['cart'])) {
      $ip = getIPAddress();
      $cart = $_GET['cart'];
      $query = "SELECT *  FROM `cart` WHERE `product_id` = $cart AND `ip` = '$ip';";
      $result_query = mysqli_query($con, $query);
      if (mysqli_num_rows($result_query) > 0) {
        echo "<script>alert('Already Added')
        window.open('index.php','_self')
        </script";
      } else {
        $insert = "INSERT INTO `cart` (`product_id`,`ip`,`quantity`) VALUES('$cart','$ip','1');";
        if (mysqli_query($con, $insert)) {
          echo "<script>alert('Item Added')
          window.open('index.php','_self')</script";
        }
      }
    }
  }

  // This is the cart function this fetch the cart product in the cart page
  function cart_item()
  {
    global $con;
    if (isset($_GET['cart'])) {
      $ip = getIPAddress();
      $query = "SELECT *  FROM `cart` WHERE `ip` = '$ip';";
      $result_query = mysqli_query($con, $query);
      $num = mysqli_num_rows($result_query);
      echo "$num";
    } else {
      $ip = getIPAddress();
      $query = "SELECT *  FROM `cart` WHERE `ip` = '$ip';";
      $result_query = mysqli_query($con, $query);
      $num = mysqli_num_rows($result_query);
      echo "$num";
    }
  }

  // Calculating the Total price of the product in the cart
  function total()
  {
    global $con;
    $total=0;
    $ip=getIPAddress();
    $query="SELECT * FROM `cart` WHERE `ip` = '$ip';";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $product="SELECT * FROM `products` WHERE product_id='$product_id';";
      $r=mysqli_query($con,$product);
      while($row=mysqli_fetch_array($r)){
        $price=array($row['product_price']);
        $t=array_sum($price);
        $total+=$t;
      }
    }
    echo"$total";
  }

  ?>