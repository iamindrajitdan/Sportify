<form class="row row-cols-lg-auto g-3 align-items-center"method="POST">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Insert Brand</label>
    <div class="input-group">
       <div class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-arrow-up-fill" viewBox="0 0 16 16">
          <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM7.5 6.707 6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707z"/>
        </svg>
       </div>
      <input type="text" class="form-control" name="insertbrandtitle" id="inlineFormInputGroupUsername" placeholder="Insert Brand">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="insertb">Insert</button>
</form> 
<?php
include('../includes/connect.php');
if(isset ($_POST['insertb'])){
  $brand_title=$_POST['insertbrandtitle'];
  $select_query="SELECT * FROM `brands` where brand_title='$brand_title'";
  $result=mysqli_query($con,$select_query);
  $num=mysqli_num_rows($result);
  if($num>0){
    echo "<script>alert('Brand already present')</script>";
  }
  else{
  $insert_query="INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES (NULL, '$brand_title');";
  if(mysqli_query($con,$insert_query)){
    echo "<script>alert('Brand inserted')</script>";}
  }
}
?>