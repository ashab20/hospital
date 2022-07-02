<?php
session_start();
if(isset($_SESSION) && !($_SESSION['userdata']['roles']== 'SUPERADMIN') ){
    echo "<script> location.replace('$baseurl/dashboard/')</script>";
}



require_once('../lib/Crud.php'); 
$mysqli = new Crud();
if(isset($_SESSION) ){
    if(!($_SESSION['userdata']['roles']== 'SUPERADMIN') ){
        echo "<script> location.replace('$baseurl/dashboard/')</script>";
    }
    $id = $_GET['id'];
    $_POST['id']= $id;
    $_POST['modified_by']= $_SESSION['userdata']['id'];
    $_POST['modified_at']= date('Y-m-d H:i:s');


// $modified_by = $_SESSION['userdata']['id'];
// $modified_at = date('Y-m-d H:i:s');
$deleted = $mysqli->updator('user',$_POST,"id=$id");
if($deleted['error']){
    $_SESSION['delete']=$$deleted['error'];
    // echo "<script> location.replace('$baseurl/pages/updateuser.php?id=$id')</script>";
  }else{
    if($deleted['updated']){
      $_SESSION['delete']="<p style='color:green'>Account Deactivated Successfully</p>";
      header("location:http://localhost/hospital/dashboard");
    //   echo "<script> location.replace('$baseurl/form/updateuser.php?id=$id')</script>";
    }

  }

}else{
  header("location:http://localhost/hospital/pages/login.php");

}

?>