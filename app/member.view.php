<? 




	include "top.php" ;

	
	

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	
	include "toolbox/member_view.php" ;
	
	
	print("<td valign=top>");	
	
		
	
	///////////////////////////////////////////////////////////////////////////////////////////////////	
	// main body of page 
	
	
	print("<table width=100% cellspacing=0 cellpadding=20>");
	print("<tr><td>");
	
	// sql details
	
	$id = $_GET['id'] ;
	$query = mysql_query("SELECT * FROM community WHERE id = '$id' ") or die(mysql_error());
	$list = mysql_fetch_row($query) ;
	
	// displaying main user box
	if ($list['20']=='1') {
		print("<font color=red>This member is temporarily deleted. </a></font>");
	}	

	
	
	print("<table width=100% cellspacing=0 cellpadding=5>");
	print("<tr><td valign=top>");
	
	print("<table width=100% cellspacing=0 cellpadding=5>");
	
	print("<tr><td align=left valign=top class=member_table colspan=2><font size=5><b>".$list['1']." ".$list['2']."</b></font>");
	
	print("<br>");
	print("....................................................");
	print("....................................................");
	
	print("<tr><td valign=top class=member_table width=100><b>Home Number : </b><td valign=top class=member_table>".$list['6']);
	print("<tr><td valign=top class=member_table><b>Work Number : </b><td valign=top class=member_table>".$list['7']);
	print("<tr><td valign=top class=member_table><b>Mobile Number : </b><td valign=top class=member_table>".$list['9']);
	print("<tr><td valign=top class=member_table><b>Fax Number : </b><td valign=top class=member_table>".$list['8']);		
	print("<tr><td valign=top class=member_table><b>E-Mail : </b><td valign=top class=member_table>".$list['10']);
	print("<tr><td valign=top class=member_table><b>Address : </b><td valign=top class=member_table>".$list['3']);
	print("<tr><td valign=top class=member_table><b>Suburb : </b><td valign=top class=member_table>".getPlace($list['5'],'suburb'));
	print("<tr><td valign=top class=member_table><b>Town : </b><td valign=top class=member_table>".getPlace($list['4'],'town'));
	
	print("<tr><td valign=top class=member_table><b>Birthdate : </b><td valign=top class=member_table>".$list['13']);
	print("<tr><td valign=top class=member_table><b>Baptism Date : </b><td valign=top class=member_table>".$list['14']);
	print("<tr><td valign=top class=member_table><b>First Visit : </b><td valign=top class=member_table>".$list['15']);
	print("<tr><td valign=top class=member_table><b>Membership Date : </b><td valign=top class=member_table>".$list['16']);
	print("<tr><td valign=top class=member_table><b>Date Of Death : </b><td valign=top class=member_table>".$list['17']);
	
	print("<tr><td valign=top class=member_table><b>NCF Member : </b><td valign=top class=member_table>");
	
	if ($list['11']) {
		print("Yes (".$list['16'].")");
	} else {
		print("No");
	}
	
	print("<tr><td align=left valign=top class=member_table><b>Homegroup : </b><td valign=top class=member_table>".getMember(getHomegroup($list['22'],'leader'),'name')." ".getMember(getHomegroup($list['22'],'leader'),'surname'));
	if ($list['12'] == "lead") {
		print("Leading a homegroup.");
	} else {
		print(getCommunityMember(getHomegroup($list['12'],"leader"),'name')." ".getCommunityMember(getHomegroup($list['12'],"leader"),'surname'));
	}
	
	print("<tr><td valign=top class=member_table><b>Occupation : </b><td valign=top class=member_table>".getOccupation($list['18'],'occupation'));
	print("<tr><td valign=top class=member_table><b>Leadership : </b><td valign=top class=member_table>".getLeadership($list['19'],'role'));
	
	// only elders will see these
	if (getUser($_SESSION['username'],'elder')) {
		print("<tr><td valign=top class=member_table><b>Extra Notes : </b><td valign=top class=member_table>".$list['21']);
	}
	
	print("</table><br><br>");
	
	
	
	
	
	
	
	
/////////////////////////////////===============================================================================================

	print("<table width=100% cellpadding=5 cellspacing=0 border=0 bgcolor=#fafafa>");
	
	////////////////////////////////////////////////////////////////////////////////////
	
		$relationship_query = mysql_query("SELECT secondary_person,relationship,id FROM relationship WHERE primary_person = '$id'") or die(mysql_error()) ;
		if (mysql_num_rows($relationship_query) != 0) {
			while ($relationship_query_get = mysql_fetch_row($relationship_query)) {
				$rid = $relationship_query_get['2'] ;
				$relationship = $relationship_query_get['1'] ;
				$other_person = $relationship_query_get['0'] ;	
				print("<tr><td>");				
				print("This person is the <b>".getRelationship($relationship,'type')."</b> of <b>".getCommunityMember($other_person,'name')." ".getCommunityMember($other_person,'surname')."</b>. ");
				print("<td width=100 align=right>");
				print("<a href=\"javascript:popup('inc/quick_edit_re.php?rid=".$rid."',500,250)\"><font color=#aaaaaa>Edit?</font></a> ");
				print("<a href=\"javascript:confirmDelete('inc/quick_del_re.php?id=".$rid."',500,250)\"><font color=#aaaaaa>Delete?</font></a><bR>");
			}
		}
		
		////////////////////////////////////////////////////////////////////////////////////
		
		$relationship_query2 = mysql_query("SELECT primary_person,relationship,id FROM relationship WHERE secondary_person = '$id'") or die(mysql_error()) ;
		if (mysql_num_rows($relationship_query2) != 0) {
			while ($relationship_query_get2 = mysql_fetch_row($relationship_query2)) {
				$rid2 = $relationship_query_get2['2'] ;
				$relationship2 = $relationship_query_get2['1'] ;
				$other_person2 = $relationship_query_get2['0'] ;	
				print("<tr><td>");
				print("<b>".getCommunityMember($other_person2,'name')." ".getCommunityMember($other_person2,'surname')."</b> is the <b>".getRelationship($relationship2,'type')."</b> of this person. ");
				print("<td width=100 align=right>");


			}
		}	
		
	////////////////////////////////////////////////////////////////////////////////////	
	
	print("</table>");

	print("<br><a href=\"javascript:popup('inc/quick_add_re.php?id=".$id."',500,250)\">Add new relationship?</a>");
		
/////////////////////////////////===============================================================================================










	
	print("<td valign=top width=600>");
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// displaying the photo box
	
	print("<form action=inc/delete_images.php method=POST>");
	
	print("<table width=100% cellspacing=0 cellpadding=5>");
	print("<tr><td valign=top class=member_table><font size=4>Photos</font><br>");
	
	$ph = mysql_query("SELECT id,image FROM pictures WHERE member_id = '$id'") or die(mysql_error()) ;

	if (mysql_num_rows($ph) == 0) {
	
		print("<tr bgcolor=#fafafa><td valign=middle height=50 align=center>");
		print("<font color=#aaaaaa>There are no photos.</font>");
		
	} else {
	
		print("<tr bgcolor=#fafafa>");
		print("<td valign=top height=100>");
		
		while ($photos = mysql_fetch_row($ph)) {
		
			print("<input type=checkbox name=img[] value='".$photos['0']."'>");
			print("<a href=javascript:popup('picture.php?id=".$photos['0']."',450,450)>");
			print("<img src='thumb.php?image=".$photos['1']."&x=50' border=0>");
			print("</a> ") ;
			
		}
	
	}

	print("<tr><td valign=top>");
	print("<a href=javascript:popup('inc/quick_add_image.php?id=".$id."',400,350) alt=Add><img src=img/member/add.gif border=0 alt=Add></a> ");
	print("<input type=image src=img/member/delete.gif border=0>");
	print("</table>");
	print("</form>");	

	print("....................................................................");
	print("..............................................................<br><br>");	
	
	
	
	
	
	// displaying the involvement box
	
	print("<form action=inc/delete_involvement.php method=POST>");
	
	print("<table width=100% cellspacing=1 cellpadding=5>");
	
	print("<tr><td valign=top class=member_table><font size=4>Involvements :</font>");
	
	$in_query = mysql_query("SELECT involvement_id,id,role FROM involvement_member WHERE member_id = '$id'") or die(mysql_error()) ;
	
	if (mysql_num_rows($in_query) == 0) {
		print("<tr bgcolor=#fafafa><td valign=middle height=50 align=center>");
		print("<font color=#aaaaaa>There are no involvements.</font>");
	} else {
		print("<tr bgcolor=#fafafa><td height=1>");
		while ($involvements = mysql_fetch_row($in_query)) {
		
			print("<table width=100% cellspacing=0 cellpadding=0 border=0>");
			print("<tr>");
			print("<td width=1>");
			print("<input type=checkbox name=inv[] value='".$involvements['1']."'>");
			print("<td>");
			print("<a href=\"javascript:popup('inc/in_view.php?id=".$involvements['0']."',400,320)\">".getInvolvement($involvements['0'],'title')."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;".getRole($involvements['2'])."</a>");
			print("<td align=right width=40>");
			print("<a href=\"javascript:popup('inc/edit_involvement.php?id=".$involvements['1']."&rid=".$involvements['2']."',400,250)\"><font size=1 color=#aaaaaa>Edit?</font></a>");
			print("</tr></table>");
			
		}
	}
	
	print("<tr><td height=1>");
	print("<a href=javascript:popup('inc/quick_add_in.php?id=".$id."',400,250) alt=Add><img src=img/member/add.gif border=0 alt=Add></a> ");
	print("<input type=image src=img/member/delete.gif border=0 alt=Manage>");
	
	print("</table>");
	
	print("</form>");
	

	print("....................................................................");
	print("..............................................................<br><br>");
	
	// displaying the skills box
	
	print("<form action='inc/delete_skills.php' method=POST>");

	print("<table width=100% cellspacing=0 cellpadding=5>");
	print("<tr><td valign=top class=member_table><font size=4>Skills :</font>");
	
	$skill_query = mysql_query("SELECT skill_id, id FROM skill_member WHERE member_id = '$id'") or die(mysql_error()) ;
	
	if (mysql_num_rows($skill_query) == 0) {
	
		print("<tr bgcolor=#fafafa><td valign=middle height=50 align=center>");
		print("<font color=#aaaaaa>There are no skills.</font>");
		
	} else {
	
		print("<tr bgcolor=#fafafa><td valign=top height=1>");
		
		while ($skills = mysql_fetch_row($skill_query)) {
					
			print("<table width=100% cellspacing=0 cellpadding=0 border=0>");
			print("<tr>");
			print("<td width=1>");
			print("<input type=checkbox name=skill[] value='".$skills['1']."'>");
			print("<td>");
			print("<a href=\"javascript:popup('inc/skill_view.php?id=".$skills['1']."',400,320)\">".getSkill($skills['0'],'skill')." </a>");
			print("<td align=right width=40>");
			print("<a href=\"javascript:popup('inc/edit_skill.php?id=".$skills['1']."',400,250)\"><font size=1 color=#aaaaaa>Edit?</font></a>");
			print("</tr></table>");

		}
	}
	
	print("<tr><td valign=top>");
	print("<a href=javascript:popup('inc/quick_add_skill.php?id=".$id."',400,370) alt=Add><img src=img/member/add.gif border=0 alt=Add></a> ");
	print("<input type=image src=img/member/delete.gif border=0 alt=Manage>");
	
	print("</table>");
	
	print("</form>");
	
// groups ////////////
	
	print("....................................................................");
	print("..............................................................<br><br>");
	
	print("<form action=inc/groups_delete.php method=POST>");
	
	print("<table width=100% cellspacing=1 cellpadding=5>");
	
	print("<tr><td valign=top class=member_table><font size=4>Groups :</font>");
	
	$gr_query = mysql_query("SELECT groups_id,id FROM groups_member WHERE member_id = '$id'") or die(mysql_error()) ;
	
	if (mysql_num_rows($gr_query) == 0) {
		print("<tr bgcolor=#fafafa><td valign=middle height=50 align=center>");
		print("<font color=#aaaaaa>There are no groups.</font>");
	} else {
		print("<tr bgcolor=#fafafa><td height=1>");
		while ($groups = mysql_fetch_row($gr_query)) {
		
			print("<table width=100% cellspacing=0 cellpadding=0 border=0>");
			print("<tr>");
			print("<td width=1>");
			print("<input type=checkbox name=gr[] value='".$groups['1']."'>");
			print("<td>");
			print(getGroup($groups['0'],'title'));
			print("<td align=right width=40>");
			print("<a href=\"javascript:popup('inc/groups_edit.php?id=".$groups['1']."',400,250)\"><font size=1 color=#aaaaaa>Edit?</font></a>");
			print("</tr></table>");
			
		}
	}
	
	print("<tr><td height=1>");
	print("<a href=javascript:popup('inc/groups_add.php?id=".$id."',400,250) alt=Add><img src=img/member/add.gif border=0 alt=Add></a> ");
	print("<input type=image src=img/member/delete.gif border=0 alt=Manage>");
	
	print("</table>");
	
	print("</form>");


	

	
	print("</table>");	
	print("</table>");
	print("</center>");
	print("</table><Br><br>");

	include "bottom.php" ;

?>
