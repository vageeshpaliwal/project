<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
include('db.php');

$sql="SELECT * FROM user WHERE status='0'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
    echo json_encode($output);

}
else{
    echo json_encode(['meassge'=>'no record found','status'=>false]);
}

?>