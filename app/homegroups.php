<? 

	include "top.php" ;

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/homegroup.php" ;
	
	print("<td valign=top>");	
	
	

	///////////////////////////////////////////////////////////////////////////////////////////////////
	// main body of page 

	$query = mysql_query("SELECT * FROM homegroup ORDER BY suburb") or die(mysql_error());

	if (mysql_num_rows($query)==0) {
	
		print("<br>Sorry, there are no results.");
		
	} else {

		print("<br>There are <b>".mysql_num_rows($query)."</b> homegroups in this list.<br><br>");

		print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
		print("<tr bgcolor=#fafafa>");
		print("<td><b><font size=4>Leader</font></b>");
		print("<td><b><font size=4>Suburb</font></b>");
		print("<td><b><font size=4>Groups</font></b>");
		print("<td><b><font size=4>Meeting Day</font></b>");
		print("<td><b><font size=4>Meeting Time</font></b>");
		print("<td><b><font size=4>Elder / Pastoral Leader</font></b>");
		print("<td width=60>");
		
		print("<tr>");
			print("<td colspan=7 valign=top align=center>");
			print("...............................");
			print("...............................");
			print("...............................");
			print("...............................");
			print("...............................");
			print("...............................");
			print("...............................");
			print("...............................");
			print("...............................");
		
		while ($list = mysql_fetch_row($query)) {
		
			print("<tr bgcolor=#fafafa onClick=\"window.location='member.view.php?id=".$list['2']."'\" onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
			print("<td>".getCommunityMember($list['2'],'name')." ".getCommunityMember($list['2'],'surname'));
			print("<td>".getPlace($list['1'],'suburb'));
			print("<td>".getGroup($list['3'],'title'));
			print("<td>".$list['4']);
			print("<td>".$list['5']."PM");
			print("<td>".getCommunityMember($list['6'],'name')." ".getCommunityMember($list['6'],'surname'));			

			
			print("<td width=60 align=right>");
			print("<a href=javascript:confirmDelete('inc/del_homegroup.php?type=delete&id=".$list['0']."&mid=".$list['2']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
			print("<a href=member.view.php?id=".$list['2']." alt='View'><img src=img/view.gif border=0 alt='View'></a> ");
			print("<a href=homegroup.edit.php?id=".$list['0']." alt='Edit'><img src=img/edit.gif border=0 alt='Edit'></a> ");
			
		}

		print("<tr bgcolor=#efefef><td colspan=5 align=middle>");
		
		print("</table>");
	
	}

//-----------------------------------------------------------------------------------------------------------------------------------------------		
		
	// end of main table
	
	print("</center>");
	print("</table><Br><br>");

	// ends the main table in the include file
	
	include "bottom.php" ;

?>
