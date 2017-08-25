<?
	include "../var.php" ;		
	
	$id = $_GET['id'] ;		
	
	if ($_GET['type']=="tag") {
		$q = mysql_query("UPDATE community SET deleted = '1' WHERE id= '$id'") or die(mysql_error()) ;
	} else {
		$q = mysql_query("DELETE FROM community WHERE id= '$id'") or die(mysql_error()) ;
	}

	if ($q) {
		print("<script>window.history.back();</script>");
	}	
	
?>
