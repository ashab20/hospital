<?php
session_start();
require_once('../lib/Crud.php'); 

$mysqli = new Crud();


if(isset($_SESSION['userdata'])){
  $user = $_SESSION['userdata'];
}else{
header("location:http://localhost/hospital/pages/login.php");

}

// *** Depertment Data ***

if(isset($_GET['department'])){
    $department_id= $_GET['department'];
  
    $data = $mysqli->custome_query("select doctor.id, user.name from doctor join user on user.id=doctor.user_id where doctor.department_id=$department_id");
    if($data['numrows'] > 0){
      $value="<option value=''>Select Doctor</option>";
	  foreach($data['selectdata'] as $d){
		  $value.="<option value='".$d['id']."'>".$d['name']."</option>";
	  }
    }else{
      $value="<option value=''>No Doctor Found</option>";
    }
	
	echo json_encode(array('msg'=>$value));
    
}




// user shift data
if(isset($_GET['time'])){
    $timeid= $_GET['time'];
  
    $data = $mysqli->custome_query("select doctor.shift,doctor.visit_fee, user.id from doctor join user on user.id=doctor.user_id where doctor.user_id=$timeid");
    if($data['numrows'] > 0){
    $value=$data['selectdata'];
	  foreach($data['selectdata'] as $data){
      $fees = $data["visit_fee"];
        switch ($data['shift']) {
            case 'MORNING':
                $time = '7:00AM-3:00PM';
                break;
            
            case 'EVENING':
                $time = "3:00AM-11:00PM";
                break;
            
            case 'NIGHT':
                $time = '11:00PM-8:00AM';
                break;
            
            default:
            $time = '3:00AM-11:00PM';
                break;
        }
        
      }
      $value = ["fees"=>floatval($fees),"time"=>trim($time,"'") ];
    }else{
      $value ="";
    }
	
	echo json_encode($value);
    
}



if(isset($_GET['rate'])){
  $service_id= $_GET['rate'];

  $data = $mysqli->custome_query("select doctor.id, user.name from doctor join user on user.id=doctor.user_id where doctor.department_id=$department_id");
  if($data['numrows'] > 0){
    $value="<option value=''>Select Doctor</option>";
  foreach($data['selectdata'] as $data){
    $value.="<option value='".$data['id']."'>".$data['name']."</option>";
  }
  }else{
    $value="<option value=''>No Doctor Found</option>";
  }

echo json_encode(array('msg'=>$value));
  
}



?>