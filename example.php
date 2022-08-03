<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
    <button id="show_data">show</button>
</body>
</html>
<script>
 




 $(document).ready(function(){
        $('#show_data').click(function(){

            $.ajax({
                
            type:"GET",
            url:"http://localhost/Vageesh_Paliwal_task/api/User/index_user.php?status=1",
            dataType:"html",
            ContentType:'Application/json',
            success: function(data){
                console.log(data);
            }
            });

        });
 });

</script>