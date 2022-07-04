<?php
session_start();
require_once('../lib/Crud.php'); 

$mysqli = new Crud();


if(isset($_SESSION['userdata'])){
  $user = $_SESSION['userdata'];
}else{
header("location:http://localhost/hospital/pages/login.php");

}


// ! *** LOGIN ***
if(isset($_POST['login'])){

    unset($_POST['login']);
    $_POST['password']= md5(sha1($_POST['password']));
  
    $data = $mysqli->selector('user','*',$_POST);
    if($data['numrows']== 0){
      $_SESSION['msg']="<p style='color:red'>User name or password is wrong.<br> Please try again!</p>";
      echo "<script> location.replace('$baseurl/pages/login.php')</script>";
    }else{
      if($data['selectdata']['status']==1){
        $_SESSION['userdata']=$data['selectdata'];
        $_SESSION['msg']="Login success";
  
        if($data['selectdata']['roles']== 'SUPERADMIN'){
          echo "<script> location.replace('$baseurl/dashboard/admin.php')</script>";
        }elseif ($data['selectdata']['roles']== 'ADMIN'){
          echo "<script> location.replace('$baseurl/dashboard/admin.php')</script>";
        }elseif ($data['selectdata']['roles']== 'DOCTOR'){
          $id = $_SESSION['userdata']['id'];
          $checkDoctor = $mysqli->select_single("SELECT * FROM doctor WHERE id=$id");
          if($checkDoctor['numrows'] != 1){
            header("location:$baseurl/form/adddoctor.php");
          }else{
            if($checkDoctor['singledata']["status"] == 1){
              $_SESSION['doctordata']= $checkDoctor['singledata'];
              echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
            }else{
              $_SESSION['msg']="Your Account has been dissable. Please Contact the Admin.";
            }
          }
          
        }elseif ($data['selectdata']['roles']== 'EMPLOYEE'){
          echo "<script> location.replace('$baseurl/dashboard/emp.php')</script>";
        }else{
          echo "<script> location.replace('$baseurl/pages/login.php')</script>";
        }
  
      }else{
        $_SESSION['msg']="You are not active user. Please contact to admin";
      echo "<script> location.replace('$baseurl/pages/login.php')</script>";
      }
      
    }
    
}

//  *** LOGIN END***

// ! *** REGISTRATION ***

if(isset($_POST['reg'])){
    unset($_POST['reg']);
    unset($_POST['cpassword']);
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $_POST['password'] = md5(sha1($_POST['password']));
    $_POST['email'] = htmlentities(trim($_POST['email']));
    $_POST['name'] = htmlentities(ucwords($_POST['name']));
    $_POST['phone'] = htmlentities($_POST['phone']);
    $data = $mysqli->creator('user',$_POST);
    if($data['error']){
      $_SESSION['msg']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/register.php')</script>";
     
    }else{
      if($data['msg']='saved'){
        $_SESSION['msg']="<p style='color:green'>Registration Successfully</p>";
       
      }
      
      echo "<script> location.replace('$baseurl/pages/login.php')</script>";
  
    }
    
}

//  *** REGISTRATION END***

//*** Profile Upload **


// *** profile uploas ***
if(isset($_POST['images_upload'])){
  unset($_POST['images_upload']);
  if($_FILES['avatar']['name']){
      $path_parts = pathinfo($_FILES["avatar"]["name"]);
      $image_name=$_SESSION['userdata']['id'].".".$path_parts['extension'];
      $up=move_uploaded_file($_FILES['avatar']['tmp_name'],"../assets/images/avatar/".$image_name);
      if($up){
          $_POST['avatar']=$image_name;
      }
  }   
  $_POST['modified_by'] = $user['id'];
  $_POST['modified_at'] = date('Y-m-d H:i:s');
  
  $id= $user['id'];
  $result=$mysqli->updator('user',$_POST,$id);
  if($result['error']){
  $_SESSION['msg']=$result['error'];
  echo "<script> location.replace('$baseurl/pages/profile.php?id=$id') </script>";
  }
  else{
    $_SESSION['userdata']=$result['updated'];
  echo "<script> location.replace('$baseurl/pages/profile.php?id=$id') </script>";
  }
}


// *** Profile





// ! *** Appointment*****

if(isset($_POST['appt'])){
  unset($_POST['appt']);
  $_POST['name'] = htmlentities(ucwords($_POST['name']));
  $_POST['message'] = htmlentities(ucwords($_POST['message']));
  $_POST['date'] = htmlentities(ucwords($_POST['date']));
  $_POST['phone'] = htmlentities($_POST['phone']);
  $phone = $_POST['phone'];
  
  $appt = $mysqli->creator('appointment',$_POST);
  if($appt['error']){
    $_SESSION['appt']=$appt['error'];
    echo "<script> location.replace('$baseurl/')</script>";
  }else{
    if($appt['msg']='saved'){
      // if($user['roles']=='SUPERAMDMIN' or $user['roles']=='AMDMIN'){
         $_SESSION['appt']="<p style='color:green'>Appointment Submited </p>";
      echo "<script> location.replace('$baseurl/pages/patient.php')</script>";
      // }else{
      //   $_SESSION['appt']="<p style='color:green'>Appointment Submited </p>";
      // echo "<script> location.replace('$baseurl/pages/success.php?phn=$phone')</script>";
      //  }
      
     
    }
  }
  
}



//  *** Appointment END*****



// add test
if(isset($_POST['addTest'])){
  unset($_POST['addTest']);

  $_POST['reference_by'] = htmlentities(ucwords($_POST['reference_by']));
  if($user){
    $_POST['created_by'] = $user['id'];
  }
  $addtest = $mysqli->creator('test',$_POST);
  if($addtest['error']){
    $_SESSION['msg']=$addtest['error'];
    // echo "<script> location.replace('$baseurl')</script>";
  }else{
    if($addtest['msg']='saved'){
      $_SESSION['test']="<p style='color:green'>Test Submited </p>";
      echo "<script> location.replace('$baseurl/pages/patient.php')</script>";
    }
  }
}







// ! *** Updated user ***
if(isset($_POST['updateData'])){
  unset($_POST['updateData']);
    unset($_POST['cpassword']);
    
    $_POST['modified_by'] = $user['id'];
    $_POST['modified_at'] = date('Y-m-d H:i:s');
    
    $_POST['password'] = md5(sha1($_POST['password']));
    $_POST['email'] = htmlentities(trim($_POST['email']));
    $_POST['name'] = htmlentities(ucwords($_POST['name']));
    $_POST['phone'] = htmlentities($_POST['phone']);
    if($_POST['status']==''){
      unset($_POST['status']);
    }else{
      (int) $_POST['status'];
    }
    $id= $_POST['id'];
    $data = $mysqli->updator('user',$_POST,"id=$id");
    if($data['error']){
      $_SESSION['msg']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/updateuser.php?id=$id')</script>";
    }else{
      if($data['msg']='saved'){
        $_SESSION['msg']="<p style='color:green'>Update Successfully</p>";
        echo "<script> location.replace('$baseurl/form/updateuser.php?id=$id')</script>";
      }
  
    }
}



// ! *** ADD PATIENT ***
if(isset($_POST['addPatient'])){
  unset($_POST['addPatient']);

  $_POST['name'] = htmlentities(ucwords($_POST['name']));
    $_POST['phone'] = htmlentities($_POST['phone']);
    $_POST['gender'] = htmlentities($_POST['gender']);
    $_POST['age'] = htmlentities($_POST['age']);
    $_POST['address'] = htmlentities($_POST['address']);
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $phone = $_POST['phone'];


    $data = $mysqli->creator('patient',$_POST);
    if($data['error']){
      $_SESSION['msg']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/patient.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
        $_SESSION['msg']="<p class='h3 text-success text-center justify-content-center mx-auto'>Patient Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/patient.php?phn=$phone')</script>";
       
      }
      
      
  
    }


}



// *** ADD DOCTOR ***

if(isset($_POST['adddoctor'])){
  unset($_POST['adddoctor']);

  $_POST['father_name'] = htmlentities(ucwords($_POST['father_name']));
  $_POST['mother_name'] = htmlentities(ucwords($_POST['mother_name']));
  $_POST['qualification'] = htmlentities(ucwords($_POST['qualification']));
  $_POST['gratuated_from'] = htmlentities(ucwords($_POST['gratuated_from']));
  $_POST['gender'] = htmlentities($_POST['gender']);
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $data = $mysqli->creator('doctor',$_POST);
    if($data['error']){
      $_SESSION['dct']=$data['msg'];
      echo "<script> location.replace('adddoctor.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
        if($data['selectdata']['roles']== 'SUPERADMIN'){
          echo "<script> location.replace('$baseurl/dashboard/admin.php')</script>";
        }elseif ($data['selectdata']['roles']== 'ADMIN'){
          echo "<script> location.replace('$baseurl/dashboard/admin.php')</script>";
        }
        $_SESSION['dct']="<p class='h3 text-success text-center justify-content-center mx-auto'>Doctor Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
      }
    }
}



// Update Doctor

if(isset($_POST['update_doctor'])){
  unset($_POST['update_doctor']);
  unset($_POST['name']);
  $id = $_POST['id'];
  unset($_POST['id']);
  $_POST['father_name'] = htmlentities(ucwords($_POST['father_name']));
  $_POST['mother_name'] = htmlentities(ucwords($_POST['mother_name']));
  $_POST['qualification'] = htmlentities(ucwords($_POST['qualification']));
  $_POST['gratuated_from'] = htmlentities(ucwords($_POST['gratuated_from']));
  $_POST['gender'] = htmlentities($_POST['gender']);


  
      $_POST['modified_by'] = $user['id'];
      $_POST['modified_at'] = date('Y-m-d H:i:s');


    $data = $mysqli->updator('doctor',$_POST,"id=$id");
    if($data['error']){
      $_SESSION['dct']=$data['msg'];
      echo "<script> location.replace('adddoctor.php?doctorid=$id')</script>";
      
    }else{
      if($data['updated']=='saved'){
        if($data['selectdata']['roles']== 'SUPERADMIN'){
          echo "<script> location.replace('$baseurl/dashboard/doctor.php')</script>";
        }elseif ($data['selectdata']['roles']== 'ADMIN'){
          echo "<script> location.replace('$baseurl/dashboard/doctor.php')</script>";
        }
        $_SESSION['dct']="<p class='h3 text-success text-center justify-content-center mx-auto'>Updated Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/profile.php?doctorid=$id')</script>";
      }
    }
}

// Add department

if(isset($_POST['dept_form'])){
  unset($_POST['dept_form']);

  $_POST['name'] = htmlentities(ucwords($_POST['name']));
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $data = $mysqli->creator('department',$_POST);
    if($data['error']){
      $_SESSION['dept']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/categories.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
          echo "<script> location.replace('$baseurl/pages/categories.php')</script>";      
        $_SESSION['dept']="<p class='h3 text-success text-center justify-content-center mx-auto'>Department Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
      }
    }
}



// Add Designation

if(isset($_POST['add_degi'])){
  unset($_POST['add_degi']);

  $_POST['designation_name'] = htmlentities(ucwords($_POST['designation_name']));
  $_POST['base_salary'] = htmlentities(ucwords($_POST['base_salary']));
  $_POST['bounus_by_percent'] = htmlentities(ucwords($_POST['bounus_by_percent']));
  $_POST['total_bounus'] = htmlentities(ucwords($_POST['total_bounus']));
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $data = $mysqli->creator('designation',$_POST);
    if($data['error']){
      $_SESSION['degi']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/categories.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
          echo "<script> location.replace('$baseurl/pages/categories.php')</script>";      
        $_SESSION['degi']="<p class='h3 text-success text-center justify-content-center mx-auto'>Designation Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
      }
    }
}


// Add Room

if(isset($_POST['add_room'])){
  unset($_POST['add_room']);

 
  $_POST['room_no'] = htmlentities(ucwords($_POST['room_no']));
  $_POST['floor'] = htmlentities(ucwords($_POST['floor']));
  $_POST['details'] = htmlentities(ucwords($_POST['details']));
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $data = $mysqli->creator('room',$_POST);
    if($data['error']){
      $_SESSION['room']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/categories.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
          echo "<script> location.replace('$baseurl/pages/categories.php')</script>";      
        $_SESSION['room']="<p class='h3 text-success text-center justify-content-center mx-auto'>Room Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
      }
    }
}


// Add Service

if(isset($_POST['add_service'])){
  unset($_POST['add_service']);

  $_POST['service_name'] = htmlentities(ucwords($_POST['service_name']));
  $_POST['rate'] = htmlentities(ucwords($_POST['rate']));
  $_POST['condition_on'] = htmlentities(ucwords($_POST['condition_on']));
  $_POST['description'] = htmlentities(ucwords($_POST['description']));
  $_POST['duration'] = htmlentities(ucwords($_POST['duration']));
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $data = $mysqli->creator('service',$_POST);
    if($data['error']){
      $_SESSION['service']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/categories.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
          echo "<script> location.replace('$baseurl/pages/categories.php')</script>";      
        $_SESSION['service']="<p class='h3 text-success text-center justify-content-center mx-auto'>service Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
      }
    }
}


// Add Service Rate

if(isset($_POST['add_service_rate'])){
  unset($_POST['add_service_rate']);

  $_POST['service_name'] = htmlentities(ucwords($_POST['service_name']));
  $_POST['rate'] = htmlentities(ucwords($_POST['rate']));
    if($user){
      $_POST['created_by'] = $user['id'];
    }
    $data = $mysqli->creator('rate',$_POST);
    if($data['error']){
      $_SESSION['rate']=$data['msg'];
      echo "<script> location.replace('$baseurl/pages/categories.php')</script>";
      
    }else{
      if($data['msg']=='saved'){
          echo "<script> location.replace('$baseurl/pages/categories.php')</script>";      
        $_SESSION['rate']="<p class='h3 text-success text-center justify-content-center mx-auto'>rate Added Successfully</p>";
        echo "<script> location.replace('$baseurl/pages/doctor.php')</script>";
      }
    }
}
