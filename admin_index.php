

<?php
session_start();


if($_SESSION['role']!= "" || $_SESSION['firstname']!= "" || $_SESSION['t']!= "") {
  // echo $_SESSION['role'];
  // echo $_SESSION['firstname'];
  // echo $_SESSION['t'];
  // $role= $_SESSION['role'];
  
} else {
  header("location:login.php");
 
}
// if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']!=="" ){
//     echo $_SESSION['ADMIN'];

// }else{
//     echo "No";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>admin_idex</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="/main/ajax.js" type="text/javascript"></script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<style>

   
    .dropdown{
    
      left:75%;
      display:flex;
    }
    .dropdown-menu{
      margin-top:10px;

      margin-left:28px;
      border-radius:10px;
    }

    .search_user{
      display:flex;
    }
    .search_user input{
        width:40%;
        margin-left:25%;
        border-radius:80px 20px 20px  80px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        display:flex;
        
    }
    .search_user button{
      width:80px;
      border-radius:0px 20px 20px  0px;
      border:none;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
      background-color:#d9dad7;
    }
    .active_usr{
      text-align:center;
      border-radius:20px;
        background-color:#d9dad7;
         width:20%; 
         margin-left:15%;
         height:200px;
    }
   
  .deactive_usr {
        text-align:center;
        border-radius:20px;
         background-color:#e2ded3;
         width:20%; 
         margin-left:50px;
         height:200px;

         }
  .eactive_usr{
          border-radius:20px;
          text-align:center;
          background-color:#FFEFD5;
         width:20%; 
         margin-left:50px;
         height:200px;

         }
  h3{
          font-weight:350;
          font-size:20px;
          margin-top:10px;
         }
         
        
         .btn{
          margin-left:5%;
          font-weight:500;
          background-color:#dde0ab;
         }
         .b1{
          background-color:#7fa99b;
          margin-left:5%;
         }
         .b2{
          margin-left:5%;
          background-color:#dfd3c3;
         }
         .name{
          margin-left:35px;
        color:black;
         }
         .form{
          margin-top:20px;
         }
         .modal{
          margin-left:40px;
          width:100%;
         }
         .m{
          width:100%;
         }
         .con{
          width: 80%;
          margin-top:10px;
          background-color:#F5F5F5;;
          margin-left:10%;
          
          box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
          border-radius:20px 20px 20px 20px;
         }
         .t{
         padding: 50px;
          text-align:center;
          margin-left:15%;
          margin-top:20px;
          width:70%;
         }
         .b5{
          background-color:#dfd3c3;
          width:80px;
          height:40px;
          font-weight:400;
          border:none;
          border-radius:4px 4px 4px 4px ;
          
          
         }
         .img{
          margin-left:3px;
          width:40px;
          height:30px;
          color:white;
         }
         .box{
          margin-bottom:20px;
          
          display:flex;
        
         }
         .container-fluid{
          width:100%;
         }



         .attendence_section{
          margin-top:120px;
          display:flex;
          margin-left:20%;
         
          width:60%;
          height:250px;

         }
         .mark_attendence{

          width:40%;
          margin-left:45px;
          border-radius:20px;
          background-color:#D3D3D3;
          padding:10px;
         }
         .work_hour_detais{
          margin-left:40px;
          width:40%;
          border-radius:20px;
          background-color:#D3D3D3;
          text-align:center;
          font-weight:200;
         }
         .date{
          margin-left:15px;
         }
         .term{
          margin-left:75px;
          
         }
        strong{
          margin-left:130px;
          text-align:center:
          font-weight:200;
        }
        #stopwatch{
        padding:20px;
        margin-left:40%;
        background-color:green;
        width:30%;

        }
        h5{
          font-weight:600;
          margin-top:20px;
        }
        .bt{
          background-color: #A9A9A9;
          border:none;
          font-weight:600;
          width:80%;
          height:35px;
          margin-left:20px;
          margin-top:50px;
          border-radius:40px;
          color:white;
          box-shadow:
       
        }
        .take_button{
          display:flex;
        }
        .signin{
          width:50%;
          margin-left:px;
       
        }
        
        .signout{
          width:50%;
       
        
        }
       
    </style>
</head>
<body>
  




<div class="container-fluid" id="admin">
    <div class="container-fluid">
      
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    
        <a class="navbar-brand" href="#"> Admin Dashboard</a>
      
      
            <div class="dropdown">
            
                <button type="button" class="btn button dropdown" data-bs-toggle="dropdown">
                <img src="iv.png" class="img">
                </button>
                <ul class="dropdown-menu">
                <h5  class="name">Hi     <?php echo $_SESSION['firstname'] ?></h5>
                  <li><a class="dropdown-item" href="#">
                   View Profile</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  <li><a class="dropdown-item" href="#">Edit Profile </a></li>
                </ul>
              </div>
        </nav>
    </div>
    <!------ search section----------------------------------------------------------->
    <form class="form">
        <div class="search_user mb-5">
          <input class="form-control me-2" type="text"  id="search_value" placeholder="Search" aria-label="Search" autocomplete="off">
          <button type="submit" id="id" >search</button>
        </div>
    </form>

    <input type="text" id="r" value="<?php  echo $_SESSION['role'];?> " hidden>
<!--------- registerd emloyee and  deactivate user section----------->
    <div class="box">
          <div class="active_usr">
         
            <h3>Active user</h3><hr>
            <p id="active"></p>
            <button class="b1 btn mt-4" id="active_user">Show</button>
          </div>
          <div class="deactive_usr">

              <h3>deleted user</h3><hr>
              <button class=" b2 btn mt-4" id="inactive_user">Show</button>
          </div>
          <div class="eactive_usr">
            <h3>Present employee</h3><hr>
            <button class=" b2 btn mt-4" id="present">Show</button>
          </div>
    </div>
<!-- modal section----------------------------------------------------------------- -->
    <div class="modal" id="single_user_data">
      <div class=" m modal-dialog  modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Attendence</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
                <div class="container-fluid">
                                <div class="table-responsive">
                                    <table id="single_data" class="table table-bordered">
                                       
                                    </table>
                                </div>
                            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
</div>
<div id="user">

  <div class="container-fuild">
  
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    
        <a class="navbar-brand" href="#">User Dasboard</a>
      
      
            <div class="dropdown">
            
                <button type="button" class="btn button dropdown" data-bs-toggle="dropdown">
                <img src="iv.png" class="img">
                </button>
                <ul class="dropdown-menu">
                <h6 class="name" >Hi<?php echo $_SESSION['firstname'] ?></h6><hr>
                  <li><a class="dropdown-item" href="#">View Profile
               </a></li>
                  <li><a class="dropdown-item" href="" id="show_attendence">Show Attendence</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </div>
        </nav>
  </div>

<!----------------------------------atttendence div and time date------------------>
  <div class="attendence_section">
        <div class="mark_attendence">
          
          <strong class="term">
            <?php 
                    date_default_timezone_set("Asia/Kolkata");
                    $date=date('d-m-y');
                    echo $date;
            ?>
            <?php
                $time=date('h:i:s A') ;
                echo " &nbsp  |  &nbsp"  .$time;
            ?>
            </strong><br>
            <strong>
            <?php
            $day = date("l");
  
              echo   $day;
          ?>
          </strong><hr> 
          <br>
<!-------------------------signin and signout button---------------->
          <div class="take_button">

              <div class="signin"><button class="bt shadow" id="signIn"  onclick="start(true)">SignIn</button></div>
              <div class="signout"><button class="bt shadow" id="signOut" onclick="pause()">SignOut</button></div>
              <input type="text" value="<?php  echo $time ?>" id="time" hidden>
              <input type="text" value="<?php  echo $_SESSION['code'] ?>" id="employeecode" hidden>
          </div>
         
        </div>
        <div class="work_hour_detais">
          <!-- <h5>Timer</h5> -->
          <!-- <div id="stopwatch">00:00:00</div> -->
          
        </div>





  </div>
</div>


<!------------------------data display in table---------------------------------------->
<div class="con container">
            <div class="table-responsive">
                <table id="display_data" class=" t table table-bordered">
                 
                </table>
            </div>
            <div class=" table-responsive">
                <table id="disp_data" class="table table-bordered">
                 
                </table>
            </div>
            <div class="  table-responsive">
                <table id="by_search" class="table table-bordered">
                 
                </table>
            </div>
            <div class=" table-responsive">
                <table id="attend_table" class="table table-bordered">
                 
                </table>
            </div>
            <div class=" table-responsive">
                <table id="present_table" class="table table-bordered">
                 
                </table>
            </div>
</div>
</body>

</html>
<!----------------------------------------script code start-------------------------------->
<script>
//   $(document).ready(function() {
//  setInterval(runningTime, 1000);
// });

// function runningTime() {
//   $.ajax({
//     url: 'time.php',
//     success: function(data) {
//        $('.mark_attendence').html(data);
//      },
//   });
// }

$(document).ready(function()
{


 

var role=$('#r').val();
if(role==0){
  $('#admin').remove();
  $('#user').show();
}
else if(role==1)
{
$('#admin').add();
$('#user').remove();
}
// function loadactive()
  // {
  //   var emp_data = '';
            
  //   $('#display_data').empty();
  //   $.getJSON("http://localhost/Vageesh_Paliwal_task/api/User/index_user.php?status=1",
      
  //     function(data)
  //     {
  //       console.log(data);
  //       var emp_data=
  //       '<thead><tr>>th scope="col">email</th><th scope="col">employeecode</th><th scope="col">firstname</th><th scope="col"> lastname</th><th scope="colspan-3">action</th></tr></thead></tbody>';
          
  //       $.each(data, function(key,value){

  //         emp_data += '<tr><td>' + value.email + '</td><td>' + value.employeecode + '</td><td>' + value.firstname + '</td><td>' + value.lastname + '</td><td><button class="btn btn-info" id="show" data-id="' + value.employeeCode + '">Show</button></td><td><button class="btn btn-danger" id="delete" data-id="' + value.employeecode + '">Delete</button></td></tr></tbody>'

  //       });
        
  //     $('#display_data').html(emp_data);
  //     }
  //   );
  // }
  
  
  
  
//***********************active user code area********************** */
      $('#active_user').click(function(){
        //loadactive();
        $('#disp_data').hide();
        $('#display_data').fadeIn();
        $('#display_data').empty();
        $('#present_table').hide();
        


          $.ajax({
              url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php?stat=1",
              type:"GET",
              dataType:"JSON",
              contentType:"application/json",
              success:function(data)
              {
              // var response=JSON.parse(data);
              var length=data.length;
 
              var emp_data=" ";
              
              console.log(data);
            
                emp_data = '<thead class="table-success"><tr><th scope="col">Email</th><th scope="col">Employee Code</th><th scope="col">First Name</th><th scope="col">Last Name</th><th colspan="2">Action</th></tr></thead><tbody>';
                        $.each(data, function(key, value) {

                            emp_data+='<tr><td>' + value.email + '</td><td>' + value.employeecode + '</td><td>' + value.firstname + '</td><td>' + value.lastname + '</td><td><button class="b5" id="plus" data-id="' + value.employeecode + '">Show</button></td><td><button class="btn" id="delete" data-id="' + value.employeecode + '">Delete</button></td></tr></tbody>'
                        });
                        $('#display_data').append(emp_data);
                        $('#active').html(length);
                        

                  
             }
        });

      });

/**********************************deleted user fetch user area code*****************   */ 

$('#inactive_user').click(function(){
      $('#display_data').hide();
       $('#disp_data').show();
       $('#disp_data').empty();
       $('#present_table').hide();
       //$('#disp_data').toggle();
      $.ajax({
        type:"GET",
        url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php?stat=0",
        dataType:"JSON",
        ContentType:"application/json",
        success:function(data){
          //var res=JSON.parse(data);
            console.log(data);
            var emp_data='';
            emp_data = '<thead class="table-success"><tr><th scope="col">Email</th><th scope="col">Employee Code</th><th scope="col">First Name</th><th scope="col">Last Name</th><th colspan="2">Action</th></tr></thead><tbody>';
                        $.each(data, function(key, value) {

                            emp_data+='<tr><td>' + value.email + '</td><td>' + value.employeecode + '</td><td>' + value.firstname + '</td><td>' + value.lastname + '</td><td class="td"><button class="b5" id="activate" " data-id="' + value.employeecode +  '">activate</button></td></tr></tbody>';
                        });
                        $('#disp_data').append(emp_data);
        }

      });
});
/****************************************************fetch present employee************************ */
$('#present').click(function(){
  $('#display_data').hide();
  $('#disp_data').hide();
  $('#present_table').toggle();
  $('#present_table').empty();
 
 
  $.ajax({
           url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php?Attendence=present",
           type:"GET",
           dataType:"JSON",
           ContentType:"application/json",
           success:function(data){
            console.log(data);
            var length=data.length;
            emp_Data='<thead><tr><th scope="col">Date</th><th scope="col">Employee Code</th><th scope="col">First Name</th><th scope="col">Last Name</th><th scope="col">signInTime</th><th scope="col">signOutTime</th>           <th scope="col">totalhours</th><th>attendence</th> </tr></thead><tbody>';

      $.each(data, function(key, value) {

        emp_Data += '<tr><td>' + value.Date + '</td> <td>'+value.employeecode+ '</td><td>' + value.firstname + '</td><td>' +value.lastname+ '</td><td>' +value.signInTime+ '</td><td>' +value.signOutTime +'</td><td>' + value.totalhours+ '</td><td>'+value.Attendence+ '</td></tr></tbody>';
      });
      $('#present_table').append(emp_Data);

           }
  });
  

});
/*******************admin search user by its employee code******************** */  
$('#id').click(function(e){
  e.preventDefault();
  $('#by_search').show(); 
  $('.active_usr').hide();
  $('.deactive_usr').hide();
  $('.eactive_usr').hide();
  $('#disp_data').hide();
  $('#display_data').hide();
  $('#by_search').empty(); 

  var firstname=$('#search_value').val();

  var search={};
  search.firstname=firstname;


  if(firstname!="")
 {
  var search={};
  search.firstname=firstname;
  
    $.ajax({
      
      url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php",
      type:"POST",
      dataType:"json",
      data:JSON.stringify(search),
      ContentType:"application/json",
      success:function(data)
      {
        console.log(data);

        var emp_data='';

        emp_data = '<thead><tr><th scope="col">Email</th><th scope="col">Employee Code</th><th scope="col">First Name</th><th scope="col">Last Name</th><th scope="colspan-3">Action</th></tr></thead><tbody>';
                        $.each(data, function(key, value) {

                            emp_data+='<tr><td>' + value.email + '</td><td>' + value.employeecode + '</td><td>' + value.firstname + '</td><td>' + value.lastname + '</td><td><button class="btn btn-info" id="plus" data-id="' + value.employeecode + '">Show</button></td><td><button class="btn btn-danger" id="delete" data-id="' + value.employeecode + '">Delete</button></td></tr></tbody>'
                        });
                        $('#by_search').append(emp_data);
      }
    });
}
  else{
    alert( "you have to enter  name");  }
});
/*************admin show user attendence on clickshow****************************************************************/
$(document).on("click","#plus",function(){

  $('#single_user_data').modal('show');
  var id= $(this).data("id");
  console.log(id);
   var emp_Data='';
   $('#single_data').empty();
   $.ajax({

    url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php?employeecode="+id,
    type:"GET",
    dataType:"JSON",
    contentType:"application/json",
    success:function(data)
    {
      console.log(data);
      
      emp_Data='<thead><tr><th scope="col">Date</th><th scope="col">Employee Code</th><th scope="col">First Name</th><th scope="col">Last Name</th><th scope="col">signInTime</th><th scope="col">signOutTime</th>                <th scope="col">totalhours</th><th>Attendence </tr></thead><tbody>';

      $.each(data, function(key, value) {

        emp_Data += '<tr><td>' + value.Date + '</td> <td>'+value.employeecode+ '</td><td>' + value.firstname + '</td><td>' +value.lastname+ '</td><td>' +value.signInTime+ '</td><td>' +value.signOutTime +'</td><td>' + value.totalhours+ '</td><td>'+value.Attendence+'</td>  </tr></tbody>';
      });
      $('#single_data').append(emp_Data);
    }


   });
//console.log("user"); 
});

// $(document).on("click","#close",function(){

//   $('#single_user_data').modal('hide');
// });


/****************making user statuas 0 for soft delete code area********************************************** */
$(document).on("click","#delete",function(){

      var id=$(this).data("id");
      var stat= 1;

      var delete_data={};

      delete_data.employeecode=id;
      delete_data.status=stat;

     // console.log(delete_data);

        $.ajax({

          url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php",
          type:"DELETE",
          dataType: "text",
          contentType: "application/json",
          data: JSON.stringify(delete_data),
          success:function(response)
          {

            console.log(response);
            //  var status =response.status;
            //  if(status==true)
            //  {
            //   console.log(status);
            //  }
            //  else{
            //   console.log("there some error for delete");
            //  }
          }

        });
  // console.log(id);
  // console.log(stat);
});
/**********************************************for admin make user status 1 for user can acces things********* */

$(document).on("click","#activate",function(){


          var id=$(this).data("id");
          var stat='0';

          var deactive_data={};

          deactive_data.employeecode=id;
          deactive_data.stat=stat;

          console.log(deactive_data);

          $.ajax({
             
            url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php",
            type:"PUT",
            dataType:"text",
            ContentType:"application/json",
            data:JSON.stringify(deactive_data),
            success: function(response){
            alert("User Activate ")
            }

          });


  // console.log(stat);
  // console.log(id);



});






/**********************************user end code*******************************************************/






/**********************************************attendence mark button******* */

$("#signIn").click(function(){
     var time=$("#time").val();
    var employeecode=$("#employeecode").val();

    attendence_data={};

    attendence_data.signIn=time;
    attendence_data.employeecode=employeecode;
    //console.log(attendence_data);

    $.ajax({


      url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php",
      type:"POST",
      dataType:"JSON",
      data:JSON.stringify(attendence_data),
      ContentType:"application/json",
      success:function(data)
      {
       
        alert("YOU ARE IN");
        //console.log(data);
      }

    });

    

  });
$("#signOut").click(function(){

    var time=$("#time").val();
    var employeecode=$("#employeecode").val();
    

    attendence_data={};

    attendence_data.signOut=time;
    attendence_data.employeecode=employeecode;
    //console.log(attendence_data);

    $.ajax({
      url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php",
      type:"PUT",
      dataType:"text",
      data:JSON.stringify(attendence_data),
      ContentType:"application/json",
      success:function(res){
      
       alert("you are out ");
       console.log(res);
       
      }

    });

    

});

$(document).on("click","#show_attendence",function(e){
  e.preventDefault();
  $('#disp_data').hide();
  $('#display_data').hide();
  $('#by_search').hide();
  $('#attend_table').show();
  $('#attend_table').empty();


  var employeecode=$("#employeecode").val();
  var signIn='0'; 
  //alert(employeecode);
  user_attend={};
  user_attend.employeecode=employeecode;
  user_attend.signIn=signIn;
//  console.log(user_attend);

     

      $.ajax({

          url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php",
          type:"POST",
          dataType:"JSON",
          data:JSON.stringify(user_attend),
          ContentType:"application/json",
          success:function(res){
          
         
           emp_data='<thead><tr><th scope="col">email</th><th scope="col"> Date </th><th scope="col">employee Code </th><th scope="col"> firstname</th><th scope="col">lastname</th><th scope="col">signInTime</th><th scope="col">signOutTime</th><th scope="col">total hours you work</th>><th scope="col">Attendence</th></tr></thead><tbody>';

           $.each(res,function(key,value){

              emp_data+='<tr><td>' +value.email+ '</td><td>' +value.Date+'</td><td>'+value.employeecode+'</td><td>'+value.firstname+'</td><td>' +value.lastname+'</td><td>'+value.signInTime+ '</td><td>'+value.signOutTime+'</td><td>'+ value.totalhours+'</td><td>'+value.attendence+'</td></tr></tbody>';
           });
           $('#attend_table').append(emp_data);
           $('#work_hour_detais').html(value.attendence)
          
          


          }

      });


});



});

/****************************************timer section********************************* */
//         var stopwatch = document.getElementById("stopwatch");
//         var startBtn = document.getElementById("signIn");
//         var timeoutId = null;
//         var ms = 0;
//         var hr=0;
//         var sec = 0;
//         var min = 0;
 
//         /* function to start stopwatch */
//         function start(flag) {
//             if (flag) {
//                 startBtn.disabled = true;
//             }
 
//             timeoutId = setTimeout(function() {
//                 hr = parseInt(hr);
//                 ms = parseInt(ms);
//                 sec = parseInt(sec);
//                 min = parseInt(min);
 
//                 ms++;
 
//                 if (ms == 100) {
//                     sec = sec + 1;
//                     ms = 0;
//                 }
//                 if (sec == 60) {
//                     min = min + 1;
//                     sec = 0;
//                 }
//                 if(min==60)
//                 {
//                     hr=hr+1;
//                     min=0;
                  
//                 }
//                 if (ms < 10) {
//                     ms = '0' + ms;
//                 }
//                 if (sec < 10) {
//                     sec = '0' + sec;
//                 }
//                 if (min < 10) {
//                     min = '0' + min;
//                 }

 
//                 stopwatch.innerHTML = hr + ':' + min+ ':' + sec;
 
//                 // calling start() function recursivly to continue stopwatch
//                 start();
 
//             }, 10); // setTimeout delay time 10 milliseconds
//         }
 
//         /* function to pause stopwatch */
//         function pause() {
//             clearTimeout(timeoutId);
//             startBtn.disabled = false;
//         }
 
//         /* function to reset stopwatch */
//         function reset() {
//             ms = 0;
//             sec = 0;
//             min = 0;
//             clearTimeout(timeoutId);
//             stopwatch.innerHTML = '00:00:00';
//             startBtn.disabled = false;
//         }
//     s


</script>