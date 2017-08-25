<? 

	include "top.php" ;

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/back.php" ;
	
	if ($_SESSION['username']!="admin") {
		print("<script>alert('Sorry, you need to be the adminstrator.');window.location='main.php';</script>") ;
	}
	
	print("<td valign=top>");	
	

	
	
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if ($_GET['area']=="user_edit") {
	
		$id = $_GET['id'] ;

		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit User</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden value=".$id." name=id>");
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Name : <td><input type=text size=25 name=name value='".getUser($id,'name')."' class=field>");
			print("<tr><td width=200 align=right>Surname : <td><input type=text size=25 name=surname class=field value='".getUser($id,'surname')."'>");
			print("<tr><td width=200 align=right>Username : <td><input type=text size=25 name=username class=field value='".getUser($id,'username')."'>");
			print("<tr><td width=200 align=right>Password : <td><input type=text size=25 name=password class=field value='".getUser($id,'password')."'>");
			print("<tr><td width=200 align=right>E-Mail : <td><input type=text size=25 name=email class=field value='".getUser($id,'email')."'>");
			print("<tr><td width=200 align=right>Elder : <td><select name=elder class=field>");
			if (getUser($id,'elder')) {
				print("<option value=1>Yes</option>");
			} else {
				print("<option value=0>No</option>");
			}
			print("<option value=0>----------------</option>");
			print("<option value=0>No</option><option value=1>Yes</option></select>");
			print("<tr><td width=200 align=right><td><input type=hidden value=user_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
			
	}

	if ($_GET['area']=="users") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Add User</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Name : <td><input type=text size=25 name=name class=field>");
				print("<tr><td width=200 align=right>Surname : <td><input type=text size=25 name=surname class=field>");
				print("<tr><td width=200 align=right>Username : <td><input type=text size=25 name=username class=field>");
				print("<tr><td width=200 align=right>Password : <td><input type=text size=25 name=password class=field>");
				print("<tr><td width=200 align=right>E-Mail : <td><input type=text size=25 name=email class=field>");
				print("<tr><td width=200 align=right>Elder : <td><select name=elder class=field><option value=0>No</option><option value=1>Yes</option></select>");
				print("<tr><td width=200 align=right><td><input type=hidden value=user_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM users") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Name</font></b>");
				print("<td><b><font size=4>Surname</font></b>");
				print("<td><b><font size=4>Username</font></b>");
				print("<td><b><font size=4>Password</font></b>");
				print("<td><b><font size=4>E-Mail</font></b>");
				print("<td><b><font size=4>Elder</font></b>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td>".$list['2']);
					print("<td>".$list['3']);
					print("<td>".$list['4']);
					print("<td>".$list['5']);
					if ($list['6']==1) {
						print("<td>Yes");	
					} else {
						print("<td>No");	
					}
					
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=user_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?id=".$list['0']."&area=user_edit><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
	
	
			
	if ($_GET['area']=="occupations_edit") {
	
			$id = $_GET['id'] ;
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Occupation</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				print("<input type=hidden name=id value='".$_GET['id']."'>");
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Title : <td><input type=text value='".getOccupation($id,'occupation')."' size=25 name=title class=field>");
				print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field>".getOccupation($id,'description')."</textarea>");
				print("<tr><td width=200 align=right><td><input type=hidden value=occ_edit name=action_type><input type=submit value='Edit' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		
	}
	
	if ($_GET['area']=="occupations") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Add Occupation</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Title : <td><input type=text size=25 name=title class=field>");
				print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field></textarea>");
				print("<tr><td width=200 align=right><td><input type=hidden value=occ_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM occupations") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Title</font></b>");
				print("<td><b><font size=4>Description</font></b>");
				print("<td width=60>");
			print("<tr>");
			print("<td colspan=3 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td>".$list['2']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=occ_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=occupations_edit&id=".$list['0']."'><img src=img/edit.gif border=0 alt='Edit'></a> ");					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
	
	
	if ($_GET['area']=="location_edit") {
	
		$id = $_GET['id'] ;
		$table = $_GET['table'] ;
	
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Location</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
		print("<form action=settings_do.php method=GET>");
		
		print("<table width=100% cellspacing=0 cellpadding=5>");
		print("<tr><td width=100 align=right>");
		print("<input type=hidden value='".$id."' name=id>");
		print("<input type=hidden value='".$table."' name=table>");
		switch ($table) {
			case "city":
				print("<td><input type=text size=25 name=loc class=field value='".getPlace($id,'town')."'> ");
				break;
			default:
				print("<td><input type=text size=25 name=loc class=field value='".getPlace($id,$table)."'> ");
				break;
		}

		print("<input type=hidden value=loc_edit name=action_type><input type=submit value='Edit' class=field>");
		print("</table>");	
		
		print("</form>");
		print("</table>");
	}
	
	if ($_GET['area']=="locations") {
	
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Add Location</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>");
			print("New <select name=loc_type class=field>");
				print("<option value=suburb>Suburb</option>");
				print("<option value=city>City / Town</option>");
			print("</select> : ");
			print("<td><input type=text size=25 name=loc class=field> ");

			print("<input type=hidden value=loc_add name=action_type><input type=submit value='Add' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");

			
		print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
		print("<tr bgcolor=#fafafa>");
		print("<td><b><font color=white>Type</font></b>");
		print("<td><b><font color=white>Location / Code</font></b>");
		print("<td width=60>");
		
		print("<tr>");
		print("<td colspan=3 valign=top align=center>");
		print("...............................");
		print("...............................");
		print("...............................");
		print("...............................");
		print("...............................");
		print("...............................");
		print("...............................");
		print("...............................");
		print("...............................");
		
		// SUBURB
		$query = mysql_query("SELECT * FROM suburbs") or die(mysql_error());				
		if (mysql_num_rows($query)!=0) {
			while ($list = mysql_fetch_row($query)) {
				print("<tr bgcolor=#f0f0f0 onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#f0f0f0';\">");
				print("<td><b>Suburb</b>");
				print("<td>".$list['1']);
				print("<td width=20 align=right>");
				print("<a href=javascript:confirmDelete('settings_do.php?action_type=loc_del&id=".$list['0']."&table=suburbs')><img src=img/delete.gif border=0 alt='Delete'></a> ");
				print("<a href=settings_list.php?area=location_edit&id=".$list['0']."&table=suburb><img src=img/edit.gif border=0 alt='Edit'></a> ");
			}
		}
		print("<tr><td colspan=3 bgcolor=#f5f5f5>");
		// TOWNS
		$query = mysql_query("SELECT * FROM towns") or die(mysql_error());				
		if (mysql_num_rows($query)!=0) {
			while ($list = mysql_fetch_row($query)) {
				print("<tr bgcolor=#f0f0f0 onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#f0f0f0';\">");
				print("<td><b>City / Town</b>");
				print("<td>".$list['1']);
				print("<td width=20 align=right>");
				print("<a href=javascript:confirmDelete('settings_do.php?action_type=loc_del&id=".$list['0']."&table=towns')><img src=img/delete.gif border=0 alt='Delete'></a> ");
				print("<a href=settings_list.php?area=location_edit&id=".$list['0']."&table=town><img src=img/edit.gif border=0 alt='Edit'></a> ");
			}
		}		
		print("<tr><td colspan=3 bgcolor=#f5f5f5>");
			
		
		print("</table>");
		print("</table>");		
		
		
	}
			
	

	if ($_GET['area']=="groups_edit") {
	
		$id = $_GET['id'] ;
	
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Group</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden name=id value=".$id.">");
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Title : <td><input type=text size=25 value='".getGroup($id,'title')."' name=title class=field>");
			print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field>".getGroup($id,'description')."</textarea>");
			print("<tr><td width=200 align=right><td><input type=hidden value=groups_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
	}
				
	if ($_GET['area']=="groups") {
	
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Groups</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Title : <td><input type=text size=25 name=title class=field>");
				print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field></textarea>");
				print("<tr><td width=200 align=right><td><input type=hidden value=groups_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM groups") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Title</font></b>");
				print("<td><b><font size=4>Description</font></b>");
				print("<td width=60>");
						
				print("<tr>");
				print("<td colspan=3 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td>".$list['2']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=groups_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=groups_edit&id=".$list['0']."><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
	
	
	
	if ($_GET['area']=="involvements_edit") {
	
		$id = $_GET['id'] ;
	
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Involvement</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden name=id value=".$id.">");
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Title : <td><input type=text size=25 value='".getInvolvement($id,'title')."' name=title class=field>");
			print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field>".getInvolvement($id,'description')."</textarea>");
			print("<tr><td width=200 align=right><td><input type=hidden value=in_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
	}
				
	if ($_GET['area']=="involvements") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Add Involvement</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Title : <td><input type=text size=25 name=title class=field>");
				print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field></textarea>");
				print("<tr><td width=200 align=right><td><input type=hidden value=in_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM involvement") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Title</font></b>");
				print("<td><b><font size=4>Description</font></b>");
				print("<td width=60>");
				
		print("<tr>");
		print("<td colspan=3 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td>".$list['2']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=in_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=involvements_edit&id=".$list['0']."><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
			


	if ($_GET['area']=="roles_edit") {
	
		$id = $_GET['id'] ;	
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Role</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden name=id value=".$id.">");			
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Role : <td><input type=text value='".getRole($id)."' size=25 name=role class=field>");
			print(" <input type=hidden value=roles_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
	}
	
	if ($_GET['area']=="roles") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Add Role</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Role : <td><input type=text size=25 name=role class=field>");
				print(" <input type=hidden value=roles_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM roles") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Role</font></b>");
				print("<td width=60>");
				
		print("<tr>");
		print("<td colspan=2 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=roles_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=roles_edit&id=".$list['0']."><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
			


	if ($_GET['area']=="skills_edit") {
	
		$id = $_GET['id'] ;
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Skill</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden name=id value=".$id.">");	
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Skill : <td><input type=text size=25 name=skill value='".getSkill($id,'skill')."' class=field>");
			print(" <input type=hidden value=skills_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
	}			
	
	if ($_GET['area']=="skills") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
			print("<br><font size=5><b>Add Skill</b></font><br>");
			print("....................................................");
			print("....................................................");
			print("....................................................");
			print("....................................................");
			print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Skill : <td><input type=text size=25 name=skill class=field>");
				print(" <input type=hidden value=skills_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM skills") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Skill</font></b>");
				print("<td width=60>");
				print("<tr>");
				print("<td colspan=2 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=skills_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=skills_edit&id=".$list['0']."><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
			

			
	if ($_GET['area']=="relationship_edit") {
	
		$id = $_GET['id'] ;
		
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Relationship</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden name=id value=".$id.">");	
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Relationship Type : <td><input type=text value='".getRelationship($id,'type')."' size=25 name=relationship class=field>");
			print(" <input type=hidden value=relationship_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
	}
	
	if ($_GET['area']=="relationship") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
			print("<br><font size=5><b>Add Relationship</b></font><br>");
			print("....................................................");
			print("....................................................");
			print("....................................................");
			print("....................................................");
			print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Relationship Type : <td><input type=text size=25 name=relationship class=field>");
				print(" <input type=hidden value=relationship_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM relationship_type") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Relationship</font></b>");
				print("<td width=60>");
				print("<tr>");
				print("<td colspan=2 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=relationship_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=relationship_edit&id=".$list['0']."><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
			

			
	if ($_GET['area']=="leadership_edit") {
		$id = $_GET['id'] ;
		print("<table width=99% cellspacing=0 cellpadding=10>");
		print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Leadership Type</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
		
			print("<form action=settings_do.php method=GET>");
			print("<input type=hidden name=id value=".$id.">");	
			print("<table width=100% cellspacing=0 cellpadding=5>");
			print("<tr><td width=200 align=right>Leadership Type : <td><input type=text value='".getLeadership($id,'role')."' size=25 name=leadership class=field>");
			print(" <input type=hidden value=leadership_edit name=action_type><input type=submit value='Edit' class=field>");
			print("</table>");	
			
			print("</form>");
		
		print("</table>");
	}
	
	if ($_GET['area']=="leadership") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Add Leadership Type</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Leadership Type : <td><input type=text size=25 name=leadership class=field>");
				print(" <input type=hidden value=leadership_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM leadership") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Type</font></b>");
				print("<td width=60>");
		print("<tr>");
		print("<td colspan=2 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=leadership_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=leadership_edit&id=".$list['0']."><img src=img/edit.gif border=0 alt='Edit'></a> ");
					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}
			
		
	
	if ($_GET['area']=="service_edit") {
	
			$id = $_GET['id'] ;
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Edit Services</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				print("<input type=hidden name=id value='".$_GET['id']."'>");
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Time : <td><input type=text value='".getService($id,'time')."' size=25 name=time class=field>");
				print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field>".getService($id,'description')."</textarea>");
				print("<tr><td width=200 align=right><td><input type=hidden value=service_edit name=action_type><input type=submit value='Edit' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		
	}
	
	if ($_GET['area']=="service") {
	
			print("<table width=99% cellspacing=0 cellpadding=10>");
			print("<tr><td valign=top>");
		print("<br><font size=5><b>Add Service</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br><br>");
			
				print("<form action=settings_do.php method=GET>");
				
				print("<table width=100% cellspacing=0 cellpadding=5>");
				print("<tr><td width=200 align=right>Time : <td><input type=text size=25 name=time class=field value='HH:MM PM/AM'>");
				print("<tr><td width=200 align=right valign=top>Description : <td><textarea cols=40 rows=5 name=description class=field></textarea>");
				print("<tr><td width=200 align=right><td><input type=hidden value=service_add name=action_type><input type=submit value='Add' class=field>");
				print("</table>");	
				
				print("</form>");
			
			print("</table>");

		$query = mysql_query("SELECT * FROM service") or die(mysql_error());

		if (mysql_num_rows($query)!=0) {

				print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
				print("<tr bgcolor=#fafafa>");
				print("<td><b><font size=4>Time</font></b>");
				print("<td><b><font size=4>Description</font></b>");
				print("<td width=60>");
			print("<tr>");
			print("<td colspan=3 valign=top align=center>");
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
				
					print("<tr bgcolor=#fafafa onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
					print("<td>".$list['1']);
					print("<td>".$list['2']);
					print("<td width=20 align=right>");
					print("<a href=javascript:confirmDelete('settings_do.php?action_type=service_del&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
					print("<a href=settings_list.php?area=service_edit&id=".$list['0']."'><img src=img/edit.gif border=0 alt='Edit'></a> ");					
				}
	

				print("</table>");

			print("</table>");

		}
		
	}	
	
	
	
	
	
	
	
	
	
	
	
	

	
	print("</table>");

	include "bottom.php" ;

?>
