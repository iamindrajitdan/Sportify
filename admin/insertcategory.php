<form class="row row-cols-lg-auto g-3 align-items-center" action="" method="POST">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Insert Category</label>
    <div class="input-group">
       <div class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-arrow-up-fill" viewBox="0 0 16 16">
          <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM7.5 6.707 6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707z"/>
        </svg>
       </div>
      <input type="text" class="form-control" name="insertcategorytitle" id="inlineFormInputGroupUsername" placeholder="Insert Category">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="insertcat">Insert</button>
</form> 
<?php
include('../includes/connect.php');
if(isset ($_POST['insertcat'])){
  $category_title=$_POST['insertcategorytitle'];
  $select_query="SELECT * FROM `categories` where category_title='$category_title'";
  $result=mysqli_query($con,$select_query);
  $num=mysqli_num_rows($result);
  if($num>0){
    echo "<script>alert('Category already present')</script>";
  }
  else{
  $insert_query="INSERT INTO `categories` (`category_id`, `category_title`) VALUES (NULL, '$category_title');";
  if(mysqli_query($con,$insert_query)){
    echo "<script>alert('Category inserted')</script>";
  }
  }
}
?>