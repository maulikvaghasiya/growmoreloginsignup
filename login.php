<?php

include 'partial/header.php';
$login = false;
$showError = false;
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'partial/db_connect.php';
    $mobile_no = $_POST['mobile_no'];
    $password = $_POST['password'];

    $sql = "Select * from user where mobile_number ='$mobile_no' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        $login = true;
        header("location:index.php");
    }else{
        $showError = "Invalid Credentials";
    }
}
?>
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
<section id="hero">
    <div class="container mt-5">
      
    <form class="row g-3" method="POST">
  
  <div class="col-lg-12">
    <label for="mobile number" class="form-label text-white">Mobile No.</label>
    <input type="number" name="mobile_no" class="form-control" id="mobile number">
  </div>

  <div class="col-lg-12">
    <label for="inputPassword4" class="form-label text-white">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword4">
  </div>
  
  <div class="col-12 mt-3">
    <button type="submit" class="btn btn-light">login</button>
  </div>
</form>   </div>
</section><!-- End Hero -->
 

