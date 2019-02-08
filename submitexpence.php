<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
   
}

 ?><?php
require_once 'php_action/db_connect.php';

if(isset($_POST)){
	
	$number = count($_POST["submit"]);
	//$date		=$_POST['orderDate'];
	$name[]	=$_POST['name[]'];
	//$ctype		=$_POST['ctype'];	
	$amount[]=$_POST['amount[]'];
	//$discount	=$_POST['discount'];
	//$nettotal	=$_POST['grandTotal'];
	//$payamount	=$_POST['paid'];
	//$balance	=$_POST['due'];
	//$netprofit	=$_POST['netprofit'];

	$query = "INSERT INTO amount (name,amount) VALUES ('$name','$amount')";

	$succ1 = mysqli_query($connect,$query);
	//$quaryse = "SELECT max(id) from payment";
	//$succ2 = mysqli_query($connect,$quaryse);
	//$row= mysqli_fetch_array($succ2);
	//$salt = $row['max(id)'];
	//$_SESSION["invoiceid"] = $salt;

	/*if($succ1){
		for($i=0; $i<$number; $i++)  
      {  
            
                $sql = "INSERT INTO amount (name,amount) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."','".mysqli_real_escape_string($connect, $_POST["amount"][$i])."','".mysqli_real_escape_string($connect, $_POST["quantityt"][$i])."','".mysqli_real_escape_string($connect, $_POST["resultpricet"][$i])."','".mysqli_real_escape_string($connect, $_POST["subamountt"][$i])."','".mysqli_real_escape_string($connect, $_POST["profitt"][$i])."','".mysqli_real_escape_string($connect, $_POST["imeinumbert"][$i])."','$salt','$date')";  
               $succ3= mysqli_query($connect, $sql); 
               $sql2 = "UPDATE product SET quantity = quantity -'".mysqli_real_escape_string($connect, $_POST["quantityt"][$i])."' WHERE Barcode = '".mysqli_real_escape_string($connect, $_POST["barcodet"][$i])."'";
				$result2 = mysqli_query($connect,$sql2);
                   
                   	$res="DELETE  from imeinumber where imei='".mysqli_real_escape_string($connect, $_POST["imeinumbert"][$i])."' "; 
                   	mysqli_query($connect,$res);
                    
      }  */
/*if($succ3) {
               	echo $salt;
               
               }
	}
	else{
		echo $succ1;
		
	}

}
else{
	echo "ok err";
}*/
} 
?>