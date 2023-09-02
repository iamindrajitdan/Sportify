<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Sportify
      </a>
      <button type="button" class="btn btn-outline-dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
        </svg>
      </button>
      <button type="button" class="btn btn-outline-dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
          <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
        </svg>
      </button>
    </div>
  </nav>
  <div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
          Manage Details
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
        <div class="accordion-body">
          <ul class="list-group">
            <<a href="viewproducts.php" class="list-group-item list-group-item-action">
              View Products
              </a>
              <a href="viewcategories.php" class="list-group-item list-group-item-action">View Categories</a>
              <a href="viewbrands.php" class="list-group-item list-group-item-action">View Brands</a>
              <a href="index.php?insertproduct" class="list-group-item list-group-item-action">Insert Product</a>
              <a href="index.php?insertcategory" class="list-group-item list-group-item-action">Insert Category</a>
              <a href="index.php?insertbrand" class="list-group-item list-group-item-action">Insert Brand</a>
              <a href="index.php?insertbanner" class="list-group-item list-group-item-action">Insert Banner</a>
              <a href="allorders.php" class="list-group-item list-group-item-action">All Orders</a>
              <a href="allpayments.php" class="list-group-item list-group-item-action">All Payments</a>
              <a href="listusers.php" class="list-group-item list-group-item-action">List Users</a>
          </ul>
        </div>
      </div>
    </div>
    <?php
    include('../includes/connect.php');
    ?>
    <div class="container my-5">
      <?php
      if (isset($_GET['insertcategory'])) {
        include('insertcategory.php');
      }
      if (isset($_GET['insertbrand'])) {
        include('insertbrand.php');
      }
      if (isset($_GET['insertproduct'])) {
        include('insertproduct.php');
      }
      if (isset($_GET['insertbanner'])) {
        include('insertbanner.php');
      }
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>