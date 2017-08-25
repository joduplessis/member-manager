<?

	include "top.php" ;
	include "var.compile.php" ;
	
	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");

	include "toolbox/main.php" ;
	
	print("<td valign=top>");	
	
	print("<br><font size=5><b>Search</b></font><br>");
	print(".................................");
	print(".......................................................");
	print(".........................................................");
	print(".........................................................");
	print(".........................................................<br><br>");
	
	$sql_search = array() ;
	
	if ($_GET['name']!="") {
		array_push($sql_search,"name LIKE '%".$_GET['name']."%'") ;
		array_push($sql_search,"surname LIKE '%".$_GET['name']."%'") ;
	}

	if ($_GET['homegroup_suburb']!="") {
		array_push($sql_search,"suburb LIKE '%".$_GET['homegroup_suburb']."%'") ;
	}

	if ($_GET['homegroup_age']!="") {
		array_push($sql_search,"age_id LIKE '%".$_GET['homegroup_age']."%'") ;
	}

	if ($_GET['homegroup_day']!="") {
		array_push($sql_search,"day LIKE '%".$_GET['homegroup_day']."%'") ;
	}

	if ($_GET['homegroup_time']!="") {
		array_push($sql_search,"time LIKE '%".$_GET['homegroup_time']."%'") ;
	}	
	
	if ($_GET['homegroup_elder']!="") {
		array_push($sql_search,"elder LIKE '%".$_GET['homegroup_elder']."%'") ;
	}	

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	$sql_search_text = "" ;
		
	if (sizeof($sql_search)!=0) {
		$sql_search_text = "WHERE (".implode(" OR ",$sql_search).")" ;
	} else {
		$sql_search_text = "" ;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
	$sql = "SELECT * FROM homegroup " . $sql_search_text . " ORDER BY suburb"  ;
	
	$query = mysql_query($sql) or die(mysql_error());
	
	if (mysql_num_rows($query)==0) {
	
		print("<br>Sorry, your search has returned no results.");
		
	} else {


		print("<br>There are <b>".mysql_num_rows($query)."</b> homegroup search results.<br><br>");
		print("<a href='".makeHomegroupCSV($sql)."'><img src=img/csv.gif border=0></a>");
		print("&nbsp;&nbsp;&nbsp;");
		print("<a href='".makeHomegroupPDF($sql)."'><img src=img/pdf.gif border=0></a>");		

		
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
				print("<td colspan=6 valign=top align=center>");
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

	
			print("</table>");
		

		print("</table>");

	
	}		
		
		

	
	
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
