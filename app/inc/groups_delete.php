<?
	include "../var.php" ;
	
	if (isset($_POST['gr'])) { 
	
		$val = $_POST['gr'] ;
		foreach ($val as $value) {
			deleteGroup($value) ;
		}
		
		
	} else {
		print("<script>alert('Please select involvements.');window.history.back();</script>");
	}





?>