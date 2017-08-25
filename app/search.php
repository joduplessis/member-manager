<?

	include "top.php" ;
	
	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");

	include "toolbox/main.php" ;
	
	print("<td valign=top>");	
		


		
	print("<table width=99% cellspacing=0 cellpadding=20>");
	print("<tr><td>");


	print("<font size=5><b>Search</b></font><br>");
	print(".................................");
	print(".......................................................");
	print(".........................................................");
	print(".........................................................");
	print(".........................................................<br><br>");
	
	print("<table width=100% cellspacing=0 cellpadding=5>");
	
	print("<form action=search_results.php method=GET>");
	
	print("<tr><td align=right valign=top width=40%>Name / Surname : <td><input type=input size=30 name=name class=field>");
	
	print("<tr><td align=right valign=top>Contact Number : <td><input type=input size=30 name=number class=field>");
	
	print("<tr><td align=right valign=top>Address / Location : <td><input type=input size=30 name=address class=field>");
	
		print("<tr><td align=right valign=top>Homegroup : <td>");
		print("<select class=field name=homegroup id=homegroup>");
		$homegroup_query = mysql_query("SELECT homegroup.id,homegroup.member_id FROM homegroup JOIN community ON (homegroup.member_id = community.id) ORDER BY community.surname") ;
		print("<option value=''>--------------</option>");
		while ($oc_list = mysql_fetch_row($homegroup_query)) {
			print("<option value='".$oc_list['0']."'>".getCommunityMember($oc_list['1'],'name')." ".getCommunityMember($oc_list['1'],'surname')."</option>");
		}
		print("</select>");	
		
	print("<tr><td align=right valign=top>Search Only : <td>");
	
	print("<select class=field name=status id=status>");
	print("<option value=''>--------------</option>");
	print("<option value='1'>Member</option>");
	print("<option value='0'>Visitor</option>");
	print("</select><br>");	
	
	
	print("<tr><td align=right>Date : <td>");
	
	print("<input name=date size=20 id=birthday class=field>");
	
	?>		
	<img src="img/calender.gif" 
		 id="birthday_button" 
		 style="cursor: pointer; " 
		 title="Date Selector"/>

	<script type="text/javascript">
		Calendar.setup({
			inputField     :    "birthday",
			ifFormat       :    "%Y-%m-%d",
			showsTime      :    false,
			button         :    "birthday_button",
			singleClick    :    false,
			step           :    1});
	</script>
	<?
	
	// MAKING PEOPLE ABLE TO SEARCH FOR PEOPLE IN THE SERVICES
	print("<tr><td align=right valign=top>Attendance : <td>");

	$service_query = mysql_query("SELECT id,time FROM service ORDER BY time") ;
	
	print("<table cellpadding=0 cellspacing=0 border=0><tr>");
	$count = 0 ;
	while ($service_time = mysql_fetch_row($service_query)) {
		$count++ ;
		print("<td width=100><input type=checkbox name=attend[] value=".$service_time['0']." class=field>".$service_time['1']);
		if ($count==4) {
			print("<tr>");
		}
	}		
	
	print("</table>");

	////////////////////////////////////////////////////////////////
	
	print("<tr><td align=right valign=top><td><input type=submit class=field value='Search'>");

	print("</table></form>");


	
	
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
