<?

	include "top.php" ;
	
	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");

	include "toolbox/main.php" ;
	
	print("<td valign=top>");	
		


		
	print("<table width=99% cellspacing=0 cellpadding=20>");
	print("<tr><td>");


	print("<font size=5><b>Homegroup Search</b></font><br>");
	print(".................................");
	print(".......................................................");
	print(".........................................................");
	print(".........................................................");
	print(".........................................................<br><br>");
	
	print("<table width=100% cellspacing=0 cellpadding=5>");
	
	print("<form action=search_homegroups_results.php method=GET>");
	
	print("<tr><td align=right valign=top width=40%>Leader Name / Surname : <td><input type=input size=30 name=name class=field>");
	
		print("<tr><td align=right valign=top>Suburb : <td>");
		print("<select name=homegroup_suburb class=field>");
		$age_query = mysql_query("SELECT id,suburb FROM suburbs") or die(mysql_error()) ;
		print("<option value=''>--------------</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {					
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");
		
		
		print("<tr><td align=right valign=top>Group : <td>");
		print("<select name=homegroup_age class=field>");
		$age_query = mysql_query("SELECT id,title FROM groups") or die(mysql_error()) ;
		print("<option value=''>--------------</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");	
		
		print("<tr><td align=right valign=top>Meeting Days : <td>");
		print("<select name=homegroup_day class=field>");
		print("<option value=''>--------------</option>");
		print("<option value='Monday'>Monday</option>");
		print("<option value='Monday'>Tuesday</option>");
		print("<option value='Monday'>Wednesday</option>");
		print("<option value='Monday'>Thursday</option>");
		print("<option value='Monday'>Friday</option>");
		print("<option value='Monday'>Saturday</option>");
		print("<option value='Monday'>Sunday</option>");
		print("</select>");	

		print("<tr><td align=right valign=top>Meeting Times : <td>");
		print("<select name=homegroup_time class=field>");
		print("<option value=''>--------------</option>");
		print("<option value='5:00'>5:00PM</option>");
		print("<option value='5:30'>5:30PM</option>");
		print("<option value='6:00'>6:00PM</option>");
		print("<option value='6:30'>6:30PM</option>");
		print("<option value='7:00'>7:00PM</option>");
		print("<option value='7:30'>7:30PM</option>");
		print("<option value='8:00'>8:00PM</option>");
		print("</select>");			
		
		print("<tr><td align=right valign=top width=40%>Elder / Pastoral Leader / Name / Surname : <td>");
		print("<select name=homegroup_elder class=field id=homegroup>");
		
		$elder_id_sql = "SELECT id, name, surname FROM community WHERE leadership = '2' OR leadership = '1' ORDER BY surname" ;
		
		print("<option value=''>--------------</option>");				
		
		$homegroup_query = mysql_query($elder_id_sql) ;
		
		while ($oc_list = mysql_fetch_row($homegroup_query)) {
			print("<option value='".$oc_list['0']."'>".$oc_list['1']." ".$oc_list['2']."</option>");
		}
		
		print("</select>");
		
	
	
	////////////////////////////////////////////////////////////////
	
	print("<tr><td align=right valign=top><td align=left><input type=submit class=field value='Search'>");

	print("</table>");


	
	
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
