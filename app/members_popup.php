<?
	session_start() ;
?>

<html>
<head>

<?
	include "title.php" ;
?>

</title>

<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]--> 
<script type="text/javascript" src="coolclock.js"></script> 
<script type="text/javascript" src="moreskins.js"></script>

<!-- calender -->
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar-setup.js"></script>

<!-- ajax processing -->
<script language=javascript type=text/javascript src=jscripts/make_ajax.js></script>
<script language=javascript type=text/javascript src=jscripts/make_events.js></script>	
<script language=javascript type=text/javascript src=jscripts/make_window.js></script>

<!-- misc functions -->
<script language=javascript type=text/javascript src=jscripts/program.js></script>

<!-- calendar stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="calendar-win2k-cold-1.css" title="win2k-cold-1" />

<!-- main -->
<link rel="stylesheet" type="text/css" href="program.css"/>

</head>

<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<?

	include "var.php" ;
	
	// if the user isn't logged in this will send them back to the login page
	
	if  (!isset($_SESSION['username'])) {
		print("<script>alert('Sorry, incorrect username or password.');window.location='index.php';</script>");
	}

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	

	
	print("<td valign=top>");	
	
//-----------------------------------------------------------------------------------------------------------------------------------------------
// SEARCH TABLE
//-----------------------------------------------------------------------------------------------------------------------------------------------
		
	print("<Br><table width=99% cellspacing=0 cellpadding=0 bgcolor=white>");
	print("<tr><td valign=top>");
	print("<form action=members_popup.php method=GET>");
	
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
			
			
			print("<tr bgcolor=#f0f0f0  onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#f0f0f0';\">");

				if ($list['7']==1) {
					print("<tr onClick=\"window.opener.document.form_root.leader_name.value='".mysql_escape_string($list['0'])." ".mysql_escape_string($list['1'])."', window.opener.document.form_root.leader_id.value='".$list['6']."', window.close()\" bgcolor=#E3C2C2 onmouseover=\"this.style.background='#D8A8A8';\" onmouseout=\"this.style.background='#E3C2C2';\">");
				} else {
					print("<tr onClick=\"window.opener.document.form_root.leader_name.value='".mysql_escape_string($list['0'])." ".mysql_escape_string($list['1'])."', window.opener.document.form_root.leader_id.value='".$list['6']."', window.close()\" bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5';\" onmouseout=\"this.style.background='#fafafa';\">");
				}
				
				print("<td>".$list['0']." ".$list['1']);
				print("<td>".getPlace($list['2'],"suburb"));
				print("<td>".$list['3']);
				print("<td>".$list['4']);
				print("<td>".$list['5']);

				
			}

			print("<tr bgcolor=#fafafa><td colspan=6 align=middle>");
			
			if ( $page > 1 ) {
			
				print("<tr bgcolor=#fafafa><td colspan=6 align=center>");
				print("<a href='members_popup.php?page=".($page-1).$http_search_text."'><img src=img/back.gif border=0></a>");
				
			}
			
			$total_members = communityTotal() + 1;
			
			if ( ( $page <= $total_members ) && ( mysql_num_rows($query) >= 10 ) ) {
			
				print("&nbsp;&nbsp;&nbsp;");
				print("<a href='members_popup.php?page=".($page+1).$http_search_text."'><img src=img/forward.gif border=0></a>");
				
			}

			
			print("</table><br><br>");

		print("</table>");
	
	
	}
		

//-----------------------------------------------------------------------------------------------------------------------------------------------		
		
	print("</table>");

	include "bottom.php" ;

?>

