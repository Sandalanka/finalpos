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
	<title>Customers</title>
</head>

<body>
<div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
		<div class="panel panel-default">
		<div style="background-color:#E3E9E4;">
		<div class="panel-heading">
          
		   <div id="invoice" style="display:block;">
   				<center><h3><b>Customer Details</b></h3></center>          
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
	<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Customer Details</div>
			</div> <!-- /panel-heading -->
                  
			<div class="panel-body">

				<div class="remove-messages"></div>

				<!-- /div-action -->				
				
				<table class="table" id="customerTable">
					<thead>
						<tr>
													
						    <th>Id</th>
						    <th>first name</th>
							<th>last name</th>
                            <th>road</th>	
                            <th>city</th>
                            <th>country</th>
                              <th>telephone number</th>
							
							
						</tr>
					</thead>
				</table>
               
				<!-- /table -->

			</div> <!-- /panel-body --
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<script src="custom/js/customer.js"></script>
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