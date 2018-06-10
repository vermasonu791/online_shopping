
<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online shoping</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/sheet.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>
<body>
<?php

include 'includes/header1.php';

?>
<div class="container">
<div class="row">
<?php
if(isset($_GET['category']))
{
	$sql="SELECT * FROM items  WHERE item_cat='$_GET[category]'";
$run=mysqli_query($conn,$sql);
while($rows = mysqli_fetch_assoc($run)){
	$discount=$rows['item_price']-$rows['item_discount'];
	$item_title=str_replace(' ','-',$rows['item_title']);
	echo "
	
	
  <div class='col-md-3'>
          <div class='col-md-12 single-item nopadding'>
            <div class='top'><img src='$rows[item_image]' class='img-responsive'></div>
            <div class='bottom'>
         <h3 class='item-title'><a href='item1.php?item_title=$item_title&item_id=$rows[item_id]'>$rows[item_title]</a></h3>
         <div class='pull-right cutted-price text-muted'><del>$500/=</del></div>
         <div class='clearfix'></div>
         <div class='pull-right discount-price'>$$discount/=</div>
		 </div>
        </div>
    </div>

	
	";
}
}



?>

</div>
<div class="clearfix"></div>

<?php
include 'includes/footer1.php';
?>
</div>

</body>
</html>