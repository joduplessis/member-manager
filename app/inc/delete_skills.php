<?
	include "../var.php" ;
	if (isset($_POST['skill'])) { 
	
		$val = $_POST['skill'] ;
		foreach ($val as $value) {
			deleteSkill($value) ;
		}
		
		
	} else {
		print("<script>alert('Please select skills.');window.history.back();</script>");
	}





?>