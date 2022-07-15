<?php
session_start();
if(isset($_SESSION) && !($_SESSION['userdata']['roles']== 'SUPERADMIN') ){
    echo "<script> location.replace('$baseurl/dashboard/')</script>";
}



require_once('../lib/Crud.php'); 
$mysqli = new Crud();

    if(!($_SESSION['userdata']['roles']== 'SUPERADMIN') ){
        echo "<script> location.replace('$baseurl/dashboard/')</script>";
    }
    if(isset($_GET['id']) && strlen($_GET['id']) > 0){
      $id = $_GET['id'];
        $_POST['modified_by']= $_SESSION['userdata']['id'];
        $_POST['modified_at']= date('Y-m-d H:i:s');
        $_POST['status']= 0;


    $deleted = $mysqli->updator('user',$_POST,"id=$id");
    if($deleted['error']){
        $_SESSION['delete']=$deleted['error'];
        // echo "<script> location.replace('$baseurl/pages/updateuser.php?id=$id')</script>";
      }else{
        if($deleted['updated']){
          $_SESSION['delete']="<p style='color:green'>Account Deactivated Successfully</p>";
          header("location:http://localhost/hospital/dashboard");
        //   echo "<script> location.replace('$baseurl/form/updateuser.php?id=$id')</script>";
        }
    }
  }

  if(isset($_GET['pid']) && strlen($_GET['pid']) > 0){
    $id = $_GET['pid'];
      $_POST['modified_by']= $_SESSION['userdata']['id'];
      $_POST['modified_at']= date('Y-m-d H:i:s');
      $_POST['status']= 0;


  $deleted = $mysqli->updator('user',$_POST,"id=$id");
  if($deleted['error']){
      $_SESSION['delete']=$deleted['error'];
      // echo "<script> location.replace('$baseurl/pages/updateuser.php?id=$id')</script>";
    }else{
      if($deleted['updated']){
        $_SESSION['delete']="<p style='color:green'>Account Deactivated Successfully</p>";
        header("location:http://localhost/hospital/dashboard");
      //   echo "<script> location.replace('$baseurl/form/updateuser.php?id=$id')</script>";
      }
  }
}


?>