<?

	include "top_popup.php" ;
	

	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");

	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Edit Involvement</b><br><br>");
	
	print("<table width=100% height=100 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td>");
	
	if (!isset($_GET['in'])) {
	
		$id = $_GET['id'] ;
		$r_id = $_GET['rid'] ;
	
		$i_id = getInvolvementID($id) ;
		
		print("<form action=edit_involvement.php method=GET>");		
		
		print("<select name=in class=field>");
		
		print("<option value='$i_id'>".getInvolvement($i_id,'title')."</option>");
		print("<option value=''>------------</option>");

		$query = mysql_query("SELECT id,title FROM involvement") ;
		
		while ($list = mysql_fetch_row($query)) {
			print("<option value='".$list['0']."'>".$list['1']."</option>");
		}
		
		print("</select><br><br>");
		
		
		
		
		
		
		
		
		print("<select name=role class=field>");
		
		print("<option value='$r_id'>".getRole($r_id)."</option>");
		print("<option value=''>------------</option>");
		
		$queryr = mysql_query("SELECT id,role FROM roles") ;
		
		while ($listr = mysql_fetch_row($queryr)) {
			print("<option value='".$listr['0']."'>".$listr['1']."</option>");
		}
		
		print("</select><br><br>");
		








		
		print("<input type='hidden' name='id' value='".$id."'>");
		
		print("<input type=submit value='Edit Involvement Now' class=field></p>");
		print("</form>");
		
	} else {
	
		if ($_GET['in'] == "") {
			print("<script>alert('Please select an involvment.');window.history.back();</script>");
		}
		
		$in = $_GET['in'] ;
		$id = $_GET['id'] ;
		$role = $_GET['role'] ;
		
		editInvolvement($id,$in,$role) ;
	
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
