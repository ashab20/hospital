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
                                    &nbsp; <strong>25</strong>
                                </li>
                                <li style="background-color:#ffe7bc;border:0;" class="list-group-item col-md-3 itemList">
                                    <label for="">Gender:</label>
                                    &nbsp;  <strong>Male</strong>
                                </li>
                            </div>
                        </ul>                      
                    </div>  
                <form action="" method="post" enctype="multipart/form-data">
                   <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="supplier_id" class="form-label text-success">Supplier ID:</label>
                        <select class="form-select" id="supplier_id" name="supplier_id">
                          <option value="">Select Supplier</option>
                          <?php
                            $result=$mysqli->selector("supplier");
                            if(!$result['error']){
                              foreach($result['data'] as $i=>$sup){
                          ?>
                              <option value="<?= $sup->id ?>"><?= $sup->sup_name ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="purchese_date" class="form-label text-success">Purchase Date:</label>
                        <input type="date" class="form-control text-secondary" id="purchese_date" placeholder="Enter Purchase Date" name="purchese_date">
                      </div>
                    </div>
                  </div>

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
                            <select name="product_id" class="form-select" onchange="product_add(this)">
                              <option value="">Select Item</option>
                              <?php
                                $result=$mysqli->selector('test')['selectdata'];
                                foreach($result as $data){
                              ?>
                                <option data-discount="<?= $data->discount ?>" data-price="<?= $data->rate ?>" value="<?= $data->id ?>"><?= $data->name ?></option>
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
                            <button class="btn btn-danger btn-sm" data-repeater-delete type="button"><i class="fa fa-trash"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-1 offset-11">
                          <button class="btn btn-info btn-sm" data-repeater-create type="button"><i class="fa fa-plus"></i></button>
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
              <?php
                // if($_POST){
                //   $pur['supplier_id']=$_POST['supplier_id'];
                //   $pur['purchese_date']=$_POST['purchese_date'];
                //   $pur['sub_amount']=$_POST['sub_amount'];
                //   $pur['discount']=$_POST['discount'];
                //   $pur['tax']=$_POST['tax'];
                //   $pur['total_amount']=$_POST['total_amount'];
                //   $pur['payment']=$_POST['payment'];
                //   $pur['note']=$_POST['note'];
                 
                //   $result=$mysqli->common_create('purchese',$pur);
                //   if($result['error']){
                //     $_SESSION['class']="danger";
                //     $_SESSION['msg']=$result['msg'];
                //     echo "<script> location.replace('$base_url/purchase_create.php')</script>";
                //   }else{
                //     $purchase_id=$result['insert_id'];

                //     /* add data to supplier payment */
                //     if($_POST['payment']){
                //       $pay['purchase_id']=$purchase_id;
                //       $pay['supplier_id']=$_POST['supplier_id'];
                //       $pay['pay_amount']=$_POST['payment'];
                //       $pay['pay_date']=$_POST['purchese_date'];
                //       $paym=$mysqli->common_create('supplier_payment',$pay);
                //     }
                    
                //     $pur_det=array();
                //     $stock_det=array();
                //     foreach($_POST['items'] as $item){
                //       /* save data to purchase details */
                //       $pur_det['purchase_id']=$purchase_id;
                //       $pur_det['product_id']=$item['product_id'];
                //       $pur_det['price']=$item['price'];
                //       $pur_det['qty']=$item['qty'];

                //       $purdcreate=$mysqli->common_create('purchese_details',$pur_det);
                //       /* save data to stock */
                //       $stock_det['purchase_id']=$purchase_id;
                //       $stock_det['product_id']=$item['product_id'];
                //       $stock_det['pin']=$item['qty'];
                //       $stock_det['price']=$item['price'];
                //       $stock=$mysqli->creatoir('stock',$stock_det);
                //     }
                //     $_SESSION['class']="success";
                //     $_SESSION['msg']=$result['msg'];
                //     echo "<script> location.replace('$base_url/purchase_list.php')</script>";
                //   }
                // }
              ?>
              

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
  function product_add(e){
    var price=$(e).children('option:selected').data('price');
    var discount=$(e).children('option:selected').data('discount');
    $(e).closest('.row').find('.price').val(price);
  }
  function get_count(e){
    var qty=parseFloat($(e).val());
    var price=parseFloat($(e).closest('.row').find('.price').val());
    var sub=qty*price;
    $(e).closest('.row').find('.sub').val(sub);
    sub_amount();
    total_amount_calc();
  }
  function get_pricecount(e){
    var price=parseFloat($(e).val());
    var qty=parseFloat($(e).closest('.row').find('.qty').val());
    var sub=qty*price;
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
</script>

<script>
  $(document).ready(function () {
    $('.repeater').repeater()
  });
</script>

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