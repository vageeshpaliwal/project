<?php
include('db.php');
header('Content-Type:application/json');
header('Access-Control-Allow-origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');


   $data=json_decode(file_get_contents("php://input"),true);



   $signin=$data['signIN'];
   $employee_code=$data['employeecode'];
   $signout=$data['signOut'];
   if(isset($signin))
   {
    $employee_code=$employee_code;
    $signinTime=$signin;
    $date=date("Y-m-d");
    $sql="INSERT INTO attendence(employeecode,signInTime,date)VALUES('{$employee_code}','{$signinTime}','{$date}')";
    $q=mysqli_query($con,$sql) or die("query is not working");
    if($q)
    { 
        echo json_encode(array('message'=>'data inserted','status'=>true));
    }
    else{
        echo json_encode(array('message'=>'data  not inserted','status'=>false));
    }
   }

   if(isset($signout))
   {
    $signoutTime=$signout;
    $employee_code=$employee_code;
    $totalhours="not";
    $qu="UPDATE attendence SET signOutTime= '{$signoutTime}',totalhours='{$totalhours}' WHERE employeecode='{$employee_code}' ";
     $update= mysqli_query($con,$qu)or die("query is not working");
    if($update)
    {
        echo json_encode(array('message'=>'data succssfully','status'=>true));
    }
    else{
        echo json_encode(array('message'=>'data not update','status'=>true));
    }
   }
   









?>