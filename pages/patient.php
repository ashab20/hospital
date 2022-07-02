<?php 
require_once('../lib/Crud.php'); 
require_once('../include/header.php');


// if(!$_SESSION["userdata"]){
//   echo "<script> location.replace('$baseurl/dashboard/')</script>";
// }


if($usr){
switch ($usr['roles']) {
  case 'DOCTOR':
    header("location:$baseurl/dashboard/");
    break;
  case 'EMPLOYEE':
    header("location:$baseurl/dashboard/");
    break;
  }
}else{
  header("location:$baseurl/pages/login.php");
}




$mysqli = new Crud();

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



<!-- ***************************************************************** -->

            <!-- page header start -->
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Patient 
             
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
              
            </div>

<?php

if(isset($_GET['phn']) && strlen($_GET['phn']) > 0){
$phone = $_GET['phn'];
$patientSingleData = $mysqli->select_single("SELECT id,name,phone,age,gender from patient where phone='$phone'");

if($patientSingleData['numrows']== 0){
 $msg="<p style='color:red'>NO Patient registered with this phone number.</p>";
 // echo "<script> location.replace('$baseurl/pages/login.php')</script>";
}

}
?>

<?php if((isset($_GET['ptn'] ) && strlen($_GET['ptn'])) < 1){ ?>
         <!-- ********************************
            SEARCH PATIENT
    *********************************-->
    <div class="row mb-0" id="addPatient">
              <div class="col-12 ">
                <div class="card w-100 mx-auto">
                
                    <div class="row card-body justify-content-center" id="addBtn">
                      <h1>
                        <?php
                        
                          if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                          }
                        
                      ?>
                      </h1>
                      
                        <div class="card bg-gradient-primary" style="width: 15rem;">
                            <button class=" btn btn-sm font-weight-normal text-white" id="addPatientBtn" ><i class="mdi mdi-alarm-plus   float-right"></i> Add New Patient 
                            </button>
                        </div>
                    </div> 
            
                  <div class="col-12" id="or">
                    <div class="row justify-content-center text-muted">
                        OR                   
                  </div>
                </div>
                <div class="row card-body justify-content-center d-block" id="searchPatient">
                  <form class="form-inline d-flex w-80 col-8 offset-2" method="GET" name="search_patient">
                    <input class="form-control mr-sm-2 fload-right" id="inputSearch" type="search" name="phn" placeholder="Search by phone" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="inputSubmit"  disabled type="submit">Search</button>
                  </form>

                  <script>
                  $('#inputSubmit').attr('disabled','disabled');
                    $('#inputSearch').change(function(){
                        if($(this).val != ''){
                            $('#inputSubmit').removeAttr('disabled');
                        }
                    });
                  </script>
                </div>
                    <div class="col-8 offset-2 my-4">
                                <?php
                                if(isset($patientSingleData['singledata']) && $patientSingleData['msg'] === 'No data found'){ ?>
                                  <p class="mt-5 text-center h2 text-danger justify-content-center mx-auto">Data not found</p>
                                  <?php } ?>
                          
                                <?php
                              if(isset($patientSingleData['singledata']) && $patientSingleData['msg']==='data found'){ ?>
                                <table class="table table-bordered">
                                  <thead>
                                    <th><label for="">Name</label></th>
                                    <th><label for="">Phone</label></th>
                                    <th><label for="">Gender</label></th>
                                    <th><label for="">Age</label></th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th><?=$patientSingleData['singledata']['name'] ?></th>
                                      <th><?=$patientSingleData['singledata']['phone'] ?></th>
                                      <th><?=$patientSingleData['singledata']['gender'] ?></th>
                                      <th><?=$patientSingleData['singledata']['age'] ?></th>
                                    </tr>
                                  </tbody>

                                </table>

                                <!-- *** NEXT SECTION *** -->

                                <div class="row mt-5">
                          <div class="col-md-4">
                            <div class="card">
                            
                                <button class=" btn btn-sm btn-outline-dark font-weight-normal mb-3" id="appointmentBtn"><i class="mdi mdi-alarm-plus   float-right"></i> Appointment 
                                </button>
                            
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card">
                            
                                <button class=" btn btn-sm btn-outline-dark font-weight-normal mb-3" id="testBtn"><i class=" mdi mdi-amplifier  float-right"></i> Test 
                                </button>
                            
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card">
                            
                                <button class=" btn btn-sm btn-outline-dark font-weight-normal mb-3" id="admitBtn"><i class="mdi mdi-ambulance  float-right"></i> Admit 
                                </button>
                            
                            </div>
                          </div>
                      </div>


                                <!-- NEXT SECTION END -->
                              <?php }?>
                    </div>
                  

                </div>
              </div>
      </div>

        

<!-- ********************************
            ADD PATIENT 
    *********************************-->

<div class="row mt-5 d-none" id="addPatientForm">
    <div class="col-12 ">
        <div class="card w-100 mx-auto">
                    <p class="cursor-pointer  closebtn" id="closebtn"> <i class="mdi mdi-close-circle-outline text-danger "> </i></p>
                    <div class="row justify-content-center  d-flex mx-auto">
                        <h2 class="text-bold text-muted mt-2">Add Patient</h2>
                          </div>
                          <div class="row card-body justify-content-center">
      <form class="pt-3 justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
        <div class="form-row d-flex">
          <div class="form-group col-md-6 mx-2">
            <label for="name">Name:</label>
            <input type="text" name="name" required class="form-control" id="name" placeholder="Name">
          </div>
          <div class="form-group col-md-6 mx-2">
            <label for="phone">Phone:</label>
            <input type="text" minlength="11" maxlength="11" name="phone" required class="form-control" id="phone" placeholder="phone">
          </div>
        </div>

        <div class="form-row d-flex">
        <div class="form-group col-md-4 mx-2">
            <label for="gender">Gender:</label>
            <select id="gender"  name="gender" class="form-control">
              <option selected>Gender...</option>
              <option value="male">Male</option>
              <option value="female">female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group col-md-3 mx-2">
            <label for="age">Age:</label>
            <input type="text" name="age"  class="form-control" id="age" placeholder="eg 35">
          </div>
          <div class="form-group col-md-4 mx-2">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="address">
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary"  name="addPatient">Add Patient</button>
        </div>
      </form>
      </div>
      </div>
  </div>
</div>

<!-- ADD PATIENT END -->


<!-- Conditional -->
<?php 
// ! CONDITION START @:SINGLE DATA
if(isset($patientSingleData['singledata']) && $patientSingleData['msg']==='data found'){ ?>
  
  
<!-- *** APPOINTMENT start -->
<div class="row mt-1 d-none" id="appointment">
    <div class="col-12 ">
        <div class="card w-100 mx-auto">
          <p class="closebtn" id="closebtn"> 
            <i 
            class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
            onclick="$('#appointment').toggleClass('d-none');appointmentBtn.toggleClass('btn-dark');">
           </i>
          </p>
  
  <div class="row card-body justify-content-center">

      <!-- ***** -->
      <?php
          $departmentData =$mysqli->selector('department','*');
          $department = $departmentData['selectdata'];
          if($departmentData['error']){
            $_SESSION['msg']=$departmentData['msg'];
            echo "error";
          }
          $doctorData =$mysqli->find("SELECT name,id FROM user WHERE roles='DOCTOR'");
          $doctors = $doctorData['singledata'];

          
      ?>

      <!-- **** -->

          <form class=" justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
          <input type="text" hidden name="patient_id" value="<?= $patientSingleData['singledata']['id'] ?>">
          <input type="text" hidden name="name" value="<?= $patientSingleData['singledata']['name'] ?>">
          <input type="text" hidden name="phone" value="<?= $patientSingleData['singledata']['phone'] ?>">
          <input type="text" hidden name="created_by" value="<?= $usr['id'] ?>">
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-md-2 mx-2">
              <label for="gender">Department:</label>
                <select id="department"  name="department_id" class="form-select" onchange="get_doctor(this.value)">
                  <option value="">Department...</option>
              <?php foreach ($department as $dept){?>
                  <option value="<?=$dept['id'] ?>"><?= $dept['name']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-2 mx-2">
              <label for="depdoctor">Doctor:</label>
                <select id="depdoctor" onchange="get_time(this.value)" name="doctor_id" class="form-select">
                  <option value="">Doctor...</option>
                </select>
              </div>
              <div class="form-group col-md-2 mx-2">
                <label for="date">Date:</label>
                <input type="date"  name="date" min="<?=date('Y-m-d') ?>" required class="form-select p-1">
              </div>
              <div class="form-group col-md-2 mx-2">
              <label for="time">Time:</label>
              <select name="time" id="time" class="form-select">
                <option value="">Time..</option>
              </select>
              </div>

            </div>
            <div class="form-row d-flex justify-content-center">
            </div>
            <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-9 mx-2">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                          </div>
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary"  name="appt">Make Appointment</button>
            </div>
          </form>

          </div>
        </div>
    </div>
</div>
<!-- APPOINTMENT END -->

<!-- ********************************
            @:TEST 
*********************************-->

<div class="row mt-1 d-none" id="test">
    <div class="col-12 ">
        <div class="card w-100 mx-auto">
          <p class="closebtn"> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                    onclick="$('#test').toggleClass('d-none');$testBtn.toggleClass('btn-dark');"> </i></p>
           <div class="row card-body justify-content-center">
              <!-- ***** -->
      <?php
          $rateData =$mysqli->selector('rate','*');
          $rate = $rateData['selectdata'];
          if($rateData['error']){
            $_SESSION['msg']=$rate['msg'];
          }
          
      ?>

      <!-- **** -->
           
           <form class=" justify-content-center items-center text-center" method="POST" action="<?=$baseurl?>/form/action.php">
            <input type="number" name="patient_id" value="<?= $patientSingleData['singledata']['id'] ?>" hidden>
                <div class="form-row d-flex justify-content-center">
                  <div class="form-group col-md-2 mx-2">
                    <label for="name">Test Name:</label>
                    <select id="test_name" onchange="get_rate(this.value);" name="test_name" class="form-select">
                      <option selected>Select test...</option>
                      <?php
                      foreach($rate as $r){ ?>
                      <option value="<?=$r['id'] ?>"><?=$r['service_name']?> : <?=$r['rate']?>tk</option>
                      <?php } ?>
                </select>
              </div>
            
            <!-- by admin and lebretary -->
                <div class="form-group col-md-2 mx-2">
                  <label for="gender">Price:</label>
                  <input type="text" class="form-control" name="delivary"/>
                </div>            
                <div class="form-group col-md-2 mx-2">
                  <label for="address">Reference_By:</label>
                  <input type="text" name="reference_by" class="form-control" id="address" placeholder="name...">
                </div>
                <div class="form-group col-md-2 mx-2">
                  <button class="btn form-control  mt-4" type="button">
                  <i class="mdi mdi-delete"></i>
                  </button>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary"  name="addTest">Add Test</button>
              </div>
            </form>
            </div>
            <!-- action="<?=$baseurl?>/form/action.php" -->

        </div>
    </div>
</div>

<!-- *** TEST END*** -->

<!-- ********************************
           @:ADMIT 
*********************************-->

<div class="row mt-1 d-none" id="admit">
    <div class="col-12 ">
        <div class="card w-100 mx-auto">
                    <p class="closebtn" id=""> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                    onclick="$('#admit').toggleClass('d-none');
  admitBtn.toggleClass('btn-dark');"> </i></p>
                    <div class="row card-body justify-content-center">
        <form class=" justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
            <div class="form-row d-flex">
              <div class="form-group col-md-6 mx-2">
                <label for="name">Name:</label>
                <input type="text" name="name" required class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group col-md-6 mx-2">
                <label for="phone">Phone:</label>
                <input type="text" minlength="11" maxlength="11" name="phone" required class="form-control" id="phone" placeholder="phone">
              </div>
            </div>

            <div class="form-row d-flex">
            <div class="form-group col-md-4 mx-2">
                <label for="gender">Gender:</label>
                <select id="gender"  name="gender" class="form-control">
                  <option selected>Gender...</option>
                  <option value="male">Male</option>
                  <option value="female">female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group col-md-3 mx-2">
                <label for="age">Age:</label>
                <input type="text" name="age"  class="form-control" id="age" placeholder="eg 35">
              </div>
              <div class="form-group col-md-4 mx-2">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="address">
              </div>
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary"  name="addPatient">Admit Patient</button>
            </div>
            </form>
          </div>
        </div>
      </div>
</div>
<?php } ?>

<!-- *** ADMIT END*** -->

<?php
if(isset($patientSingleData['singledata'])){ ?>

<?php } ?>


<script>
    
    let $addPatient = $('#addPatient');
    let $addPatientBtn = $('#addPatientBtn');
    let $addPatientForm = $('#addPatientForm');
    let $appointmentBtn = $('#appointmentBtn');
    let $testBtn = $('#testBtn');
    let $admitBtn = $('#admitBtn');
    let $closebtn = $('#closebtn');

	$addPatientBtn.click(function(){
	   $('#addPatient').addClass('d-none');
	   $('#addPatientForm').removeClass('d-none');
	});

	$closebtn.click(function(){
		$('#addPatientForm').addClass('d-none');
		$addPatient.removeClass('d-none');
	});
	$appointmentBtn.click(function(){
	  $('#appointment').toggleClass('d-none');
	  $appointmentBtn.toggleClass('btn-dark');
	  $('#searchPatient').addClass('d-none');
	  $('#or').addClass('d-none');
	  $('#addBtn').addClass('d-none');
	  $('#created_at').addClass('d-none');

	  // $('#test').addClass('d-none');
	  // $testBtn.addClass('btn-outline-dark');
	  // $('#admit').addClass('d-none');
	  // $admitBtn.addClass('btn-outline-dark');

	})
	$testBtn.click(function(){
	  $('#test').toggleClass('d-none');
	  $testBtn.toggleClass('btn-dark');
	})
	$admitBtn.click(function(){
	  $('#admit').toggleClass('d-none');
	  $admitBtn.toggleClass('btn-dark');
	})
	
	function get_doctor(dep){
		$.ajax({
            url: '../form/data.php?department='+dep,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                $('#depdoctor').html(JSON.stringify(data));
            },error: function(xhr, status, errorMessage) {
			}
        });
	}

	function get_time(shift){
		$.ajax({
            url: '../form/data.php?time='+shift,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                $('#time').html(JSON.stringify(data));
            },error: function(xhr, status, errorMessage) {
			}
        });
	}
	function get_rate(rate){
		$.ajax({
            url: '../form/data.php?time='+rate,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                $('#time').html(JSON.stringify(data));
            },error: function(xhr, status, errorMessage) {
			}
        });
	}

</script>


<?php
// ! CONDITION END @:ADD PATIENT

  $id = $usr['id'];
// ! *** PATIENT ADDED BY THIS ADMIN ***

$thisAdminData =$mysqli->find("SELECT * FROM patient WHERE created_by=$id or modified_by=$id order by id DESC");
$createdBy = $thisAdminData['singledata'];


if($thisAdminData['numrows'] > 0 && $createdBy){
  
  ?>

     <div class="row mt-5" id="created_at">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h4 class="card-title">Created By You</h4>
                      <div class="search d-flex">
                          <i class="mdi mdi-person-star"></i>
                          <input type="text" class="form-control" placeholder="Search by name">
                        </div>
                        <a href="<?=$baseurl ?>/dashboard/patient.php" class="btn btn-secondary text-white font-weight-bold text-decoration-none">
                          See All Patient
                        </a>
                    </div>
                    <div class="table-responsive mt-3">
                      <!-- ! *** TABLE FROM DATABASE *** -->
                      <table class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> Name</th>
                            <th> Phone </th>
                            <th> Address </th>
                            <th> Created At </th>
                            <th colspan="2"> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach ($createdBy as $admin){?>
                          <tr>
                            <td><?= $admin['id'] ?></td>
                            <td>
                                <img src="../assets/images/faces/face3.jpg" class="me-2" alt="image">
                                <a class="btn" href="<?=$baseurl ?>/pages/profile.php?patientid=<?= $admin['id'] ?>">
                                  <?= $admin['name']?>
                                </a> 
                            </td>
                            <td><?= $admin['phone']?></td>
                            <td><?= $admin['address']?></td>
                            <td>
                              <?= $admin['created_at']?>
                            </td>
                            <td>
                              <a href="<?= $baseurl ?>/form/form/editpatient.php?id=<?= $admin['id'] ?>" class="btn-sm btn-primary text-decoration-none m-1">
                              <i class="mdi mdi-border-color"></i>
                            </a>
                              <a href="<?= $baseurl ?>/form/deleteuser.php?id=<?= $admin['id'] ?>" class="btn-sm btn-danger text-decoration-none" onclick="confirm('Are you sure?')">
                              <i class="mdi mdi-delete"></i>
                              </a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <?php 
}}
 ?>  


<!-- *** END THIS ADMIN*** -->

          </div>

          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>
 