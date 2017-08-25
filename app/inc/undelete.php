<?
	include "../var.php" ;		
	$id = $_GET['id'] ;		
	
	$q = mysql_query("UPDATE community SET deleted = '0' WHERE id= '$id'") or die(mysql_error()) ;
	
	if ($q) {
		print("<script>window.history.back();</script>");
	}	
	
?>
