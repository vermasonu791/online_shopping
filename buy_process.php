<?php
session_start();
 include 'includes/db.php';
   if(isset($_REQUEST['chk_del_id']))
 {
	 $chk_del_sql="DELETE FROM checkout WHERE chk_id='$_REQUEST[chk_del_id]'";
	 $chk_del_run=mysqli_query($conn,$chk_del_sql);
	 
 }
 	
	if(isset($_REQUEST['up_chk_qty']))
 {
	 $up_chk_sql="UPDATE checkout SET chk_qty='$_REQUEST[up_chk_qty]' WHERE chk_id='$_REQUEST[up_chk_id]'"; 
	 	 $up_chk_run=mysqli_query($conn,$up_chk_sql);
	 
 }

 $c=1;
 $total=0;
 $delivery_charges=0;
	 //$chk_sel_sql="SELECT * FROM checkout WHERE chk_ref='$_SESSION[ref]'";
	 $chk_sel_sql="SELECT * FROM checkout c JOIN items i ON c.chk_item=i.item_id WHERE c.chk_ref='$_SESSION[ref]'";
	 $chk_sel_run=mysqli_query($conn,$chk_sel_sql);
	 while($chk_sel_rows= mysqli_fetch_assoc($chk_sel_run))
	 {
		$discounted= $chk_sel_rows['item_price']-$chk_sel_rows['item_discount'];
		$sub_total=$discounted*$chk_sel_rows['chk_qty'];
		  $total +=$sub_total;
		 $delivery_charges +=$chk_sel_rows['item_delivery'];
		 echo "
		 
		  <tr>
	 <td>$c</td>
	 <td>$chk_sel_rows[item_title]</td>";?>
	
 	 <td><input type="number" style='width:45px;' onblur="up_chk_qty(this.value,'<?php echo $chk_sel_rows['chk_id'] ;?>')"; value='<?php echo $chk_sel_rows['chk_qty']; ?>'></td>
	 
	 

	 <td><button class='btn btn-danger btn-sm'onclick="del_fun(<?php echo $chk_sel_rows['chk_id'];?>)";>Delete</button></td>
	
	<?php 
	 echo "
	 <td class='text-right'><b>$$discounted/=</b></td>
     <td class='text-right'><b>$sub_total/=</b></td>
	 </tr>	
    
		 ";
		 $c++; 
	 }
$_SESSION['grand_total']=$grand_total=$total+$delivery_charges;
	 
	 echo "
	  </tbody>
	 </table>
	 <table class='table'>
	 <thead>
	 <tr>
	 <td class='text-center'style='font-weight:bold;' colspan='2'>Order Summary</td>
	 </tr>
	 </thead>
	 <tbody>
	 <tr>
	 <td>Total</td>
	 <td class='text-right'><b>$total/=</b></td>
	 </tr>
	 <tr>
	 <td>Delivery charges</td>
	 <td  class='text-right'><b>$delivery_charges</b></td>
	 </tr>
	 <tr>
	 <td>Grand total</td>
	 <td  class='text-right'><b>$_SESSION[grand_total]/=</b></td>
	 </tr>
	  </tbody>
	 </table>
	 ";
	 
	 
	 ?>