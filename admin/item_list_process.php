<?php include "../includes/db.php";?>
<table class="table table-bordered ">
	<thead class="table-style1" >
<tr>
<th>S.no</th>
<th>item_image</th>
<th>item_description</th>
<th>item_category</th>
<th>item_qty</th>
<th>item_cost</th>
<th>item_price</th>
<th>item_discount</th>
<th>Action</th>
</tr>
	
	</thead>
	
	<?php
	
	$c=1;
	$sel_sql="SELECT * FROM items";
	$sel_run=mysqli_query($conn,$sel_sql);
	while($sel_rows=mysqli_fetch_assoc($sel_run)){
		$discount_price = $sel_rows['item_price']-$sel_rows['item_discount'];
	echo "
	<tbody>
	<tr>
	<td>$c</td>
	<td><img src='../$sel_rows[item_image]' style='width:50px;'></td>
	<td>$sel_rows[item_title]</td>
	<td>";
	echo strip_tags($sel_rows['item_description']);
	echo "
	</td>
	<td>$sel_rows[item_cat]</td>
	<td>$sel_rows[item_qty]</td>
	<td>$sel_rows[item_cost]</td>
	<td>$discount_price($sel_rows[item_price])</td>
	<td>
	<div class='dropdown'>
	<button class='btn btn-danger drpdown-toggle' data-toggle='dropdown'>Actions <span class='caret'></span></button>
	<ul class='dropdown-menu dropdown-menu-right'>
	<li><a href=''>Edit</a></li>
	<li><a href=''>Delete</a></li>
	
	</ul>
	
	</div>
	</td>
	</tr>
	</tbody>
";	
			$c++;
		}
	
	
	?>
	
	
	</table>