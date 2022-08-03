<?php
 include '../db.php';
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin:*');
 header('Access-Control-Allow-Methods:POST');
 header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');
 include '../functions.php';

$admin=json_decode(file_get_contents("php://input"),true);

$admin_email=($admin['admin_email']);
$admin_password=($admin['admin_password']);

$admin_name=($admin['admin_name']);
$admin_code=$admin['admin_code'];
$token=encode($admin_code,$admin_password);

$sql="INSERT INTO admin_data (admin_email,admin_password,admin_name,admin_code,tokens)VALUES('{$admin_email}','{$admin_password}','{$admin_name}','{$admin_code}','{$token}')";
$query=mysqli_query($con,$sql) or die("sql query failed");
if($query)
{
echo json_encode(array('meaasge'=>'data inserterd successfully','status'=>true));
}
else{
    echo json_encode(array('meaasge'=>'data  not inserterd successfully','status'=>false));
}



?>