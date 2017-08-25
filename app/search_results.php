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
		array_push($sql_search,"community.name LIKE '%".$_GET['name']."%'") ;
		array_push($sql_search,"community.surname LIKE '%".$_GET['name']."%'") ;
	}

	if ($_GET['number']!="") {
		array_push($sql_search,"community.mobile LIKE '%".$_GET['number']."%'") ;
		array_push($sql_search,"community.tel_home LIKE '%".$_GET['number']."%'") ;
		array_push($sql_search,"community.tel_work LIKE '%".$_GET['number']."%'") ;
		array_push($sql_search,"community.fax LIKE '%".$_GET['number']."%'") ;
	}

	if ($_GET['address']!="") {
		array_push($sql_search,"community.address LIKE '%".$_GET['address']."%'") ;
	}

	if (getPlaceID($_GET['address'],'suburb')!="") {
		array_push($sql_search,"community.suburb = '".getPlaceID($_GET['address'],'suburb')."'") ;
	}
	
	if (getPlaceID($_GET['address'],'town')!="") {
		array_push($sql_search,"community.town = '".getPlaceID($_GET['address'],'town')."'") ;
	}
	
	if ($_GET['homegroup']!="") {
		array_push($sql_search,"community.homegroup = '".$_GET['homegroup']."'") ;
	}	

	
	
	if (sizeof($_GET['attend']) != 0) {
		
		foreach($_GET['attend'] as $value) {
		
			array_push($sql_search,"attendance.service = '".$value."'") ;
			
		}
	
	}
	
	if ($_GET['date']!="") {
		array_push($sql_search,"attendance.date = '".$_GET['date']."'") ;
	}	

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	$sql_search_text = "" ;
		
	if (sizeof($sql_search)!=0) {
		$sql_search_text = "WHERE (".implode(" OR ",$sql_search).")" ;
	} else {
		$sql_search_text = "" ;
	}
	
	if ($_GET['status'] != "") {
		$sql_search_text .= " AND community.is_member = '".$_GET['status']."'" ;
	}
	
	$sql_search_text .= " AND community.deleted <> '1'" ;
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
	$sql = "SELECT DISTINCT community.name, community.surname, community.suburb, community.tel_home, community.tel_work, community.mobile, community.id " ;
	$sql .= "FROM community LEFT JOIN attendance ON (community.id = attendance.member) " ; 
	$sql .= $sql_search_text ;
	$sql .= " ORDER BY community.surname"  ;

	
	$query = mysql_query($sql) or die(mysql_error());
	
	if (mysql_num_rows($query)==0) {
	
		print("<br>Sorry, your search has returned no results.");
		
	} else {


		print("<br>There are <b>".mysql_num_rows($query)."</b> search results.<br><br>");
		print("<a href='".makeCSV($sql)."'><img src=img/csv.gif border=0></a>");
		print("&nbsp;&nbsp;&nbsp;");
		print("<a href='".makePDF($sql)."'><img src=img/pdf.gif border=0></a>");		

		
			print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
			
			print("<tr>");
			print("<td><b><font size=4>Name</font></b>");
			print("<td><b><font size=4>Suburb</font></b>");
			print("<td><b><font size=4>Home Number</font></b>");
			print("<td><b><font size=4>Work Number</font></b>");
			print("<td><b><font size=4>Mobile Number</font></b>");
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

				if ($list['7']==1) {
					print("<tr bgcolor=#E3C2C2 onmouseover=\"this.style.background='#D8A8A8'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#E3C2C2';\">");
				} else {
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
				}
				
				print("<td>".$list['0']." ".$list['1']);
				print("<td>".getPlace($list['2'],"suburb"));
				print("<td>".$list['3']);
				print("<td>".$list['4']);
				print("<td>".$list['5']);
				print("<td width=60 align=right>");
				
				print("<a href=member.view.php?id=".$list['6']." alt='View'><img src=img/view.gif border=0 alt='View'></a> ");
				
			}

	
			print("</table>");
		

		print("</table>");

	
	}		
		
		

	
	
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
