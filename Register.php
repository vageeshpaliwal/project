<!doctype html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
       .container{
        font-family: 'Rubik', sans-serif;
        
       }
       .form1{
        font-weight:700;
       }
            
        .form{
            width:60%;
            transform:translate( 30% , 20%);
           
            padding:20px;
            box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
        }
        .btn{
            width:100%;
        }
       .form h3{
            font-weight:900;
        }
        .para{
            font-family: 'Rubik', sans-serif;
            text-align:center;
        }
    </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="form">
            <h3>Signup</h3><hr>
            <form class="form1">
                <div class="row">
                    <div class="col-6">

                        <div class="mb-3 mt-3">
                                    <label for="name">First Name:</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="Enter first Name" name="firstname">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 mt-3">
                            <label for="last name">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                            <div class="mb-3 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email addresses" name="email">
                            </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                        </div>
                    </div>
                
                </div>
                <div class="row">
                    <div class="col-6">

                            <div class="mb-3 mt-3">
                                    <label for="email">Confirm password</label>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Enter email addresses" name="confirm password">
                            </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 mt-3">
                            <label for="employeecode">Employee Code:</label>
                            <input type="text" class="form-control" id="employeecode" placeholder="Enter Password" name="employeecode">
                        </div>
                    </div>
                
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button  type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                    <h6 class=" mt-3 text-center">Already a Member <a href="login.php">Login </a></h6>
    </div>
            </form>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->




  </body>

  <script>
    $(document).ready(function(){
        $('#submit').click(function(e){
            e.preventDefault();
            var firstname=$('#firstname').val();
            var lastname=$('#lastname').val();
            var email=$('#email').val();
            var password=$('#password').val();
            var confirm_password=$('#confirm_password').val();
            var employeecode=$('#employeecode').val();

        if(firstname!="" && lastname!="" && email!="" && password!="" && confirm_password!="" && employeecode!="" )
        {
            if(password==confirm_password)
            {
                var details={};
                 details.firstname=firstname;
                 details.lastname=lastname;
                 details.email=email;
                 details.password=password;
                 details.employeecode=employeecode;
                 //console.log(details);
                 $.ajax({

                    type:"POST",
                    url:"http://localhost/Vageesh_Paliwal_task/api/user/insert.php",
                    dataType:"JSON",
                    data:JSON.stringify(details),
                    contentType:"application/json",
                    success:function(data){
                        console.log(data);
                        // alert("You successfully Regitered!!");
                        // if(alert)
                        // {
                        //     window.location="login.php";
                        // }
                      

                    }

                 });
            }
             
            else{
                alert( "password doesnt mathc");
            }
        }
        else{
            alert("you have fill all the field");
        }

        });

       



    });



  </script>
</html>