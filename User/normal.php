<?php

date_default_timezone_set('Asia/Kolkata');
echo $runningTime = date('h:i:s');

             
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
<div id="runningTime"></div>
 
<script type="text/javascript">
$(document).ready(function() {
 setInterval(runningTime, 1000);
});
function runningTime() {
  $.ajax({
    url: 'normal.php',
    success: function(data) {
       $('#runningTime').html(data);
     },
  });
}
</script>