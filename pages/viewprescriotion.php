<?php
if(isset($_GET['pid']) && strlen($_GET['pid']) > 0){
  $patientId =$_GET['pid'];
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

$user = $data['selectdata'];
if($data['error']){
  $_SESSION['msg']=$data['msg'];
  echo "error";
}

$admitedData = $mysqli->select_single("SELECT p.*, a.* , a.id as admitid, d.*, u.name as doctor_name, u.phone as doctor_phone,dep.name as dep_name, r.room_no, r.floor FROM patient p JOIN admit a on p.id=a.patient_id JOIN doctor d on d.id=a.patient_of JOIN user u on d.user_id=u.id JOIN room r on r.id=a.room_id JOIN department dep ON d.department_id=dep.id WHERE p.id=$patientId");

$patientInfo = $admitedData["singledata"];
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
            <?php 
            if($admitedData["numrows"] > 0){ ?>
            <div style="padding: 1rem;justify-content:center;background-color:#fff;" id="printContent">
            <style>
              .itemList{
                background-color: #fff !important;
                border: 1px solid rgba(0, 0, 0, 0.125) !important;
                position: relative;
                display: block;
                padding: 0.5rem 1rem;
                color: #212529;
                text-decoration: none;
              }
            </style>        
          
                <div style="display: grid;grid-template-columns:repeat(auto-fit,minmax(40%,1fr));padding:2rem;">                
                    <div 
                        style="width: 100%; margin: 0 auto;margin-top:1rem;justify-content: start;justify-items: center;display: grid;">
                        <div style="display: flex;text-align:center;">
                        <img src="../assets/images/hospital-sign.png" alt="logo"  width="50px"  style="width: 35px;margin:.5rem;height:30px"/>
                        <h1 class="pt-2" style="font-weight:bolder;font-size:1.6rem; color:#e01111;">HOSPITAL</h1>
                      </div>
                      <p>2 No gate, Chittgong. <br>Phone: 031456789</p>
                    </div>
                    <div style="background-color: #fff;">
                    <ul style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
                            <div style="display: grid;grid-template-columns:repeat(auto-fit,minmax(56%,1fr));justify-content:end;justify-items: end;padding:.5rem;">
                                <li class="" style="list-style-type: none;">
                                    <!-- <label for="">Doctor's Name:</label> -->
                                    &nbsp;  <strong><?= $patientInfo["doctor_name"] ?></strong>
                                </li>
                                <li  class="" style="list-style-type: none;">
                                    <!-- <label for="">Age:</label> -->
                                    &nbsp; <strong><?= $patientInfo["qualification"] ?> </strong>
                                </li>
                                
                                
                                
                                <li  class="" style="list-style-type: none;">
                                    <!-- <label for="">Gender:</label> -->
                                    &nbsp; <strong><?= $patientInfo["dep_name"] ?></strong>
                                </li>
                                
                                <li  class="" style="list-style-type: none;">
                                    <!-- <label for="">Nationality:</label> -->
                                    &nbsp; <strong><?= $patientInfo["doctor_phone"] ?></strong>
                                </li>
                            </div>
                        </ul> 
                    </div>
                    </div>
                    <div style="margin-left: 5%;margin-right:5%;">
                        <span >
                            <h5 style="color:#b1b2a9;padding-left:1rem;">Patient Informations</h5>
                        </span>
                        <div>
                          <!-- <div style="display: flex; justify-content:space-between;margin-top:1rem;margin-bottom:1rem;">
                          <li style="list-style-type:none;margin-left:1rem;">
                                    <label for="">Registration id:</label>
                                    &nbsp;  <strong><?= $patientInfo["admitid"] ?></strong>
                                </li>
                                <li  style="list-style-type:none">
                                    <label for="">Date:</label>
                                    &nbsp; <strong>
                                      <span style="background-color: #fff;padding: .3rem;">11</span>
                                      <span style="background-color: #fff;padding: .3rem;">12</span>
                                      <span style="background-color: #fff;padding: .3rem;">2013</span>
                                    </strong>
                                </li>
                          </div> -->
                        <ul style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
                            <div style="display: grid;grid-template-columns:repeat(auto-fit,minmax(40%,1fr));justify-content:space-evenly">
                                <li class="itemList name">
                                    <label for="">Name:</label>
                                    &nbsp;  <strong><?= $patientInfo["name"] ?></strong>
                                </li>
                                <li  class="itemList">
                                    <label for="">Age:</label>
                                    &nbsp; <strong><?= $patientInfo["age"] ?> Years Old</strong>
                                </li>
                                
                                
                                
                                <li  class="itemList">
                                    <label for="">Gender:</label>
                                    &nbsp; <strong><?= $patientInfo["gender"] ?></strong>
                                </li>
                                
                                <li  class="itemList">
                                    <label for="">Nationality:</label>
                                    &nbsp; <strong><?= $patientInfo["present_address"] ?></strong>
                                </li>

                                
                            </div>
                        </ul>  
                        </div>
                        <hr>
                    </div>
                    
                    <div style="margin:1rem 5% 1rem 5%;">
                        <div>
                        
                        <div style="display:flex;justify-content:space-around;margin-top: 6rem;">                          
                          <div >
                            <span ><h6 style="border-top: 1px solid;">Gurdiant's Signiture</h6></span>
                          </div>
                          <div>
                            <span><h6 style="border-top: 1px solid;">Doctor's Signiture</h6></span>
                          </div>
                          <div>
                            <span><h6 style="border-top: 1px solid;">Manager's Signiture</h6></span>
                          </div> 
                        </div>
                        </div>
                    </div>
                  <div class="float-end mt-5">
                            <button class="btn btn-sm btn-danger text-end" id="print">Print</button>
                            <!-- <button class="btn btn-sm btn-info text-end">Confirm?</button> -->
                        </div>
                </div>  
                
                <?php  } ?>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>

          <!-- Main content -->
  
<script>
  $(document).ready( () =>{
  $('#print').click(() => {
            // $("#card").css({"display":"none"});
            let printContent = $("#printContent").html();
            let payBill = document.body.innerHTML;

            document.body.innerHTML = printContent;

            window.print();

            document.body.innerHTML = payBill;
            
            // $("#card").css({"display":"block"});

        });
    });
</script>