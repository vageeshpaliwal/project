<?php

include('db.php');
header('Content-Type:application/json');
header('Access-Control-Allow-origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');



$data=json_decode(file_get_contents("php://input"),true);
$employee_code=$data['employeecode'];
echo $employee_code;
$sql="SELECT * FROM user where employeecode ='{$employee_code}' ";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
   
    if($output[0]['status']=='1')
    {
        $del="UPDATE user SET status='0' WHERE employeecode='$employee_code'";
        if(mysqli_query($con,$del)){

            echo json_encode(['message'=>'record deleted','status'=>true]);

        }
        else{
           echo json_encode(['message'=>' no record deleted','status'=>false]);
        }

    }
    else{
        echo json_encode(['message'=>'record already deleted','status'=>false]);
    }
}
else{
    echo json_encode(['message'=>'no record found','status'=>false]);
}
?>