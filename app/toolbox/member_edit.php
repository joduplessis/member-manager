
<?

	
	// main menu

	print("<table width=100 cellspacing=0 cellpadding=20>");
	print("<tr><td align=center>");
	print("<canvas id='clockid' class='CoolClock:classic:60:GMTOffset'></canvas>");
		
	

	print("<br>........................................<br><br>");
	
	print("<a href=community.add.php>");
	print("Add New Member");
	print("</a>");
	
	print("<br>........................................<br><br>");
	
	print("<a href=search.php>");
	print("Do Advanced Search");
	print("</a>");	

	print("<br>........................................<br><br>");	
	
	
	print("<a href=javascript:showWindow('inc/del_member.php?id=".$_GET['id']."')>");
	print("Delete Member");
	print("</a>");	

	print("<br>........................................<br><br>");	
	
	print("<a href=javascript:window.history.back()>");
	print("Go Back");
	print("</a>");	

	print("<br>........................................<br><br>");	
	

	print("</table>");
	
	
?>