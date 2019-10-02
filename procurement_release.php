
<?php
include  ('conection_link.php');
mysqli_select_db($dblink,$database) or  die('could not find database');


if(isset($_POST['submit_release'])){


			$release_itemname=$_POST['release_itemname'];
			$release_quantity=(int) $_POST['release_qty'];



			$check_itemname=mysqli_query($dblink,"SELECT itemname FROM procincoming WHERE itemname='$release_itemname'");
			if($check_itemname && mysqli_num_rows($check_itemname) >0) 
						{
							$get_quantity=mysqli_query($dblink,"SELECT total_quantity FROM procincoming WHERE itemname='$release_itemname'");
										//mysqli_free_result($check_itemname);

									// 	//get total_quantity  of the item by name already is in store
									// 	//SUBTRACT the new input quantity FROM the existing total_quantity
												if ($get_quantity)
											 {
											 	$quantity_result=mysqli_fetch_assoc($get_quantity);
											 	$val=$quantity_result["total_quantity"];

											 	//$quantity=+$val;
												mysqli_free_result($get_quantity);
											 }

											 //update the item and its quantity
									$out_query=mysqli_query($dblink,"UPDATE procincoming SET total_quantity=$val - '$release_quantity', latestrelease=CURRENT_TIMESTAMP() ,latest_release_quantity='$release_quantity' WHERE itemname='$release_itemname'");	

					//check if saving was successful or not

												if ($out_query) {


													echo "<div id='release_notification' class='notification is-success'>
																<button class='delete'></button>
																<strong>Release successful
																</div>
													 ";
												}

												else{
													echo "<div  class='notification is-danger'>
																<button class='delete'></button>
																<center><strong>An eror occured,please Contact Admin or Try again</center>
																</div>";//.mysqli_error() . "Give a us a sec and try again";
												}	 

									 }

									 req_upload();


}



	function req_upload(){
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
					$fileDestination="uploads/releases/" . $fileNewName;
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
