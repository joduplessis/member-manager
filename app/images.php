<? 

	include "top.php" ;

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/main.php" ;
	
	print("<td valign=top>");	
	
	print("<table width=99% cellspacing=0 cellpadding=20>");
	print("<tr><td>");

		print("<br><font size=5><b>Images</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
		
//-----------------------------------------------------------------------------------------------------------------------------------------------
		
	// top search box
	
	print("<table width=99% cellspacing=0 cellpadding=10>");
	print("<tr><td valign=top>");
	
		print("<form action=images.php method=GET>");
		
		print("<table width=500 cellspacing=0 cellpadding=0>");
		print("<tr>");
		print("<td align=left><input type=text size=25 name=name class=field value='Name / Surname'>");
		
		if (!isset($_GET['showTagged'])) {	
			print(" <input name=showTagged type=checkbox>Show temporarily deleted people.");
		} else {
			print(" <input name=showTagged type=checkbox checked>Show temporarily deleted people.");
		}

		print(" <input type=image src=img/login.gif>");
		
		print("<tr><td><bR><a href=images.pdf.php>Compile printable PDF document?</a>");
			
		print("</table>");	
		
		print("</form>");
	
	print("</table>");

		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br><br>");
		
	//----------------------------------------------------------------------
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	$query_all = mysql_query("SELECT id FROM pictures") or die(mysql_error());
	
	$num = mysql_num_rows($query_all) / 12 ;
	$max = round($num, 0) + 1 ;			

	$sql_search = array() ;
	$http_search = array() ;

	if (isset($_GET['name'])) {		
		if ($_GET['name']!="Name / Surname") {
			array_push($sql_search,"community.name LIKE '%".$_GET['name']."%' OR community.surname LIKE '%".$_GET['name']."%'") ;
			array_push($http_search,"name=".$_GET['name']) ;
		}
	}
	
	
	//----------------------------------------------------------------------	
		
	$sql_search_text = "" ;
		
	if (sizeof($sql_search)!=0) {
		$sql_search_text = "WHERE ".implode(" OR ",$sql_search) ;
	} else {
		$sql_search_text = "" ;
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
	
	$http_search_text = "" ;
	
	if (sizeof($http_search)!=0) {
		$http_search_text = "&".implode(" OR ",$http_search) ;
	} else {
		$http_search_text = "" ;
	}	

	//----------------------------------------------------------------------

	$sql = "SELECT pictures.id, pictures.image, pictures.member_id, pictures.title, community.deleted FROM pictures JOIN community ON (pictures.member_id = community.id) ".$sql_search_text ;	

	if (isset($_GET['page'])) {
		$page = $_GET['page'] ;
	} else {
		$page = 1 ;
	}
	
	$bottom_limit = ( $page * 12 ) - 12 ;
	$limit = " ORDER BY community.surname LIMIT ".$bottom_limit.", 12 " ;
	$sql_all = $sql.$limit ;
	$query = mysql_query($sql_all) or die(mysql_error());
	
	if (mysql_num_rows($query)==0) {
	
		print("Sorry, your search has returned no results.");
		
	} else {
	
		print("There are <b>".mysql_num_rows(mysql_query($sql))."</b> images in this list. You are viewing page <b>".$page."</b>.<br><br>");
		
			print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
			
			$x = 0 ;
			
			while ($list = mysql_fetch_row($query)) {
			
				
				
				if (fmod($x,3)==0) {
					print("<tr>");
				}
				
				if ($list['4']=='1') {
					print("<td valign=top align=center bgcolor=#E3C2C2>") ;
				} else {
					print("<td valign=top align=center>") ;
				}
			
				print("<a href=javascript:popup('picture.php?id=".$list['0']."',450,450)>");
				print("<img src='thumb.php?image=".$list['1']."&x=250' border=0>");
				print("</a>");

				print("<br><b>".$list['3']."</b><br><a href='member.view.php?id=".$list['2']."'>".getCommunityMember($list['2'],"name")." ".getCommunityMember($list['2'],"surname")."</a> ");
				
				$x++ ;
				
			}

			print("<tr bgcolor=#fafafa><td colspan=5 align=middle>");
			
			if ($page>1) {
				print("<tr bgcolor=#fafafa><td colspan=5 align=center>");
				print("<a href='images.php?page=".($page-1).$http_search_text."'><img src=img/back.gif border=0></a>");
			}
			
			if (($page<=$max)&&(mysql_num_rows($query)>=12)) {
				print("&nbsp;&nbsp;&nbsp;");
				print("<a href='images.php?page=".($page+1).$http_search_text."'><img src=img/forward.gif border=0></a>");
			}

			
			print("</table>");

		print("</table>");
	
	
	}
		

//-----------------------------------------------------------------------------------------------------------------------------------------------		
		
	print("</table>");

	include "bottom.php" ;

?>
