<?php 
  require_once('../lib/Crud.php'); 
  require_once('../include/header.php'); 

  $mysqli = new Crud();

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
    <?php require_once('../include/sidebar.php'); ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <?php
          $mysqli = new Crud();
          $data = $mysqli->selector('user','*');
          $patient = $mysqli->counter("user","roles='PETANT'");
          $doctor = $mysqli->counter("user","roles='DOCTOR'");
          $employee = $mysqli->counter("user","roles='EMPLOYEE'");
          // $SUPERADMIN = $mysqli->selector("user","COUNT(roles='SUPERADMIN')");

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


        <!-- *** ADD CARD *** -->
        <div class="row card-body justify-content-center d-block" id="searchPatient">
          <div class="col-12">
            <!-- *** NEXT SECTION *** -->
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <button class=" btn btn-outline-dark font-weight-normal" id="departmentBtn" 
                  onclick="$('#departmentform').toggleClass('d-none')" type="button">
                  <i class="mdi mdi-alarm-plus float-right"></i> Department 
                  </button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                    <button class=" btn btn-outline-dark font-weight-normal" id="designationbtn"
                    onclick="$('#designationform').toggleClass('d-none')" type="button">
                      <i class=" mdi mdi-amplifier  float-right"></i> Designation 
                    </button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                    <button class=" btn btn-outline-dark font-weight-normal" id="roomBtn"
                    onclick="$('#roomform').toggleClass('d-none')" type="button">
                    <i class="mdi mdi-ambulance  float-right"></i> Rooms 
                    </button>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-4">
                <div class="card">
                  <button class=" btn btn-outline-dark font-weight-normal" id="serviceBtn"
                  onclick="$('#service_form').toggleClass('d-none')" type="button">
                    <i class="mdi mdi-alarm-plus   float-right"></i> Service 
                  </button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                    <button class=" btn btn-outline-dark font-weight-normal" id="rateBtn"
                    onclick="$('#rate_form').toggleClass('d-none')" type="button">
                      <i class=" mdi mdi-amplifier  float-right"></i> Rate 
                    </button>
                </div>
              </div>
              <!-- <div class="col-md-4">
                <div class="card">
                    <button class=" btn btn-outline-dark font-weight-normal" id="admitBtn"><i class="mdi mdi-ambulance  float-right"></i> Rooms 
                    </button>
                </div>
              </div> -->
            </div>
              <!-- NEXT SECTION END -->
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Session Department -->
          <?php 
            if(isset($_SESSION['dept'])){
              echo  $_SESSION['dept'];
              unset ($_SESSION['dept']);
            }
          ?>
          <?php 
            if(isset($_SESSION['degi'])){
              echo  $_SESSION['degi'];
              unset ($_SESSION['degi']);
            }
          ?>
          <?php 
            if(isset($_SESSION['room'])){
              echo  $_SESSION['room'];
              unset ($_SESSION['room']);
            }
          ?>
          <?php 
            if(isset($_SESSION['service'])){
              echo  $_SESSION['service'];
              unset ($_SESSION['service']);
            }
          ?>
          <?php 
            if(isset($_SESSION['rate'])){
              echo  $_SESSION['rate'];
              unset ($_SESSION['rate']);
            }
          ?>

          <!-- Department form -->
                
          <div class="col-md-5 grid-margin stretch-card d-none" id="departmentform">
            <div class="card">
              <p class="closebtn"> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                onclick="$('#departmentform').toggleClass('d-none')"> </i></p>
              
              <?php
                $dept_data=$mysqli->selector('department');
                $deptartment=$dept_data['selectdata'];
              
              
              ?>
              <!-- Department Data -->
              <h2 class=" text-dark text-center h2">Department</h2>
              <div class="row ">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-muted">Add Department</h4>
          
        
           
                      <form class="justify-content-center items-center" id="addDeptform" method="POST" action="<?= $baseurl ?>/form/action.php" >
                        <div class="form-row col-md-12 d-flex">  
                                        
                          <div class="form-group col-md-6 mx-2">
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Name">
                          </div>
                          <div class="form-group col-md-6 mx-2">                  
                            <input  minlength="11" type="submit" maxlength="11" name="dept_form" class="form-control" value="Add" >
                          </div>                    
                        </div>
                      </form>     


                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <?php
                          $class_name=false;
                          foreach($deptartment as $dpt){
                            if($dpt['status']==0){
                             $class_name ='completed';
                            }else{
                              $class_name= "";
                            }

                            ?>
                            
                       
                            <li class="<?= $class_name ?>">
                        <a href="<?= $baseurl ?>/form/editcategories.php?dprtId=<?= $dpt['id'] ?>"> 
                        <button class=" outline-none border-none btn-primary text-decoration-none m-1">
                              <i class="mdi mdi-border-color" ></i> </a>
                            </button>
                            <label class="form-check-label">
                          <?=  $dpt['name']; ?> 
                          </label>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                         <?php  }
                        ?>
                      </ul>
                      <script>
                          let $edit_dept = $('#edit_dept');

                          $edit_dept.click(function(){
                            $('#editdeptform').toggleClass('d-none');
                            //  $('#addPatientForm').removeClass('d-none');
                          });

                      </script>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>

          <!-- department end -->

          <!-- Designation form -->

          <div class="col-md-7 grid-margin stretch-card d-none" id="designationform">


            <div class="card">
            <p class="closebtn"> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                onclick="$('#designationform').toggleClass('d-none')"> </i></p>
              <div class="card-body">
                <h4 class="card-title">Designation Form</h4>
                <form class="pt-3 justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
                  <div class="form-row d-flex">
                    <div class="form-group col-md-6 mx-2">
                      <label for="designation_name">Designation Name: </label>
                      <input type="text" name="designation_name" required class="form-control" id="designation_name" placeholder="Designation Name">
                    </div>
                    <div class="form-group col-md-6 mx-2">
                      <label for="base_salary">Basic Salary: </label>
                      <input type="text" name="base_salary" required class="form-control" id="base_salary" placeholder="Basic Salary">
                    </div>
                  </div>
                  <div class="form-row d-flex">
                    <div class="form-group col-md-6 mx-2">
                      <label for="bounus_by_percent">Bonus: </label>
                      <input type="text" name="bounus_by_percent" required class="form-control" id="bounus_by_percent" placeholder="Bonus in percent">
                    </div>
                    <div class="form-group col-md-6 mx-2">
                      <label for="total_bounus">Total Bonus: </label>
                      <input type="text" name="total_bounus" required class="form-control" id="total_bounus" placeholder="Total Bonus">
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"  name="add_degi">Add Patient</button>
                  </div>
                </form>
              </div>
              <div class="table-responsive mt-3">

                <!-- Designation Data -->

                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Designation Name: </th>
                      <th> Basic Salary</th>
                      <th> Bonus By percent </th>
                      <th> Total Bonus </th>
                      <th> Created At </th>
                      <th colspan="2"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      
                      $degi_data=$mysqli->selector('designation');
                      $designation=$degi_data['selectdata'];

                      foreach ($designation as $degi){
                    ?>
                    <tr>
                      <td><?= $degi['id'] ?></td>
                      <td><?= $degi['designation_name']?></td>
                      <td><?= $degi['base_salary']?></td>
                      <td><?= $degi['bounus_by_percent']?></td>
                      <td><?= $degi['total_bounus']?></td>
                      <td><?= $degi['created_at']?></td>
                      <td>
                        <a href="<?= $baseurl ?>/form/editcategories.php?desigId=<?= $degi['id'] ?>" class="btn-sm btn-primary text-decoration-none m-1">
                        <i class="mdi mdi-border-color"></i>
                      </a>
                        <a href="<?= $baseurl ?>/form/deleteuser.php?id=<?= $degi['id'] ?>" class="btn-sm btn-danger text-decoration-none" onclick="confirm('Are you sure?')">
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
            
          <!-- Designation end -->

          <!-- Room form -->

          <div class="col-md-7 grid-margin stretch-card d-none" id="roomform">
            <div class="card">
            <p class="closebtn"> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                onclick="$('#roomform').toggleClass('d-none')"> </i></p>
             
              <div class="card-body">
                <h4 class="card-title">Add Room</h4>
                <form class="pt-3 justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
                  <div class="form-row d-flex">
                    <div class="form-group col-md-6 mx-2">
                      <label for="floor">Floor: </label>
                      <input type="text" name="floor" required class="form-control" id="floor" placeholder="Floor Name">
                    </div>
                    <div class="form-group col-md-6 mx-2">
                      <label for="room_no">Room No: </label>
                      <input type="text" minlength="3" maxlength="11" name="room_no" required class="form-control" id="room_no" placeholder="Room No">
                    </div>
                  </div>
                  <div class="form-row d-flex">
                    <div class="form-group col-md-4 mx-2">
                      <label for="details">Detail: </label>
                      <input type="text" name="details" class="form-control" id="details" placeholder="Details">
                    </div>
                    <div class="form-group col-md-4 mx-2">
                      <label for="gender">Room Type:</label>
                      <select id="gender"  name="room_type" class="form-control">
                        <option selected>Room Type...</option>
                        <option value="CHAMBER">CHAMBER</option>
                        <option value="GENERAL-CABIN">GENERAL-CABIN</option>
                        <option value="VIP-CABIN">VIP-CABIN</option>
                        <option value="OT">OT</option>
                      </select>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="add_room">Add Room</button>
                  </div>
                </form>
              </div>
              <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Floor Name: </th>
                      <th> Room Number</th>
                      <th> Details </th>
                      <th> Room Type </th>
                      <th> Created At </th>
                      <th colspan="2"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      
                      $room_data=$mysqli->selector('room');
                      $rm=$room_data['selectdata'];

                      foreach ($rm as $room){
                    ?>
                    <tr>
                      <td><?= $room['id'] ?></td>
                      <td><?= $room['floor']?></td>
                      <td><?= $room['room_no']?></td>
                      <td><?= $room['details']?></td>
                      <td><?= $room['room_type']?></td>
                      <td><?= $room['created_at']?></td>
                      <td>
                        <a href="<?= $baseurl ?>/form/editcategories.php?roomId=<?= $room['id'] ?>" class="btn-sm btn-primary text-decoration-none m-1">
                          <i class="mdi mdi-border-color"></i>
                        </a>
                        <a href="<?= $baseurl ?>/form/deleteuser.php?id=<?= $room['id'] ?>" class="btn-sm btn-danger text-decoration-none" onclick="confirm('Are you sure?')">
                          <i class="mdi mdi-delete"></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
          <!-- room end -->

          <!-- Rate Form -->

          <div class="col-md-7 grid-margin stretch-card d-none" id="rate_form">
            <div class="card">
            <p class="closebtn"> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                onclick="$('#rate_form').toggleClass('d-none')"> </i></p>
             
              <div class="card-body">
                <h4 class="card-title">Rate Status</h4>
                <form class="pt-3 justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
                  <div class="form-row d-flex">
                    <div class="form-group col-md-6 mx-2">
                      <label for="name">Service Name:</label>
                      <input type="text" name="service_name" required class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6 mx-2">
                      <label for="phone">Rate: </label>
                      <input type="number" name="rate" required class="form-control" id="phone" placeholder="phone">
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"  name="add_service_rate">Add Service Rate</button>
                  </div>
                  <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Service Name: </th>
                      <th> Rate </th>
                      <th> Created At </th>
                      <th colspan="2"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      
                      $rate_data=$mysqli->selector('rate');
                      $rate=$rate_data['selectdata'];

                      foreach ($rate as $rat){
                    ?>
                    <tr>
                      <td><?= $rat['id'] ?></td>
                      <td><?= $rat['service_name']?></td>
                      <td><?= $rat['rate']?></td>
                      <td><?= $rat['created_at']?></td>
                      <td>
                        <a href="<?= $baseurl ?>/form/form/editpatient.php?id=<?= $rat['id'] ?>" class="btn-sm btn-primary text-decoration-none m-1">
                          <i class="mdi mdi-border-color"></i>
                        </a>
                        <a href="<?= $baseurl ?>/form/deleteuser.php?id=<?= $rat['id'] ?>" class="btn-sm btn-danger text-decoration-none" onclick="confirm('Are you sure?')">
                          <i class="mdi mdi-delete"></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>

          <!-- Rate end -->

          <!-- service form -->

          <div class="col-md-7 grid-margin stretch-card d-none" id="service_form">
            <div class="card">
            <p class="closebtn"> <i class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
                onclick="$('#service_form').toggleClass('d-none')"> </i></p>
             
              <div class="card-body">
                <h4 class="card-title">Service Status</h4>
                <form class="pt-3 justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
                  <div class="form-row d-flex">
                    <div class="form-group col-md-6 mx-2">
                      <label for="name">Service Name:</label>
                      <input type="text" name="service_name" required class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6 mx-2">
                      <label for="phone">Rate: </label>
                      <input type="number" name="rate" required class="form-control" id="phone" placeholder="phone">
                    </div>
                  </div>
                  <div class="form-row d-flex">
                    <div class="form-group col-md-4 mx-2">
                      <label for="address">Condition On: </label>
                      <input type="text" name="condition_on" class="form-control" id="address" placeholder="address">
                    </div>
                    <div class="form-group col-md-4 mx-2">
                      <label for="age">Description: </label>
                      <input type="text" name="description"  class="form-control" id="age" placeholder="eg 35">
                    </div>
                    <div class="form-group col-md-4 mx-2">
                      <label for="address">Duration:</label>
                      <input type="text" name="duration" class="form-control" id="address" placeholder="address">
                    </div>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"  name="add_service">Add Patient</button>
                  </div>
                  <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Service Name: </th>
                      <th> Rate </th>
                      <th> Condition On </th>
                      <th> Description </th>
                      <th> Created At </th>
                      <th colspan="2"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      
                      $service_data=$mysqli->selector('service');
                      $service=$service_data['selectdata'];

                      foreach ($service as $serv){
                    ?>
                    <tr>
                      <td><?= $serv['id'] ?></td>
                      <td><?= $serv['service_name']?></td>
                      <td><?= $serv['rate']?></td>
                      <td><?= $serv['condition_on']?></td>
                      <td><?= $serv['description']?></td>
                      <td><?= $serv['created_at']?></td>
                      <td>
                        <a href="<?= $baseurl ?>/form/form/editpatient.php?id=<?= $serv['id'] ?>" class="btn-sm btn-primary text-decoration-none m-1">
                          <i class="mdi mdi-border-color"></i>
                        </a>
                        <a href="<?= $baseurl ?>/form/deleteuser.php?id=<?= $serv['id'] ?>" class="btn-sm btn-danger text-decoration-none" onclick="confirm('Are you sure?')">
                          <i class="mdi mdi-delete"></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>

          <!-- service end -->

        </div>
      </div>
    </div>
  </div>
</div>
          
<script>
    $(document).ready(function () {
    

});
</script>
<!-- content-wrapper ends -->
<!-- partial:include/footer.php -->
<?php require_once('../include/footer.php'); ?>
 