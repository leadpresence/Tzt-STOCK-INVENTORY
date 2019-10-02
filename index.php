
<?php
include  ('conection_link.php');
include('procurement_incoming.php');
include('procurement_release.php');
include('reports.php')

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIZETI STORE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.7.x-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.5/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <script async type="text/javascript" src="../js/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>



  
    <div class="container">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                       
                    </p>
                    <ul class="menu-list">
                        <li><a type="button"  data-target="stock_entry" class="is-active">Dashboard</a></li>
                        <br>

                        <li><a  id="stock_entry">PROCUREMENT</a></li><br>
                        <li><a  id="stock_release">STOCK RELEASE</a></li>
                        <li><a  id="stock_release">STOCK RETURNS</a></li>
                        
                    </ul>
                    <p class="menu-label">
                        Reports
                    </p>
                    <ul class="menu-list">
                        <li><a name="procurment_report_btn" id="procurment_report">Procurement Report</a></li>
                        <li><a i id="release_report" >Stock Release Report</a></li>
                        <li></li>
                    </ul>
                    <p class="menu-label">
                        Presferences
                    </p>
                    <ul class="menu-list">
                        <li><a id="procurment_report">Show Levels</a></li>
                        <li><a i id="release_report" >Notifications</a></li>
                        <li></li>
                    </ul>
                           
                </aside>
            </div>
            <div class="column is-9">
                <nav class="breadcrumb" aria-label="breadcrumbs">
                 
                </nav>
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hello, Afolabi
                            </h1>
                            <h2 class="subtitle">
                                Store Stock
                            </h2>
                        </div>
                    </div>
                </section>
 <!--Stock levels-->
                
 <nav class="level">
  			<?php 
  			if ($stock_levels && mysqli_num_rows($stock_levels)>0) {
  				# code...
  				while ($level_row=mysqli_fetch_array($stock_levels)){
  					//

  					
  					//$levelRow=mysqli_fetch_assoc($stock_levels);
  				echo  "<div class='level-item has-text-centered'>
   					 <div>
      					<p class='heading'>". $level_row["itemname"]."</p>
    					  <p class='title'>".$level_row["total_quantity"]."</p></div></div>";
  			
  				}
  				
  			}


  			 ?>
 
<!--//Stock levels-->
                
  

  


</nav>
              


<!-- Procurement Table-->
               <section>
            	<div id="procurment_report_table" class="container is-hidden">
            		<div class="hero-body">
            			<!--<a class="button"  id="close_report" class="is-small"> Close Report</a>-->
            			<div id="procurment_report_the_table" class="table-container">
  								<table class="table is-striped is-hoverable is-narrow">
  									<thead>
   										<tr>
    										  <th>Item Name</th>
    									  	  <th>Total In store</th>
   										     <th>Class of Item</th>
   										     
    									  	  <th>Latest Qty Added</th>
   										     <th>Date/ Last Addition</th>
   										     
   										    
  										</tr>
  									</thead>
  										<tbody>
  											<?php 	if($table_query && mysqli_num_rows($table_query)>0){
  												 while ($proc_row=mysqli_fetch_assoc($table_query)) {

	echo "<tr><td>". $proc_row["itemname"]. "</td><td>" . $proc_row["total_quantity"] . "</td><td>" .$proc_row["class"] ."</td><td>" .$proc_row["latest_update_quantity"]. "</td><td>".$proc_row["latestupdate"]."<tr><td>";
	
  											
}


  												;}; ?>
  										
  										</tbody>
    
 								 </table>
						</div>

            		</div>
            	</div>
            </section><!-- // Procurement Table-->



<!-- Realease Table-->
               <section>
            	<div id="release_report_table" class="container is-hidden">
            		<div class="hero-body">
            			<!--<a class="button"  id="close_report" class="is-small"> Close Report</a>-->
            			<div id="release_report_the_table" class="table-container">
  								<table class="table is-striped is-hoverable">
  									<thead>
   										<tr>
    										  <th>Item Name</th>
    									  	  <th>Total In store</th>
   										     <th>Class of Item</th>
   										     
    									  	  <th>Latest Qty Released</th>
   										     <th>Date/Time Last Release</th>
   										     
   										    
  										</tr>
  									</thead>
  										<tbody>

  										<?php 	if($release_table_query && mysqli_num_rows($release_table_query)>0){
  												 while ($proc_row=mysqli_fetch_assoc($release_table_query)) {

	echo "<tr><td>". $proc_row["itemname"]. "</td><td>" . $proc_row["total_quantity"] . "</td><td>" .$proc_row["class"] ."</td><td>" .$proc_row["latest_release_quantity"]. "</td><td>".$proc_row["latestrelease"]."<tr><td>";
	
  											
}


  												;};?>
  										</tbody>
    
 								 </table>
						</div>

            		</div>
            	</div>
            </section><!-- // Release Table-->



            </div>


   


<!---->

<!--start prpcurment modal -->

				<div  id="stock_entry_modal" class="modal">
					  <div class="modal-background"></div>
					  <div class="modal-card">
					    <header class="modal-card-head"><button class="modal-close"></button>
					      <p class="modal-card-title">Stock Entry</p>
					      
					    </header>
					    <!-- procurement Form -->
					    <section class="modal-card-body">
					    	

					    		 <form action="" method="POST" enctype="multipart/form-data">
								<div>

										<div class="field">
											 <p class="control has-icons-left has-icons-right">
								  			<label class="label">Item Name</label>
											  <div class="control">
											    <input class="input is-small " type="text" placeholder="e.g Microtic"  name="procurement_itemname">
			
											  </div>
											</p>
								        </div>
								        <div class="field is-small">
								        	<label>Select Class</label>
 												 <div class="control">
   										 <div class="select is-primary is-small">
   										 	
     									 <select name="class">
       										 
       										 <option>Asset</option>
       										  <option>Inventory</option>
       										   <option>Other</option>
     										 </select>
   										 </div>
  										</div>

										</div>
										 
										
										<div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Quantity</label>
											  <div class="control">
											    <input class="input is-small" type="Number" placeholder="e.g 150"  name="procurement_quantity">
											  </div></p>
								        </div>

								         <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Company/Vendor</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="Company/Vendor"  name="company_vendor">
											  </div></p>
								        </div>

								         <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Invoice </label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="Invoice Number"  name="invoice_number">
											  </div></p>
								        </div>
								        <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Cost</label>
											  <div class="control">
											    <input class="input is-small" type="Number" placeholder="e.g #30000"  name="cost">
											  </div></p>
								        </div>
								        <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Date Recieved</label>
											  <div class="control">
											    <input class="input is-small" type="date" placeholder="2020-1-1"  name="date_recieved">
											  </div></p>

								        </div>
								        
								         <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">comments</label>
											  <div class="control">
											    <input class="textarea is-small" type="text" placeholder="comments"  name="comments">
											  </div></p>
								        </div>
								         <div>
								        	<div class="field is-small">
											<div class="file">
	  												<label class="file-label">
	   												 <input class="file-input is-small" type="file" name="file">
	   												 <span class="file-cta">
	    												  <span class="file-icon">
	        														<i class="fas fa-upload"></i>
	     														 </span>
	     												 <span class="file-label">
	      												  Upload File(invoice)
		  												    </span>
		  														  </span>
		 														 </label>

																</div>
																 
								        </div>
								        </div><br><br>

								
								       
								
								        <footer class="modal-card-foot">
										     
										          <button class="button is-primary" name="submit_incoming">Submit Entry</button>
										        
										      		
										      	
										    </footer>
							
							
						          </div>
					       </form>
					   

					    	 </section>
					    	</div>
					    	</div>

<!--end procurment modal -->


					    	<!--Release   form-->




				<div  id="stock_release_modal" class="modal">
					  <div class="modal-background"></div>
					  <div class="modal-card">
					    <header class="modal-card-head">
					      <p class="modal-card-title">Stock Release</p>
					      <!--<button class="delete" aria-label="close"></button> -->
					    </header>
					        <button class="modal-close"></button>
					    <section class="modal-card-body">

					    		 <button class="modal-close"></button>
					    		 <form action="" method="POST">
								<div>

										<div class="field is-small">
											 <p class="control has-icons-left has-icons-right">
								  			<label class="label">Item Name</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="e.g Microtic"  name="release_itemname">
			
											  </div>
											</p>
								        </div>

								        <div class="field is-small">
								        	<label>Select Class</label>
 												 <div class="control">
   										 <div class="select is-primary is-small">
   										 	
     									 <select>
       										 
       										 <option>Asset</option>
       										  <option>Inventory</option>
       										   <option>Other</option>
     										 </select>
   										 </div>
  										</div>

										</div>
										 
										
										<div class="field">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Quantity to be Released</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="e.g 150"  name="release_qty">
											  </div></p>
								        </div> 


								         <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Requested By</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="Requested By"  name="requested_by">
											  </div></p>
								        </div>
								         <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Approved By</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="Approved By"  name="approved_by">
											  </div></p>
								        </div>
								        <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Recieved By</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="Recieved By"  name="recieved_by">
											  </div></p>
								        </div>
								        <div class="field is-small">
											<p class="control has-icons-left has-icons-right">
								  			<label class="label">Destination</label>
											  <div class="control">
											    <input class="input is-small" type="text" placeholder="Destination"  name="destination">
											  </div></p>
								        </div>
								        <div class="field is-small">
											<div class="file">
	  												<label class="file-label">
	   												 <input class="file-input is-small" type="file" name="file">
	   												 <span class="file-cta">
	    												  <span class="file-icon">
	        														<i class="fas fa-upload"></i>
	     														 </span>
	     												 <span class="file-label">
	      												  Upload File(Requisition)
		  												    </span>
		  														  </span>
		 														 </label>

																</div>
																 
								        </div>
								        </div><br><br>

								       

								        
								        <footer class="modal-card-foot">
										     
										          <button class="button is-primary" name="submit_release">Submit Release</button>
										        
										      		<!--<button class="button">Cancel</button>-->
										      	
										    </footer>
							
							
						          </div>
					       </form>
					   

					    	 </section>
					    	</div></div>
	
<!--end procurment Release-->
    
					
						
         



<!--image upload form-->	
					

         		

   </div></div><!--container--><!--column-->
    




 <script async type="text/javascript" src="../js/bulma.js"></script>
 <script type="text/javascript">
    	
$("#stock_entry").click(function(){
	//alert("entry");
	$("#stock_entry_modal").addClass("is-active");});
$(".modal-close").click(function() {
   $("#stock_entry_modal").removeClass("is-active");
});


</script>

<script type="text/javascript">
$("#stock_release").click(function(){
	//alert('release');
	$("#stock_release_modal").addClass("is-active");});
	
$(".modal-close").click(function() {
   $("#stock_release_modal").removeClass("is-active");
});

$(".delete").click(function(){
//$(".notification").removeChild("notification")    
$(this).parent().addClass('is-hidden');
    return false
})
    	
    </script>
    <script type="text/javascript">
    	
    	$("#procurment_report").click(function(){
    		//show procurement table
$("#procurment_report_table").removeClass("is-hidden");
//hide released tabble
$("#release_report_table").addClass("is-hidden");});
    	
    	//$("#close_report").click(function(){
//$("#procurment_report_the_table").addClass("is-hidden");



    	
    	$("#release_report").click(function(){
$("#release_report_table").removeClass("is-hidden");
$("#procurment_report_table").addClass("is-hidden");});


//     	$("#uploadButton").click(function(){
//     		$("#imageUpload_modal").addClass("is-active");
//     	});
//     	$("#closeUploadModal").click(function() {
//    $("#imageUpload_modal").removeClass("is-active");
//    $("#stock_entry_modal").addClass("is-active");
// });

    </script>
</body>

</html>

