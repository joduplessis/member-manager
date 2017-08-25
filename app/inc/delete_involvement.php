<?
	include "../var.php" ;
	
	if (isset($_POST['inv'])) { 
	
		$val = $_POST['inv'] ;
		foreach ($val as $value) {
			deleteInvolvement($value) ;
		}
		
		
	} else {
		print("<script>alert('Please select involvements.');window.history.back();</script>");
	}





?>