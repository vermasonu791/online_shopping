<?php 
session_start();
include "includes/db.php";
if(isset($_GET['chk_item_id'])){
	
	$date=date('y-m-d h:i:s');
	$rand_num=mt_rand();
	if(isset($_SESSION['ref']))
	{
		
	}
	else
	{
	$_SESSION['ref']=$date.'_'.$rand_num;
	}
	
	$chk_sql="INSERT INTO checkout (chk_item,chk_ref,chk_timing,chk_qty) values('$_GET[chk_item_id]','$_SESSION[ref]','$date',1)";

	
	
	if(mysqli_query($conn,$chk_sql)){
		?> <script>window.location="buy1.php"</script> <?php
		
	}
}
if(isset($_POST['order_submit']))
{
	$name= mysqli_real_escape_string($conn,strip_tags($_POST['name']));
	$email= mysqli_real_escape_string($conn,strip_tags($_POST['email']));
	$contact= mysqli_real_escape_string($conn,strip_tags($_POST['contact']));
	$state= mysqli_real_escape_string($conn,strip_tags($_POST['state']));
	$delivery_address= mysqli_real_escape_string($conn,strip_tags($_POST['delivery_address']));
	
	
	
	$order_ins_sql="INSERT INTO orders (order_name,order_email,order_contact,order_state,order_delivery_add,order_checkout_ref,order_total) VALUES ('$name','$email','$contact','$state','$delivery_address','$_SESSION[ref])',$_SESSION[grand_total] )";
	mysqli_query($conn,$order_ins_sql);
}


 ?>
<html>
<head>
<title>Shopping cart</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/sheet.css">
    <link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
	//Ajax process
function ajax_func(){
xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status==200){
document.getElementById('get_data').innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open('GET','buy_process.php',true);
xmlhttp.send();

}

	
function del_fun(chk_id)
{
	
	xmlhttp.onreadystatechange=function(){
		
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById('get_data').innerHTML=xmlhttp.responseText;
		}
		}
	xmlhttp.open('GET','buy_process.php?chk_del_id='+chk_id,true);
xmlhttp.send();
}
function up_chk_qty(chk_qty,chk_id)
{

	xmlhttp.onreadystatechange=function(){
		
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById('get_data').innerHTML=xmlhttp.responseText;
		}
		}
	xmlhttp.open('GET','buy_process.php?up_chk_qty='+chk_qty+'&up_chk_id='+chk_id,true);
xmlhttp.send();
}

	
	</script>
	
	
</head>
<body onload="ajax_func();">
	<?php include 'includes/header1.php';
    ?>
    <div class="container">
	 <div class="page-header">
	 <h3 class="pull-left">Checkout</h3>
	 <div class ="pull-right">
	 <button class="btn btn-success"data-toggle="modal" data-target="#proceed_modal" data-backdrop="static" data-keyboard="false">Proceed</button>
	 <div class="modal fade" id="proceed_modal">
	 <div class="modal-dialog">
	 <div class="modal-content">
	 <div class="modal-header">
	 <button class="close" data-dismiss="modal">&times;</button>
	 </div>
	 <div class="modal-body">
	    <form action="" method="post">
		   <div class="form-group">
		   <label for="name">Name</label>
		   <input type="text" id="name" name="name" class="form-control" placeholder="Name">
		   
		   </div>
		   <div class="form-group">
		   <label for="email">Email Address</label>
		   <input type="email" id="email" name="email" class="form-control" placeholder="Email">
		   
		   </div>  
		    <div class="form-group">
		   <label for="contact">Contact number</label>
		   <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact">
		   </div>
		   
		   <div class="form-group">
		   <label for="state" >State</label>
		   <input list="states" id ="state" name="state"class="form-control">
		   <datalist id="states">
		   <option >India</option>
		   <option >Delhi</option>
		   <option >Rohtak</option>
		   <option >Jalandhar</option>
		   
		   </datalist>
		   </div>
		   <div class="form-group">
		   <label for="delivery">Delivery address</label>
		   <textarea  id="delivery" name ="delivery_address"class="form-control"></textarea>
		   </div>
		   <div class="form-group">
		   <input type="submit" name="order_submit"  class="btn btn-danger btn-block">
		   </div>
		</form>
	 
	 </div>
	 <div class="modal-footer">
	 <button class="btn btn-info" data-dismiss="modal">close</button>
	 </div>
	 </div>
	 </div>
	 </div>
	 
	 </div>
	 	 <div class="clearfix"></div>
	 </div>

	 <div class="panel panel-default">
	 <div class="panel-heading">order detail</div>
	 <div class="panel-body">
     <table class="table">
	 <thead style="font-weight:bold;">
	 <tr>
	 <td>S.no</td>
	 <td>Item</td>
	 <td>qty</td>
	  <td width="5%">Delete</td>
	 <td class="text-right">price</td>
	<td class="text-right">Sub Toltal</td>
	 
	 </tr>
	 </thead>
	 <tbody id="get_data">
	 
	 <!--The buy process data-->
	
	
	
	 
	
	 </div>
	 </div>
	</div>
<?php
include 'includes/footer1.php';
?>
   	
</body>
</html>