<?php
include('../db.php');
session_start();


header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Allow-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

$data=json_decode(file_get_contents("php://input"),true);

 //echo ($data);

$password=$data["password"];
$emp_code=$data["employeecode"];
//$status=$data['stat'];
 
 $sql="SELECT * FROM user WHERE employeecode='{$emp_code}' &&  password='{$password}'";
 $res=mysqli_query($con,$sql) or die("query failed");
 if(mysqli_num_rows($res)>0)
 {
    $output=mysqli_fetch_assoc($res);
    
    //$token=$output['tokens'];
   
    $_SESSION['role']=$output['roles']; 
    $_SESSION['firstname']=$output['firstname'];
    $_SESSION['t']=$output['tokens'];
  
    $_SESSION['code']=$output['employeecode'];


    $code=$output['employeecode'];
    $pass=$output['password']; 
    $st=$output['stat'];
    // echo json_encode(['token'=>$_SESSION['tokens'],'role'=> $_SESSION['role'],'status'=> true]);

    if($emp_code==$code && $password==$pass && $st==1)
    {
   
      echo json_encode(['message' => 'login successfully', 'status' => true]);   
    }
    else{
      echo json_encode(['message' => 'Invalid User of ths role', 'status' => false]);
    }
 }

else
 {
    echo json_encode(['message' => 'Invalid User', 'status' => false]);
}
    





?>