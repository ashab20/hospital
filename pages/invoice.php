<?php 
require_once('../lib/Crud.php'); 
require_once('../include/header.php');

// if(!$_SESSION["userdata"]){
//   echo "<script> location.replace('$baseurl/dashboard/')</script>";
// }

if($usr['roles'] !== 'SUPERADMIN' && $usr['roles'] !== 'ADMIN'){
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

$testData = $mysqli->selector("test")['selectdata'];

?>
<!-- invoicce content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="row px-4">
                    <h2 style="font-size:1.6rem;" class="card-title test-success text-lg p-2 mx-4 text-bold">Payment Invoice</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                if(isset($_GET['patientid']) && strlen($_GET['patientid']) > 0){
                $patientId = $_GET['patientid'];
                $patientData = $mysqli->select_single("SELECT * FROM patient WHERE id=$patientId")['singledata'];
                ?>
                <div class="row mx-5 d-flex">
                  <ul class="list-group mx-5 col-5 row mt-4">
                      
                          <li  class="list-group-item  itemList">
                              <label for="">Patientid:</label>
                              &nbsp;  <strong><?=$patientData['id']?></strong>
                          </li>
                          <li class="list-group-item  itemList">
                              <label for="">Name:</label>
                              &nbsp; <strong><?= $patientData['name']?></strong>
                          </li>
                          
                          <li  class="list-group-item  itemList">
                              <label for="">Age:</label>
                              &nbsp; <strong><?= $patientData['age']?></strong>
                          </li>
                          <li  class="list-group-item  itemList">
                              <label for="">Gender:</label>
                              &nbsp;  <strong><?= $patientData['gender']?></strong>
                          </li>                   
                  </ul> 
                  <div class="col-5">
                    <img src="../assets/images/svg/invoice.svg" width="100%" height="200px" alt="">                     
                  </div>
                </div> 
                <?php
                }else{
                  require_once('../components/patient/addpatient.php');
                }
                ?>
                <form action="<?= $baseurl?>/form/action.php" method="POST" class="mx-5" >
                  <div class="card-body invoice" >
                  <div class="form-group">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <label for="purchese_date" class="form-label text-success">Purchase Date:</label>
                        <input type="date" class="form-control text-secondary" id="purchese_date" placeholder="Enter Purchase Date" name="payment_date" value="<?=date('Y-m-d')?>" minlength="<?=date('Y-m-d')?>">
                      </div>
                      <div class="col-md-6">
                      
                      </div>
                    </div>
                  </div>
                  <?php if(isset($_GET['patientid']) && strlen($_GET['patientid']) > 0){?>
                    <!-- <input type="text" class="test_id[]" name="test_id" hidden> -->
                  <input type="text" name="patient_id"  value="<?=$patientId?>" hidden>
                  <div class="form-group">
                    <div class="row bg-light p-2 rounded-top">
                    <div class="col-2"></div>  
                    <div class="col-3">
                        <label for="">Test</label>
                      </div>
                      <div class="col-2"><label for="">Description</label></div>
                      <div class="col-2"><label for="">Price</label></div>
                      <div class="col-3"><label for="">Total</label></div>
                      
                    </div>
                    <!-- outer repeater -->
                    <div class="repeater">
                        <div data-repeater-list="outer-list">
                            <div  data-repeater-item class="row mt-2">
                            <div class="col-1 mx-2">
                                    <button class="btn bg-danger text-white btn-sm mt-1" data-repeater-delete type="button">
                                        <i class="mdi mdi-minus-circle"></i>
                                    </button>
                                </div>
                                <div class="col-3 mr-2">
                                    <!-- <div class="p-0"> -->
                                        <select name="tid" class="form-select" onchange="product_add(this)">
                                            <option value="">Select Item</option>
                                            <?php

                                            foreach($testData as $test){
                                                ?>
                                            <option data-testid="<?= $test['id']?>" data-price="<?= $test['rate'] ?>" value="<?= $test['id'] ?>" data-description="<?= $test['description'] ?>">
                                                <?= $test['test_name'] ?>
                                            </option>
                                            <?php }
                                                ?>
                                        </select>
                                    <!-- </div> -->
                                </div>                               
                                <div class="col-2 p-0 mx-2">
                                <input type="text" class="form-control descirbe" name="describtion" onkeyup="get_count(this)">
                                </div>
                                <div class="col-2 p-0 mx-2">
                                    <input type="text" onkeyup="get_pricecount(this)" class="form-control price" name="price">
                                  </div>
                                  <!-- <input type="text" hidden  class="test_id" name="test_id"> -->
                               
                                <div class="col-2 p-0 mx-2">
                                    <input readonly type="text" class="form-control sub bg-white" name="sub">
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-2" >
                          <button class="btn bg-primary m-2 text-white btn-sm" data-repeater-create type="button">
                            <i class="mdi mdi-plus-circle"></i>
                          </button>
                        </div>
                        
                    </div>
                    </div>
                    <?php } ?>
                    <?php 
                      if(isset($_GET["admitid"]) && strlen($_GET["admitid"]) > 0){
                        $admitid = $_GET["admitid"];
                        $admitData =$mysqli->select_single("SELECT a.id,a.patient_id,r.room_type as item_name,a.entry_time, r.rate FROM admit a JOIN room r on r.id=a.room_id WHERE a.id=$admitid");
                        $admit = $admitData["singledata"]; 
                    ?>
                  <div class="form-group">
                        <div class="row">
                          <div class="col-8">                            
                          <table class="table">
                            <thead>
                              <th>Medical Services</th>
                              <th>Descriptoin</th>
                              <th>Rate</th>
                              <th>Total</th>
                            </thead>
                            <tbody>
                              <?php  if($admitData["numrows"] > 0){ ?>
                              <!-- ROOM BILL -->
                              <tr>
                                <td>
                                  <input type="text" class="form-control" value="<?= $admit["item_name"]?>" placeholder="Items">
                                </td>
                                <td>
                                <input type="text" class="form-control" value="<?= floor((strtotime(date('y-m-d h:i:s')) - strtotime($admit["entry_time"])) / ( 60 * 60 ))?> Hours" placeholder="description">
                                </td>
                                <td>
                                <input type="text" class="form-control" value="<?= $admit["rate"] ?>" placeholder="rate">
                                </td>
                                <td>
                                <input type="text" class="form-control" value="<?= $admit["rate"] / 2 ?>" placeholder="rate">
                                </td>
                              </tr>
                            <?php } ?>
                                <!-- service name @ADMIT-->
                                <!-- doctor visite @ADMIT-->
                                <!-- Cantine bill @ADMIT-->
                                <!-- MEDICINE BILL bill @ADMIT-->

                            </tbody>
                          </table>                          
                          </div>
                        </div>
                  </div>
                    <?php } ?>
                  <div class="form-group">
                 
                      <div class="row">
                        <div class="col-6">
                        <div>
                          <label for="note" class="form-label text-success">Note:</label>
                          <textarea class="form-control" id="note" placeholder="Enter Note" rows="12" name="note"></textarea>
                        </div>
                        <div class="d-flex">
                          <div class="  mt-2 col-3">
                            <label for="sub_amount" class="form-label text-success">Remark:</label>
                            <input type="text" class="form-control" id="remark" placeholder="Paid or Due" name="remark">
                            </div>
                            <div class="col-4 mt-4">
                              <input type="text" class="form-control mt-2 bg-white" id="dueAmount" readonly>
                          </div>
                        </div>  
                          
                        </div>
                        <div class="col-6">
                          <div>
                            <label for="sub_amount" class="form-label text-success">Sub Amount:</label>
                            <input type="number" class="form-control" id="sub_amount" placeholder="Enter Sub Amount" name="subtotal">
                          </div>
                          <div>
                            <label for="discount" class="form-label text-success">Discount:</label>
                            <input type="number" class="form-control" id="discount" placeholder="Enter Discount" name="discount" onkeyup="total_amount_calc()" value="0">
                          </div>
                          <div>
                            <label for="tax" class="form-label text-success">Tax (%):</label>
                            <input type="number" class="form-control" id="tax" placeholder="Enter Tax" name="tax" onkeyup="total_amount_calc()" value="0" >
                          </div>
                          <div>
                            <label for="total_amount" class="form-label text-success">Total Amount:</label>
                            <input type="number" value="0" class="form-control" id="total_amount" placeholder="Enter Total Amount" name="total">
                          </div>
                          <div>
                            <label for="payment" class="form-label text-success">Pay Amount:</label>
                            <input type="number" value="0" class="form-control" id="payment" placeholder="Enter Pay Amount" name="payment">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2 offset-2 text-center mt-4">
                        <input type="submit" class="btn btn-success" value="Submit" name="invoice_payment">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
              
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
           
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>


<script src="../assets/js/jquery.repeater.min.js"></script>
<script>
  function total_amount_calc(){
    var sub_amount=parseFloat($('#sub_amount').val());
    var discount=parseFloat($('#discount').val());
    var tax=parseFloat($('#tax').val());
    if(!sub_amount)sub_amount=0;
    if(!discount)discount=0;

    if(tax>0){
      tax= (sub_amount*(tax/100));
    }else{
      tax=0
    }
    var total=((sub_amount+tax) - discount);
    $('#total_amount').val(total);
  }
</script>
<script>
  let getId = [];
  function product_add(e){
    var price=$(e).children('option:selected').data('price');
    // var discount=$(e).children('option:selected').data('discount');
    var description=$(e).children('option:selected').data('description');
    var testId=$(e).children('option:selected').data('testid');
    $(e).closest('.row').find('.price').val(price);
    // $(e).closest('.row').find('.test_id').val({...testId});
    $(e).closest('.row').find('.descirbe').val(description);
    
  
  // function get_count(e){
  //   // var qty=parseFloat($(e).val());
  //   var price=parseFloat($(e).closest('.row').find('.price').val());
  //   var sub=price; // qty*price
  //   $(e).closest('.row').find('.sub').val(sub);
  //   sub_amount();
  //   total_amount_calc();
  // }

getId.push(testId);

// ? change by me
var price=parseFloat($(e).closest('.row').find('.price').val());
  var sub=price; // qty*price
  $(e).closest('.row').find('.sub').val(sub);
  sub_amount();
  total_amount_calc();




  function get_pricecount(e){
    var price=parseFloat($(e).val());
    // var qty=parseFloat($(e).closest('.row').find('.qty').val());
    var sub=price; // qty*price
    $(e).closest('.row').find('.sub').val(sub);
    sub_amount();
    total_amount_calc();
  }

  function sub_amount(){
    var sub_amount=0;
    $('.sub').each(function(){
      sub_amount+=parseFloat($(this).val());
    });
    $('#sub_amount').val(sub_amount);
    $('#total_amount').val(sub_amount);
    total_amount_calc();
  }
 
  }

  $('#payment').change(()=> {
    let payment = $('#payment').val();
    let total = $('#total_amount').val();
// alert(`${payment < total}`);
if(total <= payment){
  $('#remark').val('PAID');
}else{
  $('#remark').val('DUE');
  $('#dueAmount').val(total - payment)
}
});

// $('.test_id').val({...getId});

// console.log(getId);


</script>
<script>
    $(document).ready(function () {
        $('.repeater').repeater({
            // (Required if there is a nested repeater)
            // Specify the configuration of the nested repeaters.
            // Nested configuration follows the same format as the base configuration,
            // supporting options "defaultValues", "show", "hide", etc.
            // Nested repeaters additionally require a "selector" field.
            repeaters: [{
                // (Required)
                // Specify the jQuery selector for this nested repeater
                selector: '.inner-repeater'
            }]
        });
    });
</script>