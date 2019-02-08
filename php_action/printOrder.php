<?php 	
if (session_status() == PHP_SESSION_NONE) {
    session_start();
   if(!$_SESSION['userId'])
   {
      header("location: ../index.php");
   }}
require_once 'db_connect.php';
$orderId = $_POST['orderId'];
$inid = $_SESSION["invoiceid"];

$sql = "SELECT id, dat, user, customertype, totalval, discount,grandTotal, paid, due FROM payment where id=$inid";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderid = $orderData[0];
$Date = $orderData[1];
$user = $orderData[2]; 
$type=$orderData[3];
$Total = $orderData[4];
$discount = $orderData[5];
$grandTotal = $orderData[6]; 
$paid = $orderData[7];
$due = $orderData[8];
$imeirow='';
$imeirownumber='';

$orderItemSql = "SELECT  itemname,
quantity,unitprice,subamount,imei FROM invoiceitem
 WHERE invoiceno = $inid";
$orderItemResult = $connect->query($orderItemSql);
while($row = $orderItemResult->fetch_array()) {			
						
			if($row[4]!="null"){
			$imeirow='<th>Emie</th>';	
			$imeirownumber= '<th>'.$row[4].'</th>';
			}
		
		};
 $table = '
 <table border="1" cellspacing="0" cellpadding="20" width="100%">
	<thead>
		<tr >
			<th colspan="5">

			<center>
			OSLO MARKETING <br> NO 63B, ALLEN AVENUE, DEHIWALA.<br>
			077-0166483 <br>
			    Invoice no : '.$orderid.'
				<center>Order Date : '.$Date.'</center>
				<center>Cashier : '.$user.'</center>
				
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody>
		<tr>
			<th>No</th>
			<th>Product Name</th>
			<th>Item Price</th>
			<th>Quantity</th>
			'.$imeirow.'
			<th>Sub Total</th>
		</tr>';
$ssssss = "SELECT  itemname,
quantity,unitprice,subamount,imei FROM invoiceitem
 WHERE invoiceno = $inid";
 $sss = $connect->query($ssssss);
		$x = 1;
		while($row = $sss->fetch_array()) {			
						
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[0].'</th>
				<th>'.$row[2].'</th>
				<th>'.$row[1].'</th>
				'.$imeirownumber.'
				<th>'.$row[3].'</th>
			</tr>
			';
		$x++;
		} // /while
   
		$table .= '<tr>
			<th></th>
		</tr>

		<tr>
			<th></th>
		</tr>

		
		<tr>
		<td></td>
		<td></td>
		<td></td>
			<td><b>Discount :</b></td>
			<td>'.$discount.'</td>			
		</tr>

		<tr>
		<td></td>
		<th rowspan="2">THANK YOU!</th>
		<td></td>
			<td><b>Grand Total :</b></td>
			<td>'.$grandTotal.'</td>			
		</tr>

		<tr>
		<td></td>
		
		<td></td>
			<td><b>Paid Amount :</b></td>
			<td style="border-bottom: 1px solid black;  ">'.$paid.'</td>			
		</tr>

		<tr>
		<td></td>
		<td></td>
		<td></td>
			<td><b>Balance :</b></td>
			<td style="border-bottom: 1px solid black;  border-bottom-style: double;">'.$due.'</td>			
		</tr>
		
	</tbody>
</table>
';
 $connect->close();

echo $table;
echo "Developed by:PureSoft System Solution";
echo "077 922 9991";

