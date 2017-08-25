<?


	include "top.php" ;

	// main body of page 
	
	$id = $_GET['id'] ;

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/homegroup.php" ;
	print("<td valign=top>");	
	
	

	///////////////////////////////////////////////////////////////////////////////////////////////////
	// main body of page 
	
	
	
	print("<table cellspacing=0 cellpadding=7 width=100%>");
	print("<form action='homegroup.edit.do.php' name=form_root>");
	print("<tr><td colspan=2>");
			print("<br><font size=5><b>Edit Homegroup</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
	print("<tr><td align=right width=40%>");
	print("Person leading :");
	print("<td>");
	print("<input type=hidden name=homegroup_id value='".$id."'>");

	print("<input type=hidden name=leader_id id=leader_id value='".getHomegroup($id,'leader')."'>");
	print("<input type=text disabled class=field name=leader_name id=leader_name value='".getCommunityMember(getHomegroup($id,'leader'),'name')." ".getCommunityMember(getHomegroup($id,'leader'),'surname')."'> <a href=javascript:popup('members_popup.php',700,500)><img src=img/member.gif border=0></a>");





	//HOMEGROUP   BOX /////////////////////////////////////////////////////////////////////////////////////////////////
		
		$homegroup_age = getHomegroup($id,'age_group') ;
		$homegroup_suburb = getHomegroup($id,'suburb') ;
		$homegroup_day = getHomegroup($id,'day') ;
		$homegroup_time = getHomegroup($id,'time') ;
		$homegroup_elder = getHomegroup($id,'elder') ;

		// GROUP //////////////////////////////////

		print("<tr><td align=right>");		
		print("Group : ");
		print("<td>");
		print("<select name=homegroup_age class=field>");
		$age_query = mysql_query("SELECT id,title FROM groups") or die(mysql_error()) ;
		print("<option value='".$homegroup_age."'>".getGroup($homegroup_age,'title')."</option>");
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
		print("<option value='".$homegroup_suburb."'>".getPlace($homegroup_suburb,'suburb')."</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {					
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");
		
		// MEETING DAY//////////////////////////////////
		
		print("<tr><td align=right>");
		
		print("Meeting Day : ");
		print("<td>");
		print("<select name=homegroup_day class=field>");
		print("<option value='".$homegroup_day."'>".$homegroup_day."</option>");
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
		print("<option value='".$homegroup_time."'>".$homegroup_time."PM</option>");
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
		
		print("<select name=homegroup_elder class=field onChange=calc() id=homegroup>");
		
		$elder_id_sql = "SELECT id, name, surname FROM community WHERE leadership = '2' OR leadership = '1' ORDER BY surname" ;
		
		print("<option value='".$homegroup_elder."'>".getCommunityMember($homegroup_elder,'name')." ".getCommunityMember($homegroup_elder,'surname')."</option>");
		print("<option value='0'>--------------</option>");				
		
		$homegroup_query = mysql_query($elder_id_sql) ;
		
		while ($oc_list = mysql_fetch_row($homegroup_query)) {
			print("<option value='".$oc_list['0']."'>".$oc_list['1']." ".$oc_list['2']."</option>");
		}
		
		print("</select>");
		

		
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		print("<tr><td>");
		print("<td><input type=submit value='Edit Homegroup' class=field>");
		print("<tr><td align=right><td>");
		
		print("</table></form>");
	
	

	
	

?>
