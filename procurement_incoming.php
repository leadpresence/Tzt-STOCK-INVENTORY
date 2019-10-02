<?php 
//include thr link to db
include  ('conection_link.php');
mysqli_select_db($dblink,$database) or  die('could not find database');

#Taking form input into POST global variable 

 
if (isset($_POST['submit_incoming'])) {
	$procurement_itemname=$_POST['procurement_itemname']; 
	$procurement_quantity=(int) $_POST['procurement_quantity'];
	$procurement_class=$_POST['class'];
	$procurement_vendor=$_POST['company_vendor'];
	$procurement_invoice_num=$_POST['invoice_number'];
	$procurement_cost=(int)$_POST['cost'];
	$procurement_date_rcvd=$_POST['date_recieved'];
	$procurement_comments=$_POST['comments'];
	//$procurement_invoice_file=$_POST['invoice_file'];
	//asset,company_vendor,invoice_number,cost,date_received,comments,invoice_file
	//check if this Item name already exist so you can update the quantity in the database
    
	$check_itemname=mysqli_query($dblink,"SELECT itemname FROM procincoming WHERE itemname='$procurement_itemname'");
						if($check_itemname && mysqli_num_rows($check_itemname) >0) 
						{
							$get_quantity=mysqli_query($dblink,"SELECT total_quantity FROM procincoming WHERE itemname='$procurement_itemname'");
										//mysqli_free_result($check_itemname);

									// 	//get total_quantity  of the item by name already is in store
									// 	//add the new input quantity to the existing total_quantity
												if ($get_quantity)
											 {
											 	$quantity_result=mysqli_fetch_assoc($get_quantity);
											 	$val=$quantity_result["total_quantity"];

											 	//$quantity=+$val;
												mysqli_free_result($get_quantity);
											 }

											 //update the item and its quantity
									$in_query=mysqli_query($dblink,"UPDATE procincoming SET total_quantity=total_quantity+'$procurement_quantity', latestupdate=CURRENT_TIMESTAMP() ,latest_update_quantity='$procurement_quantity' WHERE itemname='$procurement_itemname'");	

					//check if saving was successful or not

												if ($in_query) {


													echo "<div  class='notification is-success'>
																<button class='delete'></button>
																<strong>Update successful
																</div>";
												}

												else{
													echo "An Error occured :";
												}	 

									 }

							 elseif (!mysqli_num_rows($check_itemname) >0)  {

											 	//upload();
						 	
						 	//if the item is not found already just insert the new stock into the store
									 $in_query2=mysqli_query($dblink,"INSERT INTO procincoming (itemname,total_quantity,class,company_vendor,invoice_number,cost,date_received,comments) VALUES ('$procurement_itemname','$procurement_quantity','$procurement_class','$procurement_vendor','$procurement_invoice_num','$procurement_cost','$procurement_date_rcvd','$procurement_comments')");

									 

							//check if saving was successful or not

									if ($in_query2) {


										echo "<div  class='notification is-success'>
																<button class='delete'></button>
																<center><strong>Saved </center>
																</div>" ;
									}

									else{
										echo "<div  class='notification is-danger'>
																<button class='delete'></button>
																<center><strong>An eror occured,please Contact Admin or Try again</center>
																</div>" ;
									}

						 
				 
									 	# code...
									 }
		# code...
									 pro_upload();

	}


	function pro_upload(){
		$file=$_FILES['file'];
		$filename=$_FILES['file']['name'];
		$temp_name=$_FILES['file']['tmp_name'];
		$file_size=$_FILES['file']['size'];
		$file_Error=$_FILES['file']['error'];
		$file_type=$_FILES['file']['type'];
		$file_Ext=explode('.', $filename);
		$file_actual_Ext=strtolower(end($file_Ext));
		$allowed_types=array('jpeg','jpg','pdf','png','gif','txt','doc','docx');

		if (in_array($file_actual_Ext, $allowed_types)) {
			//check if there is no error
			if ($file_Error===0) {
				if ($file_size < 2000000) {


					$fileNewName=uniqid('',true).".".$file_actual_Ext;
					$fileDestination="uploads/procurement/" . $fileNewName;
					move_uploaded_file($temp_name, $fileDestination);
				}//if szie
				else{
					echo "file size too large";

				}//else size
			}//if error 
				else{ echo "there was an error uploadingyour file";}//else no error
		}//if in array
}


 

	
?>
