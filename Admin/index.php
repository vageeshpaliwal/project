<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Methods: *");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include('../db.php');
include('../functions.php');

    
$data = json_decode(file_get_contents("php://input"), true);
$admin_code=$data['admin_code'];
$admintoken=$data['token'];
// echo $emp_code;
// echo $usertoken;

$tokensql="SELECT  tokens FROM admin_data WHERE admin_code='$admin_code'";
$tokenres=mysqli_query($con,$tokensql) or die("query failed");
if(mysqli_num_rows($tokenres)>0)
{
    $output= mysqli_fetch_all($tokenres,MYSQLI_ASSOC);
    $dtoken = $output[0]['tokens'];
    
}
else{
    echo json_encode(['message'=>'token not found','status'=>false]);
}
if($admintoken===$dtoken)
{
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method)
    {
        case "POST":
            $data=json_decode(file_get_contents("php://input"),true);
            $code=$data["employeecode"];
            $search_value=$data['search'];
            $status=$data['status'];
            
             // admin search user by name
            if($search_value!="")
            {
                $sql="SELECT * from user WHERE firstname  LIKE '%{$search_value}%' && status='1'";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    $output=mysqli_fetch_all($res , MYSQLI_ASSOC);
                    echo json_encode($output);
                } else {
                    echo json_encode(['message' => 'No Search Found', 'status' => false]);
                }

            }
            //admin search user by employee code
            if($code!="")
            {
                $sql="SELECT user.employeecode,user.firstName,user.lastName,attendence.signInTime,attendence.signOutTime,attendence.totalhours,attendence.Date FROM user JOIN attendence ON user.employeecode=attendence.employeecode WHERE user.employeecode='{$code}' && user.status='1'";
                $result=mysqli_query($con,$sql) or die("query failed");
                if(mysqli_num_rows($result)>0)
                {
                    
                        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        echo json_encode($output);
                        break;
                }
                else {
                    echo json_encode(['message' => 'No  match Found', 'status' => false]);
                }
            }
            //admin fetch usr who has status 0 

            if($status=='0')
            {
                $sql= "SELECT email, employeecode,firstname, lastname, status from user WHERE status='0'";
                $res=mysqli_query($con,$sql) or die("query failed");
                if(mysqli_num_rows($res)>0)
                {
                    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
                    echo json_encode($output);
                    break;
                } 
                else {
                    echo json_encode(['message' => 'RECORD DOES NOT  Found', 'status' => false]);
                }
            }
            if($status=='1')
            {
                $sql= "SELECT email, employeecode,firstname, lastname, status from user WHERE status='1'";
                $res=mysqli_query($con,$sql) or die("query failed");
                if(mysqli_num_rows($res)>0)
                {
                    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
                    echo json_encode($output);
                    break;
                } 
                else {
                    echo json_encode(['message' => 'RECORD DOES NOT  Found', 'status' => false]);
                }
            }
            break;
            //admin update self details
            case "PUT":
                $data = json_decode(file_get_contents("php://input"), true);
                $admin_email=$data['admin_email'];
                $admin_password=$data['admin_password'];
                $admin_name=$data['admin_name'];
                $admin_code=$data['admin_code'];

                if($admin_email!="" && $admin_password!="" && $admin_name!="" && $admin_code!="")
                {
                    $sql="UPDATE admin_data SET admin_email='$admin_email',admin_password='$admin_password' ,admin_name='$admin_name' WHERE admin_code='$admin_code' ";
                    $res=mysqli_query($con,$sql) or die("query failed");
                    if($res)
                    {
                        echo json_encode(['message' => 'Data Updated Successfully', 'status' => true]);
                    } 
                    else {
                        echo json_encode(['message' => 'No Record Updated', 'status' => false]);
                    }
                }
                // make user status active after delet the user
                $code=$data['employeecode'];
                $status=$data['status'];
                 if($code !="" && $status!="")

                {
                    if($status=="0")
                    {
                        $sql=" UPDATE user SET status='1' WHERE employeecode='$code'";
                        if (mysqli_query($con, $sql)) {
                            echo json_encode(['message' => 'Data Updated Successfully', 'status' => true]);
                        } else {
                            echo json_encode(['message' => 'No Record Updated', 'status' => false]);
                        }
                    } else {
                        echo json_encode(['message' => 'User already activated', 'status' => false]);
                    }
                    
                }
                break;
                case "DELETE":
                    $data=json_decode(file_get_contents("php://input"),true);
                    $employee_code=$data['employeecode'];
                    if($employee_code!="")
                    {
                    
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
                    }
                    break;


                                    

    }
}

    
?>