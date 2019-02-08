<?php 	

require_once 'db_connect.php';

if(isset($_POST)){
    $barcode      = $_POST['barcode'];
    $resultname   = $_POST['itemname']; 
    $quantity   = $_POST['quantity'];
    $resultprice   = $_POST['unitprice'];
    $subamount   = $_POST['subamount'];
    $subsale   = $_POST['subProfit'];
    $subProfit = $subamount-$subsale;

    $sql = "INSERT INTO test (barcode,resultname,quantity,resultprice,subamount,subprofit) VALUES ('$barcode','$resultname','$quantity','$resultprice','$subamount','$subProfit')";
      $succ = mysqli_query($connect,$sql);
      
  if($succ){

    echo 'Success';
  }
  else {echo 'err';}   
}