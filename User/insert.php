 <?php


include('../db.php');

header('Content-Type:application/json');
header('Access-Control-Allow-origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');
include('../functions.php');

   $data=json_decode(file_get_contents("php://input"),true);
 
 
    $email=$data['email'];
    $password_=md5($data['password']);
    $emp_code=$data['employeecode'];
    $firstname=$data['firstname'];
    $lastname=$data['lastname'];
  
    
  
    // $status=$data['status'];
    $email=mysqli_real_escape_string($con,$email);
    $password_=mysqli_real_escape_string($con,$password_);
    $emp_code=mysqli_real_escape_string($con,$emp_code);
    $firstname =mysqli_real_escape_string($con,$firstname);
    $lastname=mysqli_real_escape_string($con,$lastname);
    $token = encode($emp_code, $password_);


    if($email!="" && $password_!="" &&  $emp_code!="" && $firstname!="" && $lastname!=" " && $token!="")
    {
        if($emp_code<=100)
        {

        
            $sql="INSERT INTO user(email,password,employeecode ,firstname,lastname,tokens,status,type)VALUES('{$email}','{$password_}','{$emp_code}','{$firstname}','{$lastname}','{$token}','1','1')";
            $result=mysqli_query($con,$sql) or die("sql query failed");
            if($result)
            {
                echo json_encode(array('message'=>'data inserted','status'=>true));
            }
            else{

            echo json_encode(array('message'=>'data  not inserted','status'=>false));
            }
        }
        else if($emp_code>100)
        {
            $sql="INSERT INTO user(email,password,employeecode ,firstname,lastname,tokens,status,type)VALUES('{$email}','{$password_}','{$emp_code}','{$firstname}','{$lastname}','{$token}','1' ,'0')";
            $result=mysqli_query($con,$sql) or die("sql query failed");
            if($result)
            {
                echo json_encode(array('message'=>'data inserted','status'=>true));
            }
            else{

            echo json_encode(array('message'=>'data  not inserted','status'=>false));
            }

        }
    }
    
   
  

   

?>

