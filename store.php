<?php 
/**
this class decribes the template of input details of store entry,
the "_variable" decribes  what we get from the html interfaces
these are held in and array to be manipulated on befor sending to the
databse as we change values of some variables with this class






*/

class Store{

	 function 
	function incoming(_date,_item_name,_approval,_requested_by,_destination,_quantity){
		$incoming_array=[
			$date->_date,
			$item_name    -> _item_name,
		    $requested_by -> _requested_by,
		    $spproved_by  ->  _approval,
		    $destination  -> _destination,
		    $updated_qty  -> _quantity
	]; 
		function subTotal(qty,updated_qty)
			_subTotal=qty+updated_qty;
		return _subTotal;



		return $incoming_array;


	}

	function out_going(){


	}


}

?>