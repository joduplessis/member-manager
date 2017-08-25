<?


	include "top.php" ;

	// main body of page 
	

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
include "toolbox/back.php" ;
	
	print("<td valign=top>");	
	
		

	///////////////////////////////////////////////////////////////////////////////////////////////////
	// main body of page 
	
	print("<table cellspacing=0 cellpadding=7 width=100%>");
	print("<form action='error.do.php' name=form_root>");
	print("<tr><td align=right><td>");
	print("<tr><td align=right width=40% valign=top>");
	print("Error Description :");
	print("<td>");
	
	print("<textarea cols=40 rows=10 class=field name=error></textarea>");
	
	print("<tr><td>");
	print("<td><input type=submit value='Report' class=field>");
	print("<tr><td align=right><td>");
	print("</form>");
	print("</table>");
	
	
	
	$query = mysql_query("SELECT * FROM error") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
				print("<tr bgcolor=red>");
				print("<td valign=top><b><font color=white>Date</font></b>");
				print("<td valign=top><b><font color=white>Error</font></b>");
				print("<td valign=top><b><font color=white>User</font></b>");

				
				while ($list = mysql_fetch_row($query)) {
				
					print("<tr bgcolor=white onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='white';\">");
					print("<td>".$list['2']);
					print("<td>".$list['3']);
					print("<td>".$list['1']);
				
				}
	

				print("</table>");

			print("</table>");

		}

	

	
	

?>
