<?

	include "top_popup.php" ;

		$id = $_GET['id'] ;		
		
		$q = mysql_query("DELETE FROM relationship WHERE id= '$id'") or die(mysql_error()) ;
		if ($q) {
			print("<script>window.history.back();</script>");
		}
	



?>
