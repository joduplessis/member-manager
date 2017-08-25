<? 

	include "top.php" ;

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/back.php" ;
	
	if ($_SESSION['username']!="admin") {
		print("<script>alert('Sorry, you need to be the adminstrator.');window.location='main.php';</script>") ;
	}
	
	print("<td valign=top>");	
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
	
		print("<table width=99% cellspacing=0 cellpadding=20>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Settings</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
		print("<blockquote>");
		print("<table width=100% cellspacing=0 cellpadding=5>");
		print("<tr><td><li><a href=settings_list.php?area=users>Users</a>");
		print("<tr><td><li><a href=settings_list.php?area=occupations>Occupations</a>");
		print("<tr><td><li><a href=settings_list.php?area=locations>Towns & Suburbs</a>");
		print("<tr><td><li><a href=settings_list.php?area=involvements>Involvements</a>");
		print("<tr><td><li><a href=settings_list.php?area=groups>Groups</a>");
		print("<tr><td><li><a href=settings_list.php?area=roles>Roles</a>");
		print("<tr><td><li><a href=settings_list.php?area=skills>Skills</a>");
		print("<tr><td><li><a href=settings_list.php?area=relationship>Relationships</a>");
		print("<tr><td><li><a href=settings_list.php?area=leadership>Leadership Types</a>");		
		print("<tr><td><li><a href=settings_list.php?area=service>Service Times</a>");		
		print("</table>");	
		print("</blockquote>");					
		print("</table>");
	
//-----------------------------------------------------------------------------------------------------------------------------------------------		
		
	print("</table>");

	include "bottom.php" ;

?>
