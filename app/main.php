<? 

	include "top.php" ;

	
	

	// main body of page 

		print("<table width=100% cellspacing=0 cellpadding=0>");
		print("<tr>");
		print("<td width=100 valign=top align=center>");
		
		include "toolbox/main.php" ;
		
		print("<td align=left valign=top>");
		
		print("<table width=100% cellspacing=10 cellpadding=0 align=right>");
		print("<tr><td colspan=2>");
		print("<font size=4>Latest News</font><br>");
		print("<table width=100% cellspacing=1 cellpadding=5 align=right bgcolor=#f1f1f1>");
		print("<tr><td bgcolor=white>");
		
		$query = mysql_query("SELECT * FROM news WHERE expire > CURDATE()") or die(mysql_error()) ;

		if (mysql_num_rows($query)==0) {
			print("No happening events. <a href=news.php>Click here to see all news.</a> ");
		} else {	
			while ($list = mysql_fetch_row($query)) {
				print($list['1']."<Br>") ;
			}
		}

		print("</table>");
		print("<br><Br><br>");
		print("<font size=4>Latest Events</font><br>");
		print("<table width=100% cellspacing=1 cellpadding=5 align=right bgcolor=#f1f1f1>");
		print("<tr><td bgcolor=white>");		
		$query_one = mysql_query("SELECT * FROM events WHERE date_start < CURDATE() AND date_end > CURDATE()") or die(mysql_error()) ;
		if (mysql_num_rows($query_one)==0) {
			print("No happening events. <a href=events.php>Click here to see all events.</a> ");
		} else {
			while ($list_one = mysql_fetch_row($query_one)) {
				print($list_one['1']."<br>") ;
			}
		}
		print("</table>");


		
		print("</table>");
		print("</table>");


	include "bottom.php" ;

?>
