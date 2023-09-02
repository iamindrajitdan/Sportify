<!-- connecting to database -->
<?php
$con= mysqli_connect("localhost","root","","sportify");
if(!$con){
    die("Sorry we fail to connect:".mysqli_connect_error());
}
?>