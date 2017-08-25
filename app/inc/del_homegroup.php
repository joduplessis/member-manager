<?
	include "../var.php" ;		
	
	$id = $_GET['id'] ;		
	$mid = $_GET['mid'] ;	
	
	mysql_query("DELETE FROM homegroup WHERE id= '$id'") or die(mysql_error()) ;
	mysql_query("UPDATE community SET homegroup = '' WHERE id = '$mid'") or die(mysql_error()) ;
	
	print("<script>window.location = '../homegroups.php';</script>");
	
?>
