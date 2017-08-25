<?

	include "top_popup.php" ;
	
	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");
	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Edit Image Title</b><br><br>");
	print("<table width=100% height=100 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td align=center>");
	
	$id = $_GET['id'] ;
	
	if (!isset($_GET['title'])) {
	
		$query = mysql_query("SELECT title FROM pictures WHERE id = '$id'") or die(mysql_error()) ;
		$list = mysql_fetch_row($query) ;
		print("<form action=edit_picture.php method=GET>");
		print("<input type='hidden' name='id' value='".$id."'>");
		print("<input type='text' name='title' value='".$list['0']."' class=field size=40> ");
		print("<input type=submit value='Edit Title Now' class=field></p>");
		print("</form>");
		
	} else {

		$title = $_GET['title'] ;
		$id = $_GET['id'] ;		
		$q = mysql_query("UPDATE pictures SET title = '$title' WHERE id= '$id'") or die(mysql_error()) ;
		if ($q) {
			print("<script>window.location='../picture.php?id=".$id."';</script>");
		}
	
	}

	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");

	print("</center>");
	print("</table>");
	
	include "bottom_popup.php" ;

?>