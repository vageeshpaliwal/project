<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Allow-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");
include('../db.php');
include('../functions.php');

session_start();
if(isset($_SESSION['t']))
{
    $admincode = $_SESSION['code'];
    $token=$_SESSION['t'];
   
}  
$data = json_decode(file_get_contents("php://input"), true);
//$emp_code=$data['employeecode'];
//$token=$data['token'];


// echo $emp_code;
// echo $usertoken;

$tokensql="SELECT tokens , roles  FROM user WHERE employeecode='$admincode'";
$tokenres=mysqli_query($con,$tokensql) or die("query failed");
if(mysqli_num_rows($tokenres)>0)
{
    $output = mysqli_fetch_assoc($tokenres);
    $dtoken = $output['tokens'];
    $role=$output['roles'];



    //echo json_encode(['tokens'=>$dtoken,'role'=>$role,'status'=> true]);
}
else{
    echo json_encode(['message'=>'token not found','status'=>false]);
   
}
if($dtoken==$token)
{
    $method = $_SERVER['REQUEST_METHOD'];
   
    if($role==0)
    { 
       
        switch($method)
        {
            case "POST":
                $data = json_decode(file_get_contents("php://input"), true);
                $signin=$data['signIn'];
              
                $employee_code=$data['employeecode'];

                $employee_code=mysqli_real_escape_string($con,$employee_code);
           

                 /*USER FETCHNG ATTENDECNCE CODE*/
            
                 if(!empty($employee_code) && $signin=='0')
                 {
                     $readdata="SELECT  user.email,user.employeecode,user.firstname,user.lastname,attendence.signInTime,attendence.signOutTime,attendence.totalhours,attendence.Date,attendence.attendence FROM user JOIN attendence ON user.employeecode =attendence.employeecode WHERE user.employeecode ='{$employee_code}' && user.stat='1'";
                     $query=mysqli_query($con,$readdata) or die("sql qery failed");
                     if(mysqli_num_rows($query)>0)
                     {
                         $output=mysqli_fetch_all($query, MYSQLI_ASSOC);
                         echo json_encode($output);
                         break;
 
                     }
                     else{
                         echo json_encode(array('meassge'=>'no record found.','status'=>false));
                     }
                 }

                /* ********** ATTENDENCE INSERTION ***** */
               
                $date=date("Y-m-d");
                $signin=trim($data['signIn']);
                $signin=mysqli_real_escape_string($con,$signin);
                if(isset($signin) && !empty($signin))
                {
                    
                    
                   
                    $token=encode($employee_code,$password);
                    if($employee_code!=""  && $signin!="" )
                    {
                        $se="SELECT * from attendence where employeecode='$employee_code' && date='$date'";
                        $s=mysqli_query($con,$se) or die("query is not working");
                        if(mysqli_num_rows($s)>0)
                        {
                            echo json_encode(array('message'=>'data not inserted','status'=>true));
                            break;
        
                        }
                        else{
                            $sql="INSERT INTO attendence(employeecode,signInTime,date)VALUES('{$employee_code}','{$signin}','{$date}')";
                            $q=mysqli_query($con,$sql) or die("query is not working");
                            if($q)
                            { 
                                echo json_encode(array('message'=>'data inserted','status'=>true));
                                break;
                            }
                            else{
                                echo json_encode(array('message'=>'data  not inserted','status'=>false));
                            }
                        }
                    
                    }
                }

                
               
            
               
                break;
                    /*update details for user */

                case 'PUT':
                    $data=json_decode(file_get_contents("php://input"),true);
                    $employee_code=$data['employeecode'];
                    $signout=$data["signOut"];
                  
                    if(isset($signout) && !empty($signout))
                    {
                        $date=date("Y-m-d");
                        $signoutTime=$signout;
                        $employee_code=$employee_code;
                        $t_fecth="SELECT signInTime  FROM attendence WHERE employeecode='$employee_code' &&  Date ='$date'";
                        $res=mysqli_query($con,$t_fecth);
                        if(mysqli_num_rows($res)>0)
                        {
                            $output= mysqli_fetch_assoc($res);
                            $signin=$output['signInTime'];
                        }
                     
                        $totalhours=total_hours($signin,$signoutTime);

                        
                        $employee_code=mysqli_real_escape_string($con,$employee_code);
                        $signoutTime=mysqli_real_escape_string($con,$signoutTime);
    
                        if($employee_code!="" && $signoutTime!="" )
                        {
                            $qu="UPDATE attendence SET signOutTime= '{$signoutTime}',totalhours='{$totalhours}' WHERE employeecode='{$employee_code}' &&  date='$date'";
                            $update= mysqli_query($con,$qu)or die("query is not working");
                            if($update)
                            {
                                echo json_encode(array('message'=>'data  updated succssfully','status'=>true));
                                $t_fecth="SELECT signOutTime  FROM attendence WHERE employeecode='$employee_code' &&  Date ='$date'";
                                    $res=mysqli_query($con,$t_fecth);
                                    if(mysqli_num_rows($res)>0)
                                    {
                                        $output= mysqli_fetch_assoc($res);
                                        $signout=$output['signOutTime'];
                                    }
                                    if($signout="")
                                    {
                                        $absent="UPDATE attendence SET atendence= 'absent' WHERE employeecode='{$employee_code}' &&  date='$date'";
                                        $res=mysqli_query($con,$absent);
                                        if($res)
                                        {
                                            echo json_encode(array('message'=>'attendence absent  succssfully','status'=>true));
                                        }

                                    }
                                    else{
                                        $present="UPDATE attendence SET attendence= 'present' WHERE employeecode='{$employee_code}' &&  date='$date'";
                                        $res=mysqli_query($con,$present);
                                        if($res)
                                        {
                                            echo json_encode(array('message'=>'attendence present  succssfully','status'=>false));
                                        }
                                    }

                                
                                break;
                            }
                            else{
                                echo json_encode(array('message'=>'data not update','status'=>true));
                            }
                        
                        }

                        
                    }

                    $email=$data['email'];
                    $password_=$data['password'];
                    $emp_code=$data['employeecode'];
                    $firstname=$data['firstname'];
                    $lastname=$data['lastname'];
                    $email = mysqli_real_escape_string($con, $email);
                    $password_ = mysqli_real_escape_string($con, $password_);
                    $firstname = mysqli_real_escape_string($con, $firstname);
                    $lastname = mysqli_real_escape_string($con, $lastname);
                    if($email!="" && $password_!="" && $firstname!="" && $lastname!="" )
                    {
                        $sql="UPDATE user  SET email='$email',password='$password_',firstName='$firstname',lastName='$lastname' WHERE employeecode='$emp_code'";
                        if (mysqli_query($con, $sql)) {
                            echo json_encode(['message' => 'Data Updated Successfully', 'status' => true]);
                        } else {
                            echo json_encode(['message' => 'No Record Updated', 'status' => false]);
                        }
                    } 
                    else {
                        echo json_encode(['message' => 'No Record Found', 'status' => false]);
                    }
                    break;
                default:
                echo json_encode(['message' => 'not vaild method', 'status' => false]);
                break;
        }
    }
//************************************* */ admin coding area*******************************************
    elseif($role=='1')
    {
        
        switch($method)
        {
        case "GET":
           
            //admin fetch usr who has status 0 

            if(isset($_GET['stat']) && $_GET['stat']==0)
            {
                $sql= "SELECT email, employeecode,firstname, lastname, stat from user WHERE stat='0'";
                $res=mysqli_query($con,$sql) or die("query failed");
                if(mysqli_num_rows($res)>0)
                {
                    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
                    echo json_encode($output);
                    break;
                } 
                else {
                    echo json_encode(['message' => 'RECORD DOES NOT Found', 'status' => false]);
                }
            }
            if(isset($_GET['stat']) && $_GET['stat']==1)
            {
                $sql= "SELECT email,employeecode,firstname, lastname, stat from user WHERE stat='1' && roles='0'";
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
             //admin search user by employee code
             if(isset($_GET['Attendence']) && $_GET['Attendence']=='present')
             {
               
                $sql= "SELECT user.email,user.employeecode,user.firstname,user.lastname,attendence.signInTime,attendence.signOutTime,attendence.totalhours,attendence.Date,attendence.Attendence FROM user JOIN attendence ON user.employeecode =attendence.employeecode WHERE attendence.Attendence='present'";
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
             if(isset($_GET['employeecode']) && !empty($_GET['employeecode']))
             {
               $employee_code=$_GET['employeecode'];
                $sql= "SELECT user.email,user.employeecode,user.firstname,user.lastname,attendence.signInTime,attendence.signOutTime,attendence.totalhours,attendence.Date,attendence.Attendence FROM user JOIN attendence ON user.employeecode=attendence.employeecode WHERE user.employeecode='$employee_code'";
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
            

            break;
       
        case "POST":
            $data=json_decode(file_get_contents("php://input"),true);
            //$code=$data["employeecode"];
                $search_value=$data['firstname'];
            //$status=$data['status'];
            
             // admin search user by name
            //if($search_value!="")
            // {
                $sql="SELECT email, employeecode,firstname, lastname from user WHERE employeecode ='$search_value'  && stat='1' && roles='0'";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    $output=mysqli_fetch_all($res , MYSQLI_ASSOC);
                    echo json_encode($output);
                    break;
                } else {
                    echo json_encode(['message' => 'No Search Found', 'status' => false]);
                }

            // }
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
                // make user status active after delete the user
                $code=$data['employeecode'];
                $status=$data['stat'];
                 if($code !="" && $status !="")

                {
                    if($status=="0")
                    {
                        $sql=" UPDATE user SET stat='1' WHERE employeecode='$code'";
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

                /****** make user  status 0 for soft delete************************************ */
                case "DELETE":
                    $data=json_decode(file_get_contents("php://input"),true);
                    $employee_code=$data['employeecode'];
                    $status=$data['status'];
                    if($employee_code!="" && $status!="")
                    {   
                        if($status=='1')
                        {
                    
                                $del="UPDATE user SET stat='0' WHERE employeecode='$employee_code'";
                                if(mysqli_query($con,$del))
                                {

                                    echo json_encode(['message'=>'record deleted','status'=>true]);

                                }
                                else
                                {
                                echo json_encode(['message'=>' no record deleted','status'=>false]);
                                }

                        }
                        else
                        {
                                echo json_encode(['message'=>'record already deleted','status'=>false]);
                        }
                    } 
                    else
                    {
                            echo json_encode(['message'=>'no record found','status'=>false]);
                    }
                    
                    break;


                                    

        }
    }
}
else
{
        echo json_encode(['message' => 'token not  found in this', 'status' => false]);
}

                



                        




    
















?>