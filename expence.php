 <?php 

require_once 'php_action/db_connect.php'; 
require 'includes/header.php'; 

?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Invoice</li>
  
</ol>



<div class="panel panel-default">
	<div class="panel-heading">

		
  		<i class="glyphicon glyphicon-plus-sign"></i>Add expence

	</div> <!--/panel-->	
	<div class="panel-body">
			
<form name="add_name" id="add_name" class="form-horizontal" onsubmit="submitfun()">
			  <div class="form-group">
					    <label for="orderDate" class="col-sm-2 control-label">Order Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="orderDate"  name="orderDate" autocomplete="off" /> 
			      
			    </div>
			  </div> <!--/form-group-->
			 
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">User Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientName" value="<?php 
			      echo $_SESSION['username']; 
?>" name="clientName" placeholder="Client Name" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-2 control-label">Customer Type</label>
			    <div class="col-sm-10">
			     <select id="ctype" name="ctype" onclick="ctypeclear()" class="form-control">
					<option id="Retail_price" value="Retail_price"  >Retail</option>
					<option id="Wholesale_price" value="Wholesale_Price"  >Wholesale</option>
			     </select>	
			    </div>
			  </div> <!--/form-group-->	
			  		   
			  <div class="form-group">
			   
                          <div class="table-responsive">  
                               <table class="table" id="dynamic_field"> 
                               <thead>
			  		<tr>			  			
			  			
			  			<th  scope="col"> NAME</th>			  			
			  			
			  			<th  scope="col"> AMOUNT</th>
			  		<!--	<th  scope="col">IMEI NUMBER</th> -->
			  			<th  scope="col"></th>
			  		</tr>
			  	</thead>
			  	<tbody> 
                                    <tr>  
                                          

                                         <td><input type="text" name="name[]" id="name" class="form-control name_list" tabindex="1" /></td> 

                                        
                                        
                                         
                                         <td><input type="text" name="amount[]" id="amount" class="form-control name_list" tabindex="1" /></td> 
                                        
                                         <td><button type="button" name="add1" id="add1" class="btn btn-success">Add More</button><p id="demo1" style="color: red;font-size: 10px;"></p></td>  
                                    </tr>  
                                </tbody>
                               </table>   
                          </div>  
                      
                     </div> 
						  		  
			  <!--/col-md-6-->

			  <div class="col-md-6">
			  	 <!--/form-group-->			  
				 <!--/form-group-->		
				  <!--/col-md-6-->

			  
			    <div class="col-sm-offset-3 col-sm-12">
			  
			    	

			      <button type="button" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success col-sm-6" onclick="submitfun()" 
			       name="submit" style="margin-right: 2px; margin-left: 10px;" ><i class="glyphicon glyphicon-ok-sign"></i> <i class="glyphicon glyphicon-print"></i> Submit</button>  
			    </div>  
			    	<div class="col-md-offset-3 col-md-8">
			    	<p id="demo" style="color: red;font-size: 14px;"></p>
			    </div>
			</div>
			
			    
			  
			</form>
</div>

	</div> <!--/panel-->	
<!--/panel-->	

<script	src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script	src="jquery.formnavigation.js"></script>
<script>
$(document).ready(function(){
document.getElementById("createOrderBtn").addEventListener("click", submitfun);
	var i=0; 
	//add row function
function addrow(){
		var name = $("input[name='name[]']").val();
      	var amount = $("input[name='amount[]']").val();
   //var quantity = $("input[name='quantity[]']").val();
     // 	var resultprice = $("input[name='resultprice[]']").val();
      	//var subamount = $("input[name='subamount[]']").val();
      	//var profit = $("input[name='profit[]']").val();
      	//var imeinumber = $("select[name='imeinumber[]']").val();
      	
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"> <td><input type="text" readonly="readonly" name="name[]" value="'+name+'" id="name" class="form-control name_list" /></td><td><input type="text" name="amount[]" id="resultnamet" value="'+amount+'" readonly="readonly" style="background-color:#eaeae1;" class="form-control name_list" /></td><td><button type="button" name="submit" id="'+i+'" class="btn btn-danger submit">X</button></td></tr>'); 
            
          //if you want to add imei number field.. please add abuve code line after profit td 
    $('#name').val('');
	$('#amount').val('');
    $('#quantity').val('1');
	$('#resultprice').val('');
	$('#subamount').val('');
	$('#profit').val('');
	$('#tempprofit').val('');
	
	document.getElementById("imeinumber").innerHTML = "";
	$("#barcode").focus();
	
	//totalvalue();	
}

//add row function END
//get total value

function totalvalue(){
	
	$.ajax({  
                url:"name.php",  
                method:"POST", 
                dataType:"json", 
                data:$("#add_name").serialize(),  
                
                success:function(data)  
                {  
                     document.getElementById("totalval").value=data.message1.toFixed(2); 
                     document.getElementById("totalprofit").value=data.message2.toFixed(2);
                     document.getElementById("grandTotal").value=data.message1.toFixed(2); 
                     document.getElementById("netprofit").value=data.message2.toFixed(2);
                     document.getElementById("paid").value="";
                       
                }  
           });
	
}

//END get total value

//add row function call
      $('#add1').click(function(){
      var barcode = $("input[name='barcode[]']").val();
      var empty = $("input[name='resultname[]']").val();
      
      if(barcode=="" || empty=="Empty Stock" || empty=="Data not found" || empty=="Low Stock") {} 
      	else{addrow();}
      	  
      });  
//add row function call END
//remove row function
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
          if( $('#row'+button_id+'').remove()){
          			 $('#discount').val('0');
					 $('#grandTotal').val('');
					 $('#paid').val('');
					 $('#due').val('');
					 $('#totalval').val('');
					 $('#totalprofit').val('');
					 $('#netprofit').val('');
					 
           			 //totalvalue();  
           			}
      });  
//remove row function END   

//select name, unit price 
 $('#barcode').keyup(function()  {
 	var barcode = $("input[name='barcode[]']").val();
 	var ctype = $("select[name='ctype']").val();
 	var barforimei = document.getElementById("barcode").value;
 	imeisearch(barforimei);

 	$.ajax({
   url:"php_action/productname.php",
   method:"POST",
   dataType: "json",
   data:{barcode:barcode,ctype:ctype},
   
   success:function(data)
   {
    	var name = data.message1;
    	var unitprice = data.message2;
    	var companyprice = data.message3;
    	var dbquantity = data.message4;

    	$('#dbquantity').val(dbquantity);
    	$('#resultname').val(name);
    	$('#resultprice').val(unitprice);
    	$('#subamount').val(unitprice);
    	$('#quantity').val("1");
    	$('#tempprofit').val(parseFloat(unitprice-companyprice).toFixed(2));
    	$('#profit').val(parseFloat(unitprice-companyprice).toFixed(2));
		
   }
   
  });
 	
});
//select name, unit price  END

// cal sub amount and sub profit
$('#quantity').bind('click keyup', function()  {
 	
 	var barcode = $("input[name='barcode[]']").val();
 	
 	if(barcode==""){ document.getElementById("quantity").value="1";document.getElementById("profit").value="";
 document.getElementById("tempprofit").value="";}

 	else{
 		var unitprice = $("input[name='resultprice[]']").val();
 		var quantity = $("input[name='quantity[]']").val();
 		var profit = $("input[name='tempprofit[]']").val();
 		var check = $("input[name='dbquantity']").val();
 		
 		if(parseInt(check)<parseInt(quantity))
 			{ 
 				document.getElementById("quantity").value="Low stock : "+check;
 				document.getElementById("resultname").value="Low Stock";
			}
 			else{
 		$('#subamount').val(quantity*unitprice);
 		$('#profit').val(quantity*profit);
 	}
	}
	
});
// cal sub amount and sub profit END
// if press enter on quantity, add row
$("#quantity").keyup(function(event) {
	var barcode = $("input[name='barcode[]']").val();
	if(barcode==""){}
		else{
    if (event.keyCode === 13) {
        addrow();
    }}
});
//END
// emi number search
function imeisearch(barcode){
	
	$.ajax({  
                url:"php_action/imeisearch.php",  
                method:"POST", 
                data:{barcode:barcode}, 
                
                success:function(data)  
                {  
                    document.getElementById("imeinumber").innerHTML = data; 
                       
                }  
           });

}
//end emi number search
// if press enter on payamount, submit
$("#paid").keyup(function(event) {
	if (event.keyCode === 13) {
        submitfun();
    }
});
//END
//discount cal
$('#discount').bind('click keyup', function()  {
var discount = $("input[name='discount']").val();
var grandtotal = $("input[name='totalval']").val();
var totalprofit = $("input[name='totalprofit']").val();
var nettotal = grandtotal-discount;
$('#grandTotal').val(parseFloat(nettotal).toFixed(2));

var netprofit = parseFloat(totalprofit-discount).toFixed(2);//----------netprofit-------
$('#netprofit').val(netprofit);
});
//discount END
//pay amount cal
$('#paid').bind('click keyup', function()  {
	var payamount = $("input[name='paid']").val();
	var grandTotal = $("input[name='grandTotal']").val();
	var balance = payamount - grandTotal ;
	$('#due').val(parseFloat(balance).toFixed(2));
});
//pay amount cal END
//submit function
function submitfun(){
   var payamount = $("input[name='name']").val();
   var total = $("input[name='amount']").val();
   if(payamount!="" && total!=""){
           $.ajax({  
                url:"submitexpence.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                       
                     javascript:printOrder();
                     $('#dynamic_field').find('tr:gt(1)').remove();
                     $('#discount').val('');
					 $('#grandTotal').val('');
					 $('#paid').val('');
					 $('#due').val('');
					 $('#totalval').val('');
					 $('#totalprofit').val('');
					 $('#netprofit').val('');

                }  
           }); }

           else{
           	var txt = "Sorry.. Invalid Invoice!";
    
        document.getElementById("demo").innerHTML = txt;
        
           } 
     }
//END submit
setInterval(function() {
    var todayTime = new Date ( );
    var month = (todayTime.getMonth() + 1);
	var day = todayTime.getDate();
	var year = todayTime.getFullYear();
	
	var currentTimeString = year+"-"+month+"-"+day;
	
	
    document.getElementById("orderDate").value = currentTimeString;
}, 1000);
function printOrder() {
	var orderId="";
			$.ajax({
			url: 'php_action/printOrder.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'text',
			success:function(response) {
				
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
        mywindow.document.write('<html><head>');        
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();
				
			}// /success function
		});}
});
</script>
<?php require_once 'includes/footer.php'; ?>


