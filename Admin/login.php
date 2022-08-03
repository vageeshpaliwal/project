<?php
include('../db.php');
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Allow-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

$data=json_decode(file_get_contents("php://input"),true);

// echo ($data);

$password=$data["admin_password"];
$emp_code=$data["admin_code"];
 
 $sql="SELECT * FROM admin_data WHERE admin_code='{$emp_code}' ";
 $res=mysqli_query($con,$sql) or die("query failed");
 if(mysqli_num_rows($res)>0)
 {
    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $code=$output[0]['admin_code'];
    $pass=$output[0]['admin_password'];  
    $dtoken=$output[0]['tokens']; 
   
 }
 echo $dtoken;
 if($emp_code==$code && $password==$pass)
 {
    echo json_encode(['token'=>$dtoken,'status'=> true]);

 }
else
 {
    echo json_encode(['message' => 'Invalid User', 'status' => false]);
}
    





?>