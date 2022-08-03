<?php
header('Content-Type:application/json');
header('Access-Control-Allow-origin:*');
include('db.php');
 $data=json_decode(file_get_contents("php://input"),true);
 
$emp_code=$data['employeecode'];
   
    $readdata="SELECT * FROM user JOIN attendence ON user.employeecode =attendence.employeecode WHERE user.employeecode ='{$emp_code}' && user.status='1'";
    $query=mysqli_query($con,$readdata) or die("sql qery failed");
    if(mysqli_num_rows($query)>0)
    {
        $output=mysqli_fetch_all($query, MYSQLI_ASSOC);
        echo json_encode($output);

    }
    else{
        echo json_encode(array('meassge'=>'no record found.','status'=>false));
    }

   

?>
