<?php
if(isset($_GET['appopintment']) && strlen($_GET['appoimtment']) > 0){

}
?>


<?php 
require_once('../lib/Crud.php'); 
require_once('../include/header.php');

// if(!$_SESSION["userdata"]){
//   echo "<script> location.replace('$baseurl/dashboard/')</script>";
// }

if($usr['roles'] !== 'SUPERADMIN' ){
  header("location:$baseurl/pages/login.php");
}

?>
    <div class="container-scroller">
    
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


<?php
$mysqli = new Crud();
$data = $mysqli->selector('user','*');
$superadmin = $mysqli->counter("user","roles='SUPERADMIN'");
$admin = $mysqli->counter("user","roles='ADMIN'");
$doctor = $mysqli->counter("user","roles='DOCTOR'");
$employee = $mysqli->counter("user","roles='EMPLOYEE'");
// $admin = $mysqli->selector("user","COUNT(roles='ADMIN')");

$user = $data['selectdata'];
if($data['error']){
  $_SESSION['msg']=$data['msg'];
  echo "error";
}



?>


            <!-- page header start -->
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card" style="background-color:#fcffd6;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h4 class="card-title">Patient Portal</h4>                        
                    </div>
                    <div class="mt-3 d-">
                        <ul class="list-group">
                            <div class="row">
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Patientid:</label>
                                    &nbsp;  <strong>PA34234524</strong>
                                </li>
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Name:</label>
                                    &nbsp; <strong>Ashab Uddin</strong>
                                </li>
                                
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Age:</label>
                                    &nbsp; <strong>35</strong>
                                </li>
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Gender:</label>
                                    &nbsp;  <strong>Male</strong>
                                </li>
                            </div>
                        </ul>                      
                    </div>
                    <div>
                        <span class="text-center items-center mx-4">
                            <h3 class="text-muted">Appointment Details</h3>
                        </span>
                        <div>
                        <ul class="list-group">
                            <div class="row">
                                <li class="list-group-item col-md-6 itemList">
                                    <label for="">Doctor's Name:</label>
                                    &nbsp;  <strong>MR. Rabib Hasan</strong>
                                </li>
                                <li  class="list-group-item col-md-6 itemList">
                                    <label for="">Department:</label>
                                    &nbsp; <strong>Peadretix</strong>
                                </li>
                                
                                <li  class="list-group-item col-md-6 itemList">
                                    <label for="">Date:</label>
                                    &nbsp; <strong>16/06/2022</strong>
                                </li>
                                <li  class="list-group-item col-md-6 itemList">
                                    <label for="">Time:</label>
                                    &nbsp;  <strong>7:00PM</strong>
                                </li>
                                <li  class="list-group-item col-md-6 itemList">
                                    <label for="">Appointmentid:</label>
                                    &nbsp;  <strong>AP2332423</strong>
                                </li>
                                <li  class="list-group-item col-md-6 itemList">
                                    <label for="">Last Appointment Date:</label>
                                    &nbsp;  <strong>16/05/2022</strong>
                                </li>
                            </div>
                        </ul>  
                        </div>
                        <div class="float-end mt-5">
                            <button class="btn btn-sm btn-danger text-end">Cancel</button>
                            <button class="btn btn-sm btn-info text-end">Confirm?</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>
 