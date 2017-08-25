<? 

	include "top.php" ;

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	
	include "toolbox/members.php" ;
	
	print("<td valign=top>");	
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
// SEARCH TABLE
//-----------------------------------------------------------------------------------------------------------------------------------------------
		
	print("<Br><table width=99% cellspacing=0 cellpadding=0 bgcolor=white>");
	print("<tr><td valign=top>");
	print("<form action=members.php method=GET>");
	
	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td width=160 align=left><input type=text size=25 name=name class=field value='Name / Surname'>");
	print("<td width=160 align=left><input type=text size=25 name=number class=field value='Contact Number'>");
	print("<td width=160 align=left><input type=text size=25 name=address class=field value='Address'>");
	print("<td width=250><input name=showTagged type=checkbox");
	
	if (isset($_GET['showTagged'])) {	
		print(" checked");
	}
	
	print(">Show members that are temporarily deleted.");
	print("<td align=right><input type=image src=img/login.gif>");
	print("</table>");	
	
	print("</form>");
	print("</table>");
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------
	
	$sql_search_text = "" ;
	$sql_search = array() ;
	$http_search = array() ;
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
// HERE WE START TO GET THE VARIABLES FROM THE PASSED URL
//-----------------------------------------------------------------------------------------------------------------------------------------------

	if ( (isset($_GET['name'])) && ($_GET['name'] != "Name / Surname") ) {
		
		array_push($sql_search,"name LIKE '%".$_GET['name']."%'") ;
		array_push($sql_search,"surname LIKE '%".$_GET['name']."%'") ;
		
		array_push($http_search,"name=".$_GET['name']) ;
		
	}

	if ( (isset($_GET['number'])) && ($_GET['number'] != "Contact Number") ) {
	
		array_push($sql_search,"mobile LIKE '%".$_GET['number']."%'") ;
		array_push($sql_search,"tel_home LIKE '%".$_GET['number']."%'") ;
		array_push($sql_search,"tel_work LIKE '%".$_GET['number']."%'") ;
		
		array_push($http_search,"number=".$_GET['number']) ;
		
	}
	
	if ( (isset($_GET['address'])) && ($_GET['address'] != "Address") ) {
	
		array_push($sql_search,"address LIKE '%".$_GET['address']."%'") ;
		
		array_push($http_search,"address=".$_GET['address']) ;
		
	}

//-----------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------
		
	if ( sizeof($sql_search) == 0 ) {
	
		$sql_search_text = "" ;
		
	} else {
	
		$sql_search_text = "WHERE (".implode(" OR ",$sql_search).")" ;		
		
	}
	
	if (isset($_GET['showTagged'])) {	
	
		array_push($http_search,"showTagged=".$_GET['showTagged']) ;
		
	} else {
	
		if ($sql_search_text == "") {
		
			$sql_search_text = $sql_search_text . "WHERE deleted <> '1'" ;
			
		} else {
		
			$sql_search_text = $sql_search_text . " AND deleted <> '1'" ;
			
		}
		
	}
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------

	$http_search_text = "" ;
	
	if ( sizeof($http_search)!=0 ) {
	
		$http_search_text = "&".implode("&",$http_search) ;
		
	} else {
	
		$http_search_text = "" ;
		
	}	
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------

	$sql = "SELECT name, surname, suburb, tel_home, tel_work, mobile, id, deleted FROM community ".$sql_search_text ;	
	
	if (isset($_GET['page'])) {
	
		$page = $_GET['page'] ;
		
	} else {
	
		$page = 1 ;
		
	}
	
	$bottom_limit = ( $page * 10 ) - 10 ;
	$limit = " ORDER BY id LIMIT ".$bottom_limit.", 10 " ;
	$sql_all = $sql.$limit ;

	$query = mysql_query($sql_all) or die(mysql_error());
	
	if (mysql_num_rows($query) == 0 ) {
	
		print("<br>Sorry, your search has returned no results.");
		
	} else {
	
		print("<br>There are <b>".mysql_num_rows(mysql_query($sql))."</b> people in this list. You are viewing page <b>".$page."</b>.<br><br>");
		
			print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
			
			print("<tr>");
			print("<td><font size=3><b>Name</b></font>");
			print("<td><font size=3><b>Suburb</b></font>");
			print("<td><font size=3><b>Home Number</b></font>");
			print("<td><font size=3><b>Work Number</b></font>");
			print("<td><font size=3><b>Mobile Number</b></font>");
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
					print("<tr bgcolor=#E3C2C2 onmouseover=\"this.style.background='#D8A8A8';\" onmouseout=\"this.style.background='#E3C2C2';\">");
				} else {
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5';\" onmouseout=\"this.style.background='#fafafa';\">");
				}
				
				print("<td>".$list['0']." ".$list['1']);
				print("<td>".getPlace($list['2'],"suburb"));
				print("<td>".$list['3']);
				print("<td>".$list['4']);
				print("<td>".$list['5']);
				print("<td width=60 align=right>");
				
				print("<a href=javascript:showWindow('inc/del_member.php?id=".$list['6']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
				print("<a href=member.view.php?id=".$list['6']." alt='View'><img src=img/view.gif border=0 alt='View'></a> ");
				print("<a href='community.add.update.php?id=".$list['6']."&name=".$list['0']."&surname=".$list['1']."&action=update&service=&date=&back='><img src=img/edit.gif border=0 alt='Edit'></a>");
				
				$_SESSION['back'] = "members.php?page=".$page.$http_search_text ;
				
			}

			print("<tr bgcolor=#fafafa><td colspan=6 align=middle>");
			
			if ( $page > 1 ) {
			
				print("<tr bgcolor=#fafafa><td colspan=6 align=center>");
				print("<a href='members.php?page=".($page-1).$http_search_text."'><img src=img/back.gif border=0></a>");
				
			}
			
			$total_members = communityTotal() + 1;
			
			if ( ( $page <= $total_members ) && ( mysql_num_rows($query) >= 10 ) ) {
			
				print("&nbsp;&nbsp;&nbsp;");
				print("<a href='members.php?page=".($page+1).$http_search_text."'><img src=img/forward.gif border=0></a>");
				
			}

			
			print("</table><br><br>");

		print("</table>");
	
	
	}
		

//-----------------------------------------------------------------------------------------------------------------------------------------------		
		
	print("</table>");

	include "bottom.php" ;

?>
