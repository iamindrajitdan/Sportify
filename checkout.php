<!-- Including -->
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
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Sportify
      </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="login.php">Log in</a></li>
              <li><a class="dropdown-item" href="signup.php">Sign up</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="" target="_blank">Admin</a></li>
              <li><a class="dropdown-item" href="contact.php" target="_blank">Contact us</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" action="search.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input class="btn btn-outline-danger" type="submit" value="Search" name="search_product">
        </form>
      </div>
    </div>
  </nav>
  <footer>
    <?php
    include('footer.php');
    ?>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>