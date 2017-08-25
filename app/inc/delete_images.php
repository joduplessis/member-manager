<?
	include "../var.php" ;
	
	if (isset($_POST['img'])) { 
	
		$val = $_POST['img'] ;
		foreach ($val as $value) {
			deleteImage($value) ;
		}
		
		
	} else {
		print("<script>alert('Please select images.');window.history.back();</script>");
	}





?>