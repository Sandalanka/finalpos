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
 <?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>


<div class="row">
   <div class="col-md-12">
	<div class="panel panel-default">
	<div class="panel-heading">
          <center><h1><i>POINT OF SALE SYSTEM</i></h1></center>
		  <div id="invoice" style="display:block;">
   				<center><h3><b>Stock Management</b></h3></center>          
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

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th>Product ID</th>						
						    <th>Product Name</th>
						    <th>Barcode</th>
							<th>Company price</th>							
							<th>Quantity</th>
							<th>Retail Price</th>
							<th>Wholesale price</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	         </div> <!-- /form-group-->	    
  	           	        <div class="form-group">
	        	<label for="Barcode" class="col-sm-3 control-label">Barcode: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="Barcode" placeholder="Barcode" name="Barcode" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    


	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	         <div class="form-group">
	        	<label for="CompanyPrice" class="col-sm-3 control-label">Company Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="companyPrice" placeholder="Company Price" name="companyPrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="RetailPrice" class="col-sm-3 control-label">Retail Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="RetailPrice" placeholder="Retail Price" name="RetailPrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	         <div class="form-group">
	        	<label for="WholeSalePrice" class="col-sm-3 control-label">WholeSale Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="WholeSalePrice" placeholder="WholeSale Price" name="WholeSalePrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog --> 


<!-- /add categories -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">
 <ul class="nav nav-tabs" role="tablist">
				  

				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product Info</a></li>    
				  </ul>

	      		 <div class="tab-content">
				 <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">

				    	<br/>

				    	<div id="edit-product-messages"></div>
<div class="form-group">
	        	<label for="Barcode" class="col-sm-3 control-label">Barcode: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editBarcode" placeholder="editBarcode" name="editBarcode"
				      autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    


	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editProductName" placeholder="editProduct Name" name="editProductName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	         <div class="form-group">
	        	<label for="CompanyPrice" class="col-sm-3 control-label">Company Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editcompanyPrice" placeholder="editcompanyPrice" name="editcompanyPrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editquantity" placeholder="editQuantity" name="editquantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="RetailPrice" class="col-sm-3 control-label">Retail Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editRetailPrice" placeholder="editRetailPrice" name="editRetailPrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	         <div class="form-group">
	        	<label for="WholeSalePrice" class="col-sm-3 control-label">WholeSale Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editWholeSalePrice" placeholder="editWholeSalePrice" name="editWholeSalePrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        
	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->



<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>