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
	print("<form action='homegroup.add.do.php' name=form_root>");
	print("<tr><td colspan=2>");
			print("<br><font size=5><b>Add Homegroup</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
	print("<tr><td align=right width=40%>");
	print("Person leading :");
	print("<td>");
	
	print("<input type=hidden name=homegroup_leader id=leader_id>");
	print("<input type=text disabled class=field name=leader_name id=leader_name> <a href=javascript:popup('members_popup.php',700,500)><img src=img/member.gif border=0></a>");


		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
		
		// AGE GROUP //////////////////////////////////

		print("<tr><td align=right>");		
		print("Group : ");
		print("<td>");
		print("<select name=homegroup_age class=field>");
		$age_query = mysql_query("SELECT id,title FROM groups") or die(mysql_error()) ;
		print("<option value=''>--------------</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");
		
		// SUBURB //////////////////////////////////					
		
		print("<tr><td align=right>");
		
		print("Suburb : ");
		print("<td>");
		print("<select name=homegroup_suburb class=field>");
		$age_query = mysql_query("SELECT id,suburb FROM suburbs") or die(mysql_error()) ;
		print("<option value=''>--------------</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {					
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");
		
		// MEETING DAY//////////////////////////////////
		
		print("<tr><td align=right>");
		
		print("Meeting Day : ");
		print("<td>");
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
		
		// MEETING TIME //////////////////////////////////
		
		print("<tr><td align=right>");
		
		print("Meeting Time : ");
		print("<td>");
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
		
		// ELDER  //////////////////////////////////
		
		print("<tr><td align=right>");
		
		print("Elder / Pastoral Leader : ");
		
		print("<td>");
		
		print("<select name=homegroup_elder class=field id=homegroup>");
		
		$elder_id_sql = "SELECT id, name, surname FROM community WHERE leadership = '2' OR leadership = '1' ORDER BY surname" ;
		
		
		print("<option value='0'>--------------</option>");				
		
		$homegroup_query = mysql_query($elder_id_sql) ;
		
		while ($oc_list = mysql_fetch_row($homegroup_query)) {
			print("<option value='".$oc_list['0']."'>".$oc_list['1']." ".$oc_list['2']."</option>");
		}
		
		print("</select>");
		

		
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		print("<tr><td>");
		print("<td><input type=submit value='Add Homegroup' class=field>");
		print("<tr><td align=right><td>");
		print("</form>");
		print("</table>");
	
	

	
	

?>
