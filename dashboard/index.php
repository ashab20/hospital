<?php
require_once('../config.php');

if(isset($_SESSION['userdata'])){
    if($_SESSION['userdata']['roles']== 'SUPERADMIN'){
      header("location:$baseurl/dashboard/admin.php");
    }elseif ($_SESSION['userdata']['roles']== 'ADMIN'){
      echo "<script> location.replace('$baseurl/dashboard/admin.php')</script>";
    }elseif ($_SESSION['userdata']['roles']== 'DOCTOR'){
      echo "<script> location.replace('$baseurl/dashboard/doctor.php')</script>";
    }elseif ($_SESSION['userdata']['roles']== 'EMPLOYEE'){
      echo "<script> location.replace('$baseurl/dashboard/emp.php')</script>";
    }
  }
  echo header("location:$baseurl/pages/login.php");
?>