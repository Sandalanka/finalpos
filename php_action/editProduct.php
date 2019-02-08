<?php 	

require_once 'db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$productId=$_POST['productId'];
	$productName = $_POST['editProductName'];
  $quantity 	= $_POST['editquantity'];
  $RetailPrice 	= $_POST['editRetailPrice'];
  $companyPrice = $_POST['editcompanyPrice'];
  $Barcode 	= $_POST['editBarcode'];
  $WholeSalePrice 	= $_POST['editWholeSalePrice'];


				
	$sql = "UPDATE product SET Barcode = '$Barcode', product_name = '$productName', quantity = '$quantity', Retail_price = '$RetailPrice', company_price = '$companyPrice',  Wholesale_Price = '$WholeSalePrice'WHERE product_Id = '$productId' ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

$connect->close();

echo json_encode($valid);
} // /$_POST
	 

 