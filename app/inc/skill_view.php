<?

	include "top_popup.php" ;
	

	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");

	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Skill Qualification</b><br><br>");
	
	print("<table width=100% height=200 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td>");
	
	// sql details
	
	$id = $_GET['id'] ;
	
	$sql = "SELECT qualifications FROM skill_member WHERE id = '$id' ";
	
	$query = mysql_query($sql) or die(mysql_error());
	$list = mysql_fetch_row($query) ;
	
	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	
	if ($list['0']=="") {
		print("<tr><td align=center valign=top>None");	
	} else {
		print("<tr><td align=center valign=top>".$list['0']);	
	}
	
	// end of main table

	print("</table>");
	print("</center>");
	print("</table>");
	
	
	
	include "bottom_popup.php" ;

?>
