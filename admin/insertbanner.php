<?php
include('../includes/connect.php');
?>
<form method="POST" enctype="multipart/form-data">
    <div class="container mb-4 w-50 m-auto">
      <h3 style="text-align: center;">Insert Banner</h3>

      <div class="mb-3">
        <label for="formFile" class="form-label">Banner image</label>
        <input class="form-control" type="file" id="formFile" name="img" required>
      </div>
      <input type="submit" class="btn btn-primary" name="insertbanner" value="Insert">
    </div>
  </form>
<?php
if (isset($_POST['insertbanner'])) {
    $img = $_FILES['img']['name'];

    $i = $_FILES['img']['tmp_name'];
    move_uploaded_file($i, "banners/$img");

    $insert_query = "INSERT INTO `banners` (`banner_id`,`img`) VALUES (NULL,'$img');";
    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Banner inserted')</script>";
    }
}
?>