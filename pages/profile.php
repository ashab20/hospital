<?php 

require_once('../include/header.php');
require_once('../lib/Crud.php');


$mysqli = new Crud();

if(isset($_SESSION) && !($_SESSION['userdata']['roles']== 'SUPERADMIN') ){
    echo "<script> location.replace('$baseurl/dashboard/')</script>";
}





if(isset($_SESSION['avatar'])){
  $msg = $_SESSION['avatar'];
}

// if(isset($_GET['id']) && strlen($_GET['doctorid']) > 0){
//   $doctor_Id = $_GET['doctorid'];
  
//   $doctorProfile = $mysqli->select_single("SELECT * FROM doctor Where id=$doctor_Id");
//   $doctor = $doctorProfile['userdata'];
  
// }


?>
    <div class="container-scroller">
    
      <!-- partial:./navbar.php -->
      <?php
        require_once('../include/navbar.php');
      ?>
      <!--  partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:include/sidebar.php -->
        <?php 
        require_once('../include/sidebar.php') 
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
        
   
<?php

// ! *** USER'S PROFILE***

if(isset($_GET['id']) && strlen($_GET['id']) > 0){ 
  $user_Id = $_GET['id'];
  $selectUser = $mysqli->select_single("SELECT * FROM user Where id=$user_Id");
  $profile = $selectUser['singledata'];
?>     
        <!-- start profile -->

    <div class="wrapper bg-white py-5">

        <div class="row  mx-5">
            <div class="col-md-6">
                <h4 for="text-muted">Account settings</h4>
            </div>
            <div class="col-md-6 pt-md-0 pt-3 d-flex justify-content-end">
                <a class="btn btn-gradient-primar"  
                href="<?= $baseurl ?>/form/updateuser.php?id=<?=$user_Id?>">Edit Profile</a>
            </div>
        </div>

    <!-- show profile -->




    <!-- edit -->
    <div class="d-flex align-items-start py-3 border-bottom justify-content-start mb-2 ">
      <?php if($usr['avatar']!== null){ ?>
        <img src="../assets/images/avatar/<?= $usr['avatar'] ?>" class="img rounded-circle mx-5" alt="" width="100px"/>
        <?php }else{  ?>
          <img src="../assets/images/faces-clipart/pic-4.png" class="img rounded-circle mx-5" alt="" width="100px"/>
            <?php } ?>
            <div>
                <h4><?=$selectUser['singledata']['name'] ?></h4>
                <p class="text-muted"><?=$selectUser['singledata']['address']?></p>
                <button class="btn btn-sm btn-outline-dark" id="changeProfile">
                    Change Profile Picture
                </button>
                <button class="btn btn-sm btn-outline-dark d-none" id="closeFileUp">
                    Chancel
                </button>

                
                <!-- image uploads -->
                <div class="my-4 d-none" id="fileUp">
                <form class="pl-sm-4 pl-2" method="POST" action="<?= $baseurl ?>/form/action.php" enctype="multipart/form-data" id="img-section">
                    <input type="file" name="avatar" class="btn-sm button border">
                    <button type="submit" name="images_upload" class="btn  button border">
                        Upload
                    </button>
                </form>
                <?php 
                echo $msg;
                
                ?>
                </div>
            </div>

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

<!-- form to div converted -->
    <div class="pt-3 justify-content-center items-center">
      <div class="form-row ">
        <input type="text" value="<?=$user_Id?>" hidden>
        <?php  if(isset($_SESSION) && ($_SESSION['userdata']['roles']== 'SUPERADMIN') ){?>
      <div class="row d-flex input-group py-2 justify-content-center">
        <div class=" col-md-4 d-flex">
        <span class="input-group-text">Roles:</span>
            <input type="text" readonly value="<?=$profile['roles']?>" class="form-control form-control bg-white" id="phone" >
          </div>
        <div class="col-md-4 d-flex">
        <span class="input-group-text">Status:</span>
          <input type="text" readonly value="<?=$profile['status']== 0 ? 'DEACTIVE' : 'ACTIVE'?>" class="form-control bg-white form-control" id="phone">
        </div>
      </div>
      <?php } ?> 
        <div class="row d-flex input-group py-2 justify-content-center">
          <div class=" col-md-4 d-flex">
            <span class="input-group-text">Email</span>
            <input type="text" value="<?=$profile['email']?>" readonly class="form-control bg-white">
          </div>
          <div class=" col-md-4 d-flex">
            <span class="input-group-text">Phone:</span>
            <input type="text" value="<?=$profile['phone']?>" class="form-control bg-white">
          </div>
        </div>  
          
        <div class="row d-flex input-group py-2 justify-content-center">
          <div class=" col-md-4 d-flex">
            <span class="input-group-text">Address:</span>
            <input type="text" value="<?=$profile['address']?>" readonly class="form-control bg-white">
          </div>
          <div class=" col-md-4 d-flex">
            <span class="input-group-text">City:</span>
            <input type="text"  class="form-control">
          </div>
        </div> 
        <div class="row d-flex input-group py-2 justify-content-center">
          <div class=" col-md-4 d-flex">
            <span class="input-group-text">State:</span>
            <input type="text" value="<?=$profile['address']?>" readonly class="form-control bg-white">
          </div>
          <div class=" col-md-4 d-flex">
            <span class="input-group-text">Zip:</span>
            <input type="text"  class="form-control">
          </div>
        </div> 
      
      </div>
      <div class="d-flex justify-content-center ">
        <button type="submit" class="btn btn-outline-dark my-4"  name="deactive">Deactive Account</button>
    </div>
  </div>
  <?php
      if($profile['roles']== 'DOCTOR'){
        $selectdoctor = $mysqli->select_single("SELECT * FROM doctor Where user_id=$user_Id");
        if($selectdoctor['numrows'] > 0){ ?>
        <div class="pt-3 justify-content-center items-center">

          <div class="row">
            
            <div class="wrapper mx-5">

      <div class="d-flex justify-content-between my-4 m-2">
        <h4>Doctor's Information</h4>
        <span >
          <i class=" mdi mdi-chevron-down" style="cursor:pointer"></i>
        </span>
        <div class="col-md-6 pt-md-0 pt-3 d-flex justify-content-end">
                <a class="btn btn-gradient-primar"  
                href="<?= $baseurl ?>/form/updatedoctor.php?doctorid=<?=$user_Id?>">Edit Profile</a>
            </div>
      </div>
    </div><hr class="mx-5">
  </div>
  </div>
  


  <?php }}?>



    </div>
        <!-- end profile -->

<!-- Patient Profile -->
      
<?php 
}
// ! PATIENT's Profile

if(isset($_GET['patientid']) && strlen($_GET['patientid']) > 0){
  $patient_Id = $_GET['patientid'];
  
  $patientProfile = $mysqli->select_single("SELECT * FROM patient Where id=$patient_Id");
  $patient = $patientProfile['singledata'];
  ?>
  <div class="row">
    <div class="wrapper bg-white p-5">
    <div class="col-md-12">
      <div class="d-flex justify-content-between my-4">
        <h4>Patient Information</h4>
        <span >
          <i class=" mdi mdi-chevron-down" style="cursor:pointer"></i>
        </span>
      </div>
      <hr>
      <div class="row">
      <div class="col-md-4 text-center">
      <?php 
      // if($usr['avatar']!== null){ 
        ?>
        <!-- <img src="../assets/images/avatar/<?= $usr['avatar'] ?>" class="img rounded-circle mx-5" alt="" width="100px"/> -->
        <?php 
      // }else{
          ?>
          <!-- <img src="../assets/images/faces-clipart/pic-4.png" class="img rounded-circle mx-5" alt="" width="100px"/>
            <?php 
          // } 
          ?>
          <h3 class="m-2"><?= $patient['name']?></h3>  
      </div>
      <div class="col-md-8">
        <div class="row d-flex input-group py-2">
          <div class=" col-md-6 d-flex">
            <span class="input-group-text">Name</span>
            <input type="text" value="<?= $patient['name']?>" readonly class="form-control bg-white">
          </div>
          <div class=" col-md-6 d-flex">
            <span class="input-group-text">Address:</span>
            <input type="text" value="<?= $patient['address']?>" class="form-control">
          </div>
        </div>          
        <div class="row d-flex input-group py-2">
          <div class=" col-md-6 d-flex">
            <span class="input-group-text">Weight:</span>
            <input type="text" value="<?= $patient['weight']?>" class="form-control">
          </div>
          <div class=" col-md-6 d-flex">
            <span class="input-group-text">Contact</span>
            <input type="text" value="<?= $patient['phone']?>" readonly class="form-control bg-white">
          </div>
        </div>          
        <div class="row d-flex input-group py-2">
          <div class=" col-md-6 d-flex">
            <span class="input-group-text">Age</span>
            <input type="text" value="<?= $patient['age']?>" readonly class="form-control bg-white">
          </div>
        </div>          
      </div>
      </div>
    </div>
   
    <div class="col-md-12 d-flex justify-content-between">
    <h4>Medical History</h4>
    <span>
        <i class=" mdi mdi-chevron-down pointer" style="cursor:pointer"></i>
      </span>
    </div><hr>
    
    </div>  
  </div>



<?php  } ?>


    </div>
          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>