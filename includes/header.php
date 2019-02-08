<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
   if(!$_SESSION['userId'])
   {
      header("location: index.php");
   }

   
}?>
<!DOCTYPE html>
<html>
<head>

	<title>Point of Sale System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

        <?php 
        if(($_SESSION['userId'])&&($_SESSION['validate']=="superAdmin"))
{
        echo'

      	<li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i>  Accounts</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-folder-open"></i> Payment Details <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="navCustomer"><a href="payment1.php"> Add Premium</a></li>
            <li id="navPayment"><a href="payment2.php">  Update Payments</a></li>
            <li id="navPayment"><a href="payment_details.php">  Payment Details</a></li>            
          </ul>
        </li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-euro"></i> Customer <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="navCustomer"><a href="customer.php"> Add customer</a></li>
            <li id="navPayment"><a href="customerDetails.php">  View Customers List</a></li>
                        
          </ul>
        </li>';
	      
		    //<li id="navEmployee"><a href="employee.php"> <i class="glyphicon glyphicon-gbp"></i> Employee</a></li> 
        echo '<li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-usd"></i> Stock</a></li>';  
        //<li id="navProduct"><a href="Imie.php"> <i class="glyphicon glyphicon-italic "></i> IMIE</a></li>  
       echo ' 
        <li id="topNavAddOrder"><a href="orders.php"> <i class="glyphicon glyphicon-thumbs-up"></i> Invoice</a></li>            
        <li id="navReturn"><a href="return.php"> <i class="glyphicon glyphicon-thumbs-down"></i> Returns</a></li>
        <li id="navReturn"><a href="return.php"> <i class="glyphicon glyphicon-sort"></i> Expenses</a></li> 
        <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li>
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>            
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>    ';      
      }

      elseif(($_SESSION['userId'])&&($_SESSION['validate']=="")) {
    echo '<li id="topNavAddOrder"><a href="orders.php"> <i class="glyphicon glyphicon-thumbs-up"></i> Invoice</a></li>
    <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>        
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>
      ';
} 
else{

  
}
?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">