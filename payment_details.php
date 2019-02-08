<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
   if($_SESSION['validate']!="superAdmin")
   {
   	echo"yo";
      header("location: index.php");
   }   
}
else{
	if($_SESSION['validate']!="superAdmin")
   {
   	echo"yo";
      header("location: index.php");
   }
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	
<?php include("includes/header.php"); 
require_once("php_action/db_connect.php");?>
	<title>Payment Form</title>
</head>

<body>
<div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
		<div class="panel panel-default">
		<div style="background-color:#E3E9E4;">
		<div class="panel-heading">
          <center><h1><i>POINT OF SALE SYSTEM</i></h1></center>
		   <div id="invoice" style="display:block;">
   				<center><h3><b>Payment Form</b></h3></center>          
  		  </div>
		 <div class="row">
		 <div align="center">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		 </div>
		 <div align="center" id="timer"></div>
		 </div>
		</div>
		</div>
		</div>
        </div>
	</div>
	<div class="row" >    
	<div id="content" class="col-md-12 "><br>             
		<div class="panel panel-info" style="background-color:#E3E9E4;">
		<h3 align="center">Payment Details</h3>
		<hr>
		<div class="row">
		<?php 
	
		$sql = "SELECT invoice_no,date,payment FROM payment_details";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
			echo "<table align=\"center\" border =\"1\" width=\"70%\"><tr align=\"center\"><td><b>Invoice No</b></td> <td><b>Date</b></td> <td><b>Payment</b></td></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr align=\"center\"><td>" . $row["invoice_no"]. "</td><td>" . $row["date"]. "</td><td>" . $row["payment"]. "</td></tr>";
		}
			echo "</table>";
		} 	
		else {
			echo "0 results";
		}
		$connect->close();
		?> 
		</div>
	   </div>
     </div>
	</div>
	
</div>
<script>setInterval(function() {
    var currentTime = new Date ( );    
    var currentHours = currentTime.getHours ( );   
    var currentMinutes = currentTime.getMinutes ( );   
    var currentSeconds = currentTime.getSeconds ( );
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
    document.getElementById("timer").innerHTML = currentTimeString;
}, 1000);
</script>
<?php include("includes/footer.php") ?>
</body>
</html>