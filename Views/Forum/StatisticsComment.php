<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "cliptec");
$query = "SELECT * FROM comment";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{comment_id:'".$row["comment_id"]."',likee:".$row["likee"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>


 <body>
 <br /><br />
   <div class="container" style="width:900px;">
   <h3 align="center" style="color:#0F056B"> Likes per comment Data</h3>   
 <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'comment_id',
 ykeys:['likee'],
 labels:['likee'],
 hideHover:'auto',
 barColors: ['#91daca'],
 stacked:true
});
</script>