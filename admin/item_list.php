<?php include "../includes/db.php";
if(isset($_POST['item_submit'])){
	$item_title=mysqli_real_escape_string($conn,strip_tags($_POST['item_title']));
	$item_description=mysqli_real_escape_string($conn,strip_tags($_POST['item_description']));
	$item_category=mysqli_real_escape_string($conn,strip_tags($_POST['item_category']));
	$item_quantity=mysqli_real_escape_string($conn,strip_tags($_POST['item_quantity']));
	$item_cost=mysqli_real_escape_string($conn,strip_tags($_POST['item_cost']));
	$item_price=mysqli_real_escape_string($conn,strip_tags($_POST['item_price']));
	$item_discount=mysqli_real_escape_string($conn,strip_tags($_POST['item_discount']));
	$item_delivery=mysqli_real_escape_string($conn.strip_tags($_POST['item_delivery']));
	
	if(isset($_FILES['item_image']['name'])){
		$file_naem=$_FILES['item_image']['name'];
		$path_address ="../images/items/$file_name";
		$path_address_db ="images/items/$file_name";
		$img_confirm=1;
		$file_type=pathinfo($_FILES['item_image']['name'],PATHINFO_EXTENSION);
		if($_FILES['item_image']['size']>200000)
		{
			$img_confirm = 0;
			echo 'The size is very big';
		}
		if($file_type!='jpg' && $file_type!='png' && $file_type!='gif')
			
		{
			$img_confirm=0;
			echo 'type is not matching';
		}
		if($img_confirm == 0)
		{
		}
		else{
		if(move_uploaded_file($_FILES['item_image']['tmp_name'],$path_address)){
			$item_ins_sql ="INSERT INTO items (item_image,item_title,item_description,item_cat,item_qty,item_cost,item_price,item_discount,item_delivery) VALUES ('$path_address_db','$item_title','$item_description','$item_category','$item_quantity'.'$item_cost','$item_price','$item_discount','$item_delivery') ";
			$item_ins_run=mysqli_query($conn,$item_ins_sql);
			
		}
		}
		
	}	

}

// ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online shopping | Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin-style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
	<script>
	function get_item_data(){
 xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status==200){
document.getElementById('get_item_data').innerHTML=xmlhttp.responseText;


}
}
xmlhttp.open('GET','item_list_process.php',true);
xmlhttp.send();


}
	
	
	</script>
	</head>
<body onload="get_item_data();">
	<?php include "includes/header.php"; ?>
	<div class="container">
	
	<button class="btn btn-danger"data-toggle="modal" data-target="#add_new_item"data-backdrop="static" data-keyword="false">Add new</button>
	
	<div id="add_new_item" class="modal">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	
	<button class="close" data-dismiss="modal">&times;</button>
	<h4>Add new item</h4>
	</div>
	<div class="modal-body">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label for="">Item Image</label>
	<input type="file" name="item_image" class="form-control">
	</div>
	<div class="form-group">
	<label for="">Item Title</label>
	<input type="text" name="item_title" class="form-control"> 
	
	</div><div class="form-group">
	<label for="">Item Description</label>
	<textarea name="item_description" id=""  class="form-control"></textarea> 
	
	</div>
	<div class="form-group">
	<label for="">Item Category</label>
	<select name="item_category" id="" class="form-control">
		
	<option value="">Select a category</option>
	<?php
	$cat_sql="SELECT * FROM items_cat";
	$cat_run=mysqli_query($conn,$cat_sql);
	while($cat_rows = mysqli_fetch_assoc($cat_run)){
		$cat_name=ucwords($cat_rows[cat_name]);
		if($cat_rows['cat_slug' == ''])
		{
			$cat_slug= $cat_rows['cat_name'];
		}
		else
		{
			$cat_slug= $cat_rows['cat_slug'];
		}			
			
			
		echo "
		<option value='$cat_slug'>$cat_name</option>
		";
	}
	
	?>

	
	</select>
	
	</div>
	
	<div class="form-group">
	<label for="">Item Quantity</label>
	<input type="number" name="item_quantity" class="form-control"> 
	
	</div>
	<div class="form-group">
	<label for="">Item Cost</label>
	<input type="number" name="item_cost"	class="form-control"> 
	
	</div>
	<div class="form-group">
	<label for="">Item Price</label>
	<input type="number" name="item_price" class="form-control"> 
	
	</div>
	<div class="form-group">
	<label for="">Item Discount</label>
	<input type="number" name="item_discount" class="form-control"> 
	
	</div>
	<div class="form-group">
	<label for="">Item Delivery</label>
	<input type="number" name="item_delivery" class="form-control"> 
	
	</div>
	<div class="form-group">
	<input type="submit" class="btn btn-block btn-primary">
	</div>
	
	</form>
	
	
	</div>
	<div class="modal-footer">
	<button class="btn btn-danger"data-dismiss="modal">Close</button>
	</div>
	</div>
	</div>
	</div>
	<div id="get_item_data">
	<!-- process area -->
	
	</div>
	
	
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>