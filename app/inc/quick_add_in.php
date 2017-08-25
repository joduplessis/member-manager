<?

	include "top_popup.php" ;
	

	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");

	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Add Involvement</b><br><br>");
	
	print("<table width=100% height=100 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td>");
	
	$id = $_GET['id'] ;
	
	if (!isset($_GET['in'])) {
	
		print("<form action=quick_add_in.php method=GET>");
		
		print("<select name=in class=field>");
		
		$query = mysql_query("SELECT id,title FROM involvement") ;
		while ($list = mysql_fetch_row($query)) {
			print("<option value='".$list['0']."'>".$list['1']."</option>");
		}
		
		print("</select><br><br>");
		
			print("<select name=role class=field>");
		
		$rquery = mysql_query("SELECT id,role FROM roles") ;
		while ($rlist = mysql_fetch_row($rquery)) {
			print("<option value='".$rlist['0']."'>".$rlist['1']."</option>");
		}
		
		print("</select> (Role In Involvement)<br><br>");	
		print("<input type='hidden' name='id' value='".$id."'>");
		
		print("<input type=submit value='Add Involvement Now' class=field></p>");
		print("</form>");
		
	} else {
	
		$in = $_GET['in'] ;
		$role = $_GET['role'] ;
		addInvolvement($id,$in,$role) ;
	
	
	}

	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<tr><td align=center valign=top>".$list['0']);
	
	// end of main table

	print("</table>");
	print("</center>");
	print("</table>");
	
	
	
	include "bottom_popup.php" ;

?>
