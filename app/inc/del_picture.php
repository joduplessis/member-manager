<?

	include "top_popup.php" ;
	

	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");

	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Edit Image Title</b><br><br>");
	
	print("<table width=100% height=100 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td align=center>");
	
		$id = $_GET['id'] ;		
		
		$q = mysql_query("DELETE FROM pictures WHERE id= '$id'") or die(mysql_error()) ;
		if ($q) {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}
	


	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");

	print("</center>");
	print("</table>");
	
	
	
	include "bottom_popup.php" ;

?>
