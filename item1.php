<?php include "includes/db.php"; ?>
<html>
<head>
<title>Product Detail</title>
	

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/sheet.css">
    <link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<style>
	.btn{
		font-size:25px;
		border-radius:0;
		font-style:arial;
	
	}



	</style>
</head>
<body >
	<?php include 'includes/header1.php'?>
	<div class="container">

	<div class="row">
	<ol class="breadcrumb">
		<li><a href= "project1.php">Home</a></li>
		<?php
			if(isset($_GET['item_id'])){
			$sql="SELECT * FROM items WHERE item_id='$_GET[item_id]'";
		    $run=mysqli_query($conn,$sql);
		    while($rows=mysqli_fetch_assoc($run)){
				$item_cat=ucwords($rows['item_cat']);
				$item_id=$rows['item_id'];
				
			echo"
			<li><a href= 'category.php?category=$item_cat'>$rows[item_cat]</a></li>
		    <li class='active'>$rows[item_title]</li>
			";
		?>
	
		</ol> 
		</div>
		
		<div class="row">
		
		<?php
	
			
			echo "
			
		<div class='col-md-8'>
		<h3 class='pp-title'>$rows[item_title]</h3>
		<img src='$rows[item_image]' class='img-responsive' alt=''width='400px' height='300px'>
		<h4 class='pp-description'></h4>
         <div class='pp-des-detail'>$rows[item_description]</div>
      </div>
			";


		}
		}
		
		
		?>
	<aside class="col-md-4">

<a href="buy1.php?chk_item_id=<?php echo $item_id ; ?>" class="btn btn-success btn-lg btn-block">Buy</a>
<br>
<ul class="list-group">

<li class="list-group-item">
<div class="row">
<div class="col-md-3"><i class="fa fa-truck fa-2x"></i></div>
<div class="col-md-9">Deliver item in 5 days</div>
</div>
</li>


<li class="list-group-item">
<div class="row">
<div class="col-md-3"><i class="fa fa-refresh fa-2x"></i></div>
<div class="col-md-9">Easy return item in 5 days</div>
</div>
</li>

<li class="list-group-item">
<div class="row">
<div class="col-md-3"><i class="fa fa-phone fa-2x"></i></div>
<div class="col-md-9">contact at 9728999677</div>
</div>
</li>

</ul>
</aside>
</div>

<div class="page-header">
<h2>Related items</h2>

</div>

<section class="row">
<?php
$rel_sql="SELECT * FROM items ORDER BY rand() LIMIT 4";
$rel_run=mysqli_query($conn,$rel_sql);
while($rel_rows = mysqli_fetch_assoc($rel_run))
{
	$item_title=str_replace(' ','-',$rel_rows['item_title']);
	$discounted_price=$rel_rows['item_price']-$rel_rows['item_discount'];
	
	echo "
	    <div class='col-md-3'>
          <div class='col-md-12 single-item nopadding'>
            <div class='top '><img src='$rel_rows[item_image]' class='img-responsive' alt=''></div>
            <div class='bottom'>
         <h3 class='item-title'><a href='item1.php?item_id=$rel_rows[item_id]&item_title=$item_title'>$rel_rows[item_title]</a></h3>
         <div class='pull-right cutted-price text-muted'><del>$$rel_rows[item_price]</del></div>
         <div class='clearfix'></div>
         <div class='pull-right discount-price'>$ $discounted_price/=</div>
		 </div>
        </div>
    </div> 

	";
}
?>
 

	
</section>



	</div>
	 <br>
	 <br>
	 <br>
	 <br>
		
	<?php include 'includes/footer1.php'?>
</body>

</html>