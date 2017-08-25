
<?

	
	// main menu

	print("<table width=100 cellspacing=0 cellpadding=20>");
	print("<tr><td align=left>");
	print("<canvas id='clockid' class='CoolClock:classic:60:GMTOffset'></canvas>");
		
	print("<form action=members.php method=GET>");				

	print("<br>........................................<br><br>");

	print("<font size=4 color=#285e95>Quick Search</font>");
	print("<br><br>");
	
	print("<input type=text size=20 name=name class=field value='Name / Surname'>");
	print("<br><br>");
	print("<input type=text size=20 name=number class=field value='Contact Number'>");
	print("<br><br>");
	print("<input type=image src=img/login.gif>");

	print("</form>");

	print("........................................<br><br>");	
	
	print("<div align=center>");
	
	print("<a href=community.add.php>");
	print("Add a new member?");
	print("</a>");
	
	print("<br><br>");
	
	print("<a href=community.import.php>");
	print("Import members from the visitors sheets?");
	print("</a>");
	
	print("</div>");
		
	print("</table>");
	
	
?>