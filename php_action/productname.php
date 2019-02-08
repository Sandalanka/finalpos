<?php

require_once 'db_connect.php';
if(isset($_POST)){
	$ctype=$_POST["ctype"];
	$barcode=$_POST["barcode"];

	$query = "SELECT * FROM product WHERE Barcode ='$barcode'";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {

      $output1 = $row["product_name"];
      $output3 = $row["company_price"];
      $output2 = $row["$ctype"];
      $output4 = $row["quantity"];

      
  }
  if($output4<="0"){echo json_encode(
      array("message1" => "Empty Stock", 
      "message2" => "Empty Stock",
  "message3" => "Empty Stock",
"message4" => '')
 ); }
    else{
  echo json_encode(
      array("message1" => $output1, 
      "message2" => $output2,
  "message3" => $output3,
"message4" => $output4)
 ); }
}
else{echo json_encode(
      array("message1" => 'Data not found', 
      "message2" => 'Data not found',
  "message3" => '',
"message4" => '')
 );}
}