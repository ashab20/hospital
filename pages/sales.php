
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


          
            <!-- invoicce content -->
            <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Sales Information Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="customer_id" class="form-label text-success">Customer ID:</label>
                        <input type="number" class="form-control" id="customer_id" placeholder="Enter Customer ID" name="customer_id">
                        </div>
                        <div class="col-md-6">
                        <label for="note" class="form-label text-success">Note:</label>
                        <textarea class="form-control" id="note" placeholder="Enter Note" name="note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="sale_date" class="form-label text-success">Sale Date:</label>
                        <input type="datetime-local" class="form-control text-secondary" id="sale_date" placeholder="Enter Sale Date" name="sale_date">
                        </div>
                        <div class="col-md-6">
                        <label for="sub_amount" class="form-label text-success">Sub Amount:</label>
                        <input type="text" class="form-control" id="sub_amount" placeholder="Enter Sub Amount" name="sub_amount">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="tax" class="form-label text-success">Tax:</label>
                        <input type="text" class="form-control" id="tax" placeholder="Enter Tax" name="tax">
                        </div>
                        <div class="col-md-6">
                        <label for="discount" class="form-label text-success">Discount:</label>
                        <input type="text" class="form-control" id="discount" placeholder="Enter Discount" name="discount">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="total_amount" class="form-label text-success">Total Amount:</label>
                        <input type="text" class="form-control" id="total_amount" placeholder="Enter Total Amount" name="total_amount">
                        </div>
                        <div class="col-md-6">
                        <label for="due" class="form-label text-success">Due:</label>
                        <input type="text" class="form-control" id="due" placeholder="Enter Due" name="due">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="sale_detail" class="form-label text-success">Sale Detail:</label>
                        <input type="text" class="form-control" id="sale_detail" placeholder="Enter Sale Detail" name="sale_detail">
                        </div>
                        <div class="col-md-2 offset-2 text-center mt-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </div>
                </div>
                <!-- /.card-body -->
              </form>
           
              
            </div>
            <!-- /.card -->

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
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
           
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>
