


<?php
  session_start();
  if(isset($_SESSION['role']))
  {
  
    header("location:admin_index.php");
  }
 
    
  


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
           
        }


        .main{
            background: #fff;
            width: 30%;
            margin:40px auto;
       
           
            display: flex;
           
            border-radius: 4px;
            box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
            padding: 40px;
           
        }
        form{
            margin-left:50px;
  
        }
        .fw{
           
            font-weight: 700;
        }
        .link{
            
            margin-top:15px;
            
        }
        form label{
            font-weight:500;
        }
      
     
    </style>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login world!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  
    
    <script>

        $(document).ready(function(){

           

            $('#click').click(function(){
                //    e.preventDefault();
               
                var employeecode=$('#employeecode').val();
                var password=$('#pwd').val();
                if(employeecode=="" || password=="")
                {
                    alert("yo must fill all details");
                    return false;

                }
                else
                {
                    var all={};
                    all.employeecode=employeecode;
                    all.password=password;
                    //console.log(all);

                $.ajax({

                        
                        url:"http://localhost/Vageesh_Paliwal_task/api/User/user_login.php",
                        type:"POST",
                        dataType:"JSON",
                        data:JSON.stringify(all),
                        contentType:"application/json",
                        success:function(result)
                        {


                            //console.log(result);
                            if(!result){
                                alert("no found");

                            }
                            else{
                                //alert(all);
                            // console.log(result);
                            var status=result.status;
                            // var role=result.role;
                            }
                            if(status==true){
                                //console.log(all);
                               window.location="admin_index.php";
                            }
                            else{
                                alert("both are incorect")
                            }
                               

                        

                        }
                     
                    });
                }
            });
            

            
       
        
        });
        
    </script>
    </head>
    <body> 
                <div class="main">
                    <!-- //<input type="text" id="r" value="<?php echo $_SESSION['role'];?>"hidden> -->
                    <form id="form" method="post">
                        <h4 class="fw">Login<hr></h4>
                    <div class="mb-3">
                        <label for="email">Employeecode:</label>
                        <input type="text" class="form-control mt-2"  name="employeecode"id="employeecode" placeholder="Enter email"autocomplete="off">
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control mt-2" name="password" id="pwd" placeholder="Enter password" name="password" autocomplete="off">
                    </div>
                 
                  
                        <div class="link">
                        <button type="button" id="click"  name="submit" class="btn btn-primary mb-3">login</button>
                            <h6>Not a Member?<a href="Register.php">Register yourself</a><h6>
                        </div>
                     </form>
            </div>






   

</body>

  
</html>