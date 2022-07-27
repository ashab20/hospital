<?php 
require_once('../lib/Crud.php'); 

$mysqli = new Crud();

if(isset($_SESSION) && !($_SESSION['userdata']['roles']== 'SUPERADMIN') ){
    echo "<script> location.replace('$baseurl/dashboard/')</script>";
}

$user_Id = $_GET['id'];

$selectUser = $mysqli->select_single("SELECT * FROM user Where id=$user_Id");




require_once('../include/header.php'); 
?>

<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">

      <div class="container-fluid">
    
    <!-- partial:./navbar.php -->
    <?php
      require_once('../include/navbar.php');
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:include/sidebar.php -->
      <?php require_once('../include/sidebar.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

        <div class="d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-12 mx-auto">

<!-- ADD Profile name -->

<div class="wrapper bg-white py-5">

<div class="row  mx-5">
    <div class="col-md-6">
        <h4 for="text-muted">Change Password</h4>
    </div>
    <div class="col-md-6 pt-md-0 pt-3 d-flex justify-content-end">
        <a class="btn btn-gradient-primar"  
        href="<?= $baseurl ?>/pages/profile.php?id=<?= $selectUser['singledata']['id']?>">Back to Profile</a>
    </div>
</div>

<!-- edit -->
<div class="d-flex align-items-start py-3 border-bottom justify-content-start">


<script>
let $changeProfile = $("#changeProfile");
let $closeFileUp = $("#closeFileUp");
let $fileUp = $("#fileUp");

$changeProfile.click(function(){
$closeFileUp.toggleClass('d-none');
$changeProfile.toggleClass('d-none');
$fileUp.toggleClass('d-none');
});
$closeFileUp.click(function(){
$closeFileUp.toggleClass('d-none');
$changeProfile.toggleClass('d-none');
$fileUp.toggleClass('d-none');
});



</script>


</div>
</div>


<!-- profile end -->

              <div class="auth-form-light text-left p-5">
              

<?php 
   if(isset($_SESSION['msg'])){
   echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  }
  ?>




<form class=" justify-content-center items-center" method="POST" action="<?= $baseurl?>/form/action.php">
<input type="text" name="id" hidden value="<?= $usr["id"]?>">
  <div class="form-row col-md-8 offset-4 jsutify-content-center">
    <div class="form-group col-md-6 mx-2">
      <label for="password">Old Password:</label>
      <input type="password" name="oldpassword" class="form-control"  required placeholder="password">
    </div>
    <div class="form-group col-md-6  mx-2">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control" id="password" required placeholder="password">
    </div>
    <div class="form-group col-md-6 mx-2">
      <label for="cpassword">Confirm Password:</label>
      <input type="password" onchange="mathedPassword()" name="cpassword"  required class="form-control" id="cpassword" placeholder=" Confirm password">
      <small id="passErr" class="form-text text-danger"></small>
    </div>
   
  </div>
  <div class="d-flex justify-content-center mt-4">
    <button type="submit" class="btn btn-primary"  name="changePassword">Change Password</button>
  </div>
</form>

<script>
  function mathedPassword(){

    let password = document.getElementById('password').value;
    let cpassword = document.getElementById('cpassword').value;
    if(password!== cpassword){
      document.getElementById('passErr').innerText="Password is not mathed";
    }
    
  }
</script>
</div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->


      </div>
      <!-- page-body-wrapper ends -->
    <?php require_once("../include/footer.php"); ?>