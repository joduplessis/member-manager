<?

	include "top_popup.php" ;
	

	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");

	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Edit Relationship</b><br><br>");
	
	print("<table width=100% height=100 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td>");
	

	
	if (!isset($_GET['homegroup_leader'])) {
	
		$rid = $_GET['rid'] ;
		
		print("<form action=quick_edit_re.php method=GET name=form_root>");
		print("This person is the ");
		print("<select name=relationship class=field> ");
		print("<option value='".getRelationship($rid,'relationship_type')."'>".getRelationship(getRelationship($rid,'relationship_type'),'type')."</option>");
		print("<option value=>-----------</option>");
		$query = mysql_query("SELECT id,description FROM relationship_type") ;
		while ($list = mysql_fetch_row($query)) {
			print("<option value='".$list['0']."'>".$list['1']."</option>");
		}
		
		print("</select> of ");
		
		print("<input type=hidden name=homegroup_leader id=leader_id value='".getRelationship($rid,'other_person')."'>");
		print("<input type=text disabled class=field name=leader_name id=leader_name size=25 value='".getCommunityMember(getRelationship($rid,'other_person'),'name')." ".getCommunityMember(getRelationship($rid,'other_person'),'surname')."'> ");
		print("<a href=javascript:popup('../members_popup.php',700,500)><img src=../img/member.gif border=0></a> ");
		print("<input type=hidden value='".$rid."' name=rid>");
		print("<input type=submit value='Edit' class=field></p>");
		print("</form>");
		
	} else {
	
		$rid = $_GET['rid'] ;
		$person = $_GET['homegroup_leader'] ;
		$relationship = $_GET['relationship'] ;
		
		if ($person == "") {
			print("<script>alert('Please select other person.');window.history.back();</script>");
		} else {
			
			$query = mysql_query("UPDATE relationship SET secondary_person='$person', relationship='$relationship' WHERE id='$rid'") or die(mysql_error());
			if ($query) {
				print("<script>alert('Relationship edited successfully.');window.opener.location = window.opener.location;window.close();</script>");
			}
			
		}
	
	
	}

	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<tr><td align=center valign=top>".$list['0']);
	
	// end of main table

	print("</table>");
	print("</center>");
	print("</table>");
	
	
	
	include "bottom_popup.php" ;

?>
