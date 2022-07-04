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

$result = $mysqli->selector("test")['selectdata'];


?>


          
            <!-- invoicce content -->
            <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Purchase Information Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class=" mx-5 mt-5">
                        <ul class="list-group">
                            <div class="row">
                            <?php
                              if(isset($_GET['id']) && strlen($_GET['id']) > 0){
                              $patientId = $_GET['id'];
                              $patientData = $mysqli->select_single("SELECT * FROM patient WHERE id=$patientId")['singledata'];
                              }
                              ?>
                            
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Patientid:</label>
                                    &nbsp;  <strong><?=$patientData['id']?></strong>
                                </li>
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Name:</label>
                                    &nbsp; <strong><?= $patientData['name']?></strong>
                                </li>
                                
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Age:</label>
                                    &nbsp; <strong><?= $patientData['age']?></strong>
                                </li>
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Gender:</label>
                                    &nbsp;  <strong><?= $patientData['gender']?></strong>
                                </li>
                            </div>
                        </ul>                      
                    </div>  
                <form action="" method="post">
                   <div class="card-body">
                <div class="form-group">
                    <div class="row">
                      <div class="col-5">
                        <label for="">Test</label>
                      </div>
                      <div class="col-2"><label for="">Price</label></div>
                      <!-- <div class="col-2"><label for="">Qty</label></div> -->
                      <div class="col-3"><label for="">Total</label></div>
                      <div class="col-1"></div>
                    </div>
                    <div class="repeater">
                      <div data-repeater-list="items">
                        <div class="row" data-repeater-item >
                        <div class="col-5 p-0">
                            <select name="" class="form-select" onchange="product_add(this)">
                              <option value="">Select Item</option>
                              <?php
                                
                                foreach($result as $data){
                              ?>
                                <option data-price="<?= $data['rate'] ?>" value="<?= $data['id'] ?>">
                                <?= $data['test_name'] ?>
                              </option>
                              <?php }
                               ?>
                            </select>
                          </div>
                          <div class="col-2 p-0">
                            <input type="text" onkeyup="get_pricecount(this)" class="form-control price" name="price">
                          </div>
                          <!-- <div class="col-2 p-0">
                            <input type="text" class="form-control qty" name="qty" onkeyup="get_count(this)">
                          </div> -->
                          <div class="col-2 p-0">
                            <input readonly type="text" class="form-control sub" name="sub">
                          </div>
                          <div class="col-1">
                            <button class="btn btn-danger btn-sm" data-repeater-delete type="button"><i class="mdi mdi-minus"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-1 offset-11">
                          <button class="btn btn-info btn-sm" data-repeater-create type="button"><i class="mdi mdi-plus"></i></button>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="note" class="form-label text-success">Note:</label>
                          <textarea class="form-control" id="note" placeholder="Enter Note" rows="12" name="note"></textarea>
                        </div>
                        <div class="col-6">
                          <div>
                            <label for="sub_amount" class="form-label text-success">Sub Amount:</label>
                            <input type="text" class="form-control" id="sub_amount" placeholder="Enter Sub Amount" name="sub_amount">
                          </div>
                          <div>
                            <label for="discount" class="form-label text-success">Discount:</label>
                            <input type="text" class="form-control" id="discount" placeholder="Enter Discount" name="discount" onkeyup="total_amount_calc()">
                          </div>
                          <div>
                            <label for="tax" class="form-label text-success">Tax (%):</label>
                            <input type="text" class="form-control" id="tax" placeholder="Enter Tax" name="tax" onkeyup="total_amount_calc()">
                          </div>
                          <div>
                            <label for="total_amount" class="form-label text-success">Total Amount:</label>
                            <input type="text" class="form-control" id="total_amount" placeholder="Enter Total Amount" name="total_amount">
                          </div>
                          <div>
                            <label for="payment" class="form-label text-success">Pay Amount:</label>
                            <input type="text" class="form-control" id="payment" placeholder="Enter Pay Amount" name="payment">
                          </div>
                        </div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2 offset-2 text-center mt-4">
                        <button type="submit" class="btn btn-success">Submit</button>
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