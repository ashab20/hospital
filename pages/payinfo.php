
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
<style>
    body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

</style>
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
          <div class="content-wrapper ">


<?php
$mysqli = new Crud();

if(isset($_GET['invoice']) && strlen($_GET['invoice']) > 0){
    $invoiceId = $_GET['invoice'];
    $invoice_data = $mysqli->select_single("SELECT ip.* ,p.id as pid ,p.name,p.phone,p.address,p.age,p.gender FROM  invoice_payment ip JOIN patient p on p.id=ip.patient_id  WHERE ip.id=$invoiceId");
    // $invoice = array_merge($invoice_data['singledata']);
    $invoice = $invoice_data['singledata'];


    if($invoice_data['numrows'] > 0){
?>


    <!-- Invoice Page -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container bg-white p-5">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: <?=$invoiceId?>
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <button id="printer" class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </button>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0" id="printPage">
        <!-- start for print -->
        <div style="margin-top: 1rem;">
            <div style="display:grid">
                <div style="display: flex;justify-content:center;text-align:center;">                    
                    <img src="../assets/images/hospital-sign.png" alt="img" width="40px" style="padding: .2rem;">
                    <h2 style="color:#dd4949;font-weight: 700;"><strong>HOSPITA<span>L</span></strong></h2>    
                    
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div style="display: grid;grid-template-columns: repeat(auto-fit,minmax(40%,1fr));margin-top:.5rem">
                    <div style="padding:.5rem;">
                        <div>
                            <span style="color:#615f5f;font-size:1.3rem;">Patient: </span>
                            <span style="color:#478fcc;font-wight:500;font-size:1.3rem;"><?= $invoice['name']?></span>
                        </div>
                        <div style="color:gray">
                            <div style="margin-top: .2rem;">
                                Id: <?= $invoice['id']?>
                            </div>
                            <div >
                            <?= $invoice['address']?>
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?= $invoice['phone']?></b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div style="display:flex;justify-content: end;">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> <?= $invoice['id']?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <?= $invoice['payment_date']?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25"><?= $invoice['remark']?></span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    
                    
                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">SL</th>
                            <th>Items</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>
                        
                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <?php $test_info = json_decode( $invoice['test_id']); $sl=1;
                    $color = false;
                    foreach($test_info as $testID){
                        if($sl%2==0) $color = 'bgc-default-l4';
                        $test = $mysqli->select_single("SELECT test_name,description, rate FROM test WHERE id=$testID")['singledata']; ?>
                        <tr>
                            <td><?= $sl++ ?></td>
                            <td><?= $test['test_name']?></td>
                            <td><?= $test['description']?></td>
                            <td class="text-95"><?= $test['rate']?><b style="font-size:1.8rem;">৳</b></td>
                            <!-- <td class="text-secondary-d2">$20</td> -->
                        </tr> 
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
           

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            <?= $invoice['note']?>
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">
                                        <?= $invoice['subtotal']?><b style="font-size:1.8rem;">৳</b>
                                    </span>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Discount
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1"><?= $invoice['discount']?><b style="font-size:1.8rem;">৳</b></span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Tax (%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"><?= $invoice['tax']?></span>
                                </div>
                            </div>
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2"><?= $invoice['total']?><b style="font-size:1.8rem;">৳</b></span>
                                </div> 
                            </div>
                            <?php
                                if(isset($invoice['return']) && $invoice['return'] != 0 ){
                                ?>
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Return
                                </div>                                
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2"><?= $invoice['return']?><b style="font-size:1.8rem;">৳</b></span>
                                </div>
                            </div>
                            <?php } ?>
                            <hr>
                            <div class="row  align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Paid:
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2" style="background-color: #615f5f;color:#fff;padding:.3rem"><?= $invoice['payment']?><b style="font-size:1.8rem;">৳</b></span>
                                </div>
                            </div>
                            <?php
                                if($invoice['payment'] < $invoice['total'] ){
                                ?>
                            <div class="row align-items-center bgc-primary-l3 p-2" style="color:crimson;">
                                <div class="col-7 text-right">
                                    Due
                                </div>                                
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2" ><?= $invoice['total'] - $invoice['payment']?><b style="font-size:1.8rem;">৳</b></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <?php
                            if(isset($invoice['remark']) && $invoice['remark'] == 'DUE'){
                        ?>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  }else{

    echo 'NO data Found';
}
}else{
    echo "<script>location.replace('$baseurl/pages/error-404.html');</script>";
}
?>

<script>
    $(document).ready( () => {
        $('#printer').click(() => {
            
  let divToPrint=document.getElementById('printPage');

let newWin=window.open('','Print-Window');

newWin.document.open();

newWin.document.write('<html><body onload="window.print()">'+printPage.innerHTML+'</body></html>');

newWin.document.close();

setTimeout(function(){newWin.close();},10);
        })
    })
//     function printDiv() 
// {

//   let divToPrint=document.getElementById('printPage');

//   let newWin=window.open('','Print-Window');

//   newWin.document.open();

//   newWin.document.write('<html><body onload="window.print()">'+printPage.innerHTML+'</body></html>');

//   newWin.document.close();

//   setTimeout(function(){newWin.close();},10);

// }
</script>
           
    </div>
          <!-- content-wrapper ends -->
          <!-- partial:include/footer.php -->
          <?php require_once('../include/footer.php') ?>


        
