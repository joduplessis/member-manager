<?

	include "top.php" ;
	include "var.import.php" ;
	
	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");

	include "toolbox/back.php" ;	
	
	print("<td valign=top>");	
	
	print("<table width=99% cellspacing=0 cellpadding=20>");
	print("<tr><td>");

	print("<br><font size=5><b>Adding new people.</b></font><br>");
	print("....................................................");
	print("....................................................");
	print("....................................................");
	print("....................................................");
	print("....................................................<br>");

	print("<table width=100% cellspacing=0 cellpadding=5>");
	
	$id = $_GET['id'] ;
	$action = $_GET['action'] ;
	$service = $_GET['service'] ;
	$date = $_GET['date'] ;
	$name = $_GET['name'] ;
	$surname = $_GET['surname'] ;
	
	switch ($action) {
	
		case "new":
		
			print("<Br>");
			print("<form action='community.add.new.php' method=GET>");	
			
			print("<input type=hidden name=service value='".$service."'>");
			print("<input type=hidden name=date value='".$date."'>");
			print("<input type=hidden name=name value='".$name."'>");		
			print("<input type=hidden name=surname value='".$surname."'>");
		
			//THE REST OF THE FIELDS - NOTHING SPECIAL
			print("<tr><td align=right valign=top class=member_table>Home Number : ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=number_home id=number_home>");
			
			print("<tr><td align=right valign=top class=member_table>Work Number :  ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=number_work id=number_work>");
			
			print("<tr><td align=right valign=top class=member_table>Mobile Number :  ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=mobile id=mobile>");
			
			print("<tr><td align=right valign=top class=member_table>Fax Number :  ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=fax id=fax>");
			
			print("<tr><td align=right valign=top class=member_table>E-Mail :  ");
			print("<td valign=top class=member_table><input class=field size=30 type=text name=email id=email>");
			
			print("<tr><td align=right valign=top class=member_table>Address / Suburb :  ");
			print("<td valign=top class=member_table><input class=field size=60 type=text name=address id=address>");


			//SUBURB     /////////////////////////////////////////////////////////////////////////////////////////////////
			
			print(" <select name=suburb class=field>");
			print("<option value=''>--------------</option>");
			print("<option value='other'>Other</option>");
			print("<option value=''>--------------</option>");
			$suburb_query = mysql_query("SELECT id,suburb FROM suburbs ORDER BY suburb") ;
			while ($suburb_list = mysql_fetch_row($suburb_query)) {
				print("<option value='".$suburb_list['0']."'>".$suburb_list['1']."</option>");
			}
			print("</select>");
			
			//TOWNS     /////////////////////////////////////////////////////////////////////////////////////////////////	
			
			print("<tr><td align=right valign=top class=member_table>Town : <td valign=top class=member_table>");
			print("<select name=town class=field>");
			print("<option value=''>--------------</option>");
			print("<option value='other'>Other</option>");
			print("<option value=''>--------------</option>");
			$town_query = mysql_query("SELECT id,town FROM towns ORDER BY town") ;
			while ($town_list = mysql_fetch_row($town_query)) {
				print("<option value='".$town_list['0']."'>".$town_list['1']."</option>");
			}
			print("</select>");
			
			
			//HOMEGROUP    /////////////////////////////////////////////////////////////////////////////////////////////////
			
			print("<tr><td align=right valign=top class=member_table>Homegroup : <td valign=top class=member_table>");
			print("<select class=field name=homegroup id=homegroup>");
			$homegroup_query = mysql_query("SELECT homegroup.id,homegroup.member_id FROM homegroup JOIN community ON (homegroup.member_id = community.id) ORDER BY community.surname") ;
			print("<option value=''>--------------</option>");
			while ($oc_list = mysql_fetch_row($homegroup_query)) {
				print("<option value='".$oc_list['0']."'>".getCommunityMember($oc_list['1'],'name')." ".getCommunityMember($oc_list['1'],'surname')."</option>");
			}
			print("</select>");	
			
			//MEMBERSHIP    /////////////////////////////////////////////////////////////////////////////////////////////////
			
			print("<tr><td align=right valign=top class=member_table>Member Status : <td valign=top class=member_table>");
			print("<select class=field name=status id=status>");
			print("<option value='0'>--------------</option>");
			print("<option value='1'>Member</option>");
			print("<option value='0'>Visitor</option>");
			print("</select><br>");	
			
			print("<br>....................................................");
			print("....................................................");
			print("....................................................<br>");
			
			
			print("<tr><td align=right valign=top class=member_table>Birth Date : <td valign=top class=member_table>");
			print("<input name=birth size=20 id=birth class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="birth_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "birth",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "birth_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?		

			print("<tr><td align=right valign=top class=member_table>Baptism Date : <td valign=top class=member_table>");
			print("<input name=baptism size=20 id=baptism class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="baptism_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "baptism",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "baptism_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?
					
			print("<tr><td align=right valign=top class=member_table>First Visit : <td valign=top class=member_table>");
			print("<input name=visit size=20 id=visit class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="visit_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "visit",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "visit_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?			
			
			print("<tr><td align=right valign=top class=member_table>Membership Date : <td valign=top class=member_table>");
			print("<input name=membership size=20 id=membership class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="membership_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "membership",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "membership_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?			
			
			
			
			print("<br><br>....................................................");
			print("....................................................");
			print("....................................................<br><br>");		
			
			print("<tr><td align=right valign=top class=member_table>Occupation : <td valign=top class=member_table>");
			print("<select class=field name=occupation id=occupation>");
			print("<option value=''>--------------</option>");
			$oc_query = mysql_query("SELECT id,occupation FROM occupations") ;
			while ($oc_list = mysql_fetch_row($oc_query)) {
				print("<option value='".$oc_list['0']."'>".$oc_list['1']."</option>");
			}
			print("</select><br>");		

			print("<tr><td align=right valign=top class=member_table>Leadership : <td valign=top class=member_table>");
			print("<select class=field name=leadership id=leadership>");
			print("<option value=''>--------------</option>");
			$leader_query = mysql_query("SELECT id,title FROM leadership") ;
			while ($leader_list = mysql_fetch_row($leader_query)) {
				print("<option value='".$leader_list['0']."'>".$leader_list['1']."</option>");
			}
			print("</select><br>");		

			print("<tr><td align=right valign=top class=member_table>Notes : <td valign=top class=member_table>");
			print("<textarea name=notes id=notes class=field>");
			print("</textarea>");	
			
			print("<br><br>....................................................");
			print("....................................................");
			print("....................................................<br><br>");	

			print("<input type=button onclick='javascript:window.history.back()' value='    << Go Back    '> ");
			print("<input type=submit value='    Next Step >>    '>");			
			
			print("</form>");
			
			break ;
			
		case "update":
		
			print("<Br>");
			print("<form action='community.add.updatemember.php' method=GET>");	
			
			if (isset($_GET['back'])) {
				print("<input type=hidden name=back value=''>");
			}
			
			print("<input type=hidden name=id value='".$id."'>");
			print("<input type=hidden name=service value='".$service."'>");
			print("<input type=hidden name=date value='".$date."'>");
		
			//THE REST OF THE FIELDS - NOTHING SPECIAL
			print("<tr><td align=right valign=top class=member_table>Name : ");			
			print("<td valign=top class=member_table><input class=field type=text name=name value='".$name."'>");		
			
			print("<tr><td align=right valign=top class=member_table>Surname : ");
			print("<td valign=top class=member_table><input class=field type=text name=surname value='".$surname."'>");
			
			print("<tr><td align=right valign=top class=member_table>Home Number : ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=number_home id=number_home value='".getCommunityMember($id,'home')."'>");
			
			print("<tr><td align=right valign=top class=member_table>Work Number :  ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=number_work id=number_work value='".getCommunityMember($id,'work')."'>");
			
			print("<tr><td align=right valign=top class=member_table>Mobile Number :  ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=mobile id=mobile value='".getCommunityMember($id,'mobile')."'>");
			
			print("<tr><td align=right valign=top class=member_table>Fax Number :  ");
			print("<td valign=top class=member_table><input class=field size=15 type=text name=fax id=fax value='".getCommunityMember($id,'fax')."'>");
			
			print("<tr><td align=right valign=top class=member_table>E-Mail :  ");
			print("<td valign=top class=member_table><input class=field size=30 type=text name=email id=email value='".getCommunityMember($id,'email')."'>");
			
			print("<tr><td align=right valign=top class=member_table>Address / Suburb :  ");
			print("<td valign=top class=member_table><input class=field size=60 type=text name=address id=address value='".getCommunityMember($id,'address')."'>");


			//SUBURB     /////////////////////////////////////////////////////////////////////////////////////////////////
			
			print(" <select name=suburb class=field>");
			print("<option value='".getCommunityMember($id,'suburb')."'>".getPlace(getCommunityMember($id,'suburb'),'suburb')."</option>");
			print("<option value='other'>Other</option>");
			print("<option value=''>--------------</option>");
			$suburb_query = mysql_query("SELECT id,suburb FROM suburbs ORDER BY suburb") ;
			while ($suburb_list = mysql_fetch_row($suburb_query)) {
				print("<option value='".$suburb_list['0']."'>".$suburb_list['1']."</option>");
			}
			print("</select>");
			
			//TOWNS     /////////////////////////////////////////////////////////////////////////////////////////////////	
			
			print("<tr><td align=right valign=top class=member_table>Town : <td valign=top class=member_table>");
			print("<select name=town class=field>");
			print("<option value='".getCommunityMember($id,'town')."'>".getPlace(getCommunityMember($id,'town'),'town')."</option>");
			print("<option value='other'>Other</option>");
			print("<option value=''>--------------</option>");
			$town_query = mysql_query("SELECT id,town FROM towns ORDER BY town") ;
			while ($town_list = mysql_fetch_row($town_query)) {
				print("<option value='".$town_list['0']."'>".$town_list['1']."</option>");
			}
			print("</select>");
			
			
			//HOMEGROUP    /////////////////////////////////////////////////////////////////////////////////////////////////
			
			print("<tr><td align=right valign=top class=member_table>Homegroup : <td valign=top class=member_table>");
			print("<select class=field name=homegroup id=homegroup>");
			$homegroup_query = mysql_query("SELECT homegroup.id,homegroup.member_id FROM homegroup JOIN community ON (homegroup.member_id = community.id) ORDER BY community.surname") ;
			if (getCommunityMember($id,'homegroup')=="lead") {
				print("<option value='lead'>Leads a homegroup already.</option>");
			} else {
				print("<option value='".getCommunityMember($id,'homegroup')."'>".getCommunityMember(getHomegroup(getCommunityMember($id,'homegroup'),"leader"),"name")." ".getCommunityMember(getHomegroup(getCommunityMember($id,'homegroup'),"leader"),"surname")."</option>");
			}
			
			print("<option value=''>--------------</option>");
			while ($oc_list = mysql_fetch_row($homegroup_query)) {
				print("<option value='".$oc_list['0']."'>".getCommunityMember($oc_list['1'],'name')." ".getCommunityMember($oc_list['1'],'surname')."</option>");
			}
			print("</select>");	

			
			//MEMBER    /////////////////////////////////////////////////////////////////////////////////////////////////
			
			print("<tr><td align=right valign=top class=member_table>Member Status : <td valign=top class=member_table>");
			print("<select class=field name=status id=status>");
			
			print("<option value='".getCommunityMember($id,'member')."'>");
			
			if (getCommunityMember($id,'member') == 0) {
				print("Visitor");
			} else {
				print("Member");
			}
			
			print("</option>");
			
			print("<option value='1'>Member</option>");
			print("<option value='0'>Visitor</option>");
			print("</select><br>");	
			
			print("<br>....................................................");
			print("....................................................");
			print("....................................................<br>");
			
			
			
			

			
			
			
			
			
			
			
			
			
			print("<tr><td align=right valign=top class=member_table>Birth Date : <td valign=top class=member_table>");
			print("<input name=birth size=20 id=birth class=field value='".getCommunityMember($id,'birth')."'>");
				?>		
				<img src="img/calender.gif" 
					 id="birth_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "birth",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "birth_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?		

			print("<tr><td align=right valign=top class=member_table>Baptism Date : <td valign=top class=member_table>");
			print("<input name=baptism size=20 id=baptism class=field value='".getCommunityMember($id,'baptism')."'>");
				?>		
				<img src="img/calender.gif" 
					 id="baptism_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "baptism",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "baptism_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?
					
			print("<tr><td align=right valign=top class=member_table>First Visit : <td valign=top class=member_table>");
			print("<input name=visit size=20 id=visit class=field value='".getCommunityMember($id,'visit')."'>");
				?>		
				<img src="img/calender.gif" 
					 id="visit_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "visit",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "visit_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?			
			
			print("<tr><td align=right valign=top class=member_table>Membership Date : <td valign=top class=member_table>");
			print("<input name=membership size=20 id=membership class=field value='".getCommunityMember($id,'membership')."'>");
				?>		
				<img src="img/calender.gif" 
					 id="membership_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "membership",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "membership_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?			
			
			print("<tr><td align=right valign=top class=member_table>Date Of Death: <td valign=top class=member_table>");
			print("<input name=death size=20 id=death class=field value='".getCommunityMember($id,'death')."'>");
				?>		
				<img src="img/calender.gif" 
					 id="death_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
					Calendar.setup({
						inputField     :    "death",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    false,
						button         :    "death_button",
						singleClick    :    false,
						step           :    1
					});
				</script>
				<?				
			
			print("<br><br>....................................................");
			print("....................................................");
			print("....................................................<br><br>");		
			
			print("<tr><td align=right valign=top class=member_table>Occupation : <td valign=top class=member_table>");
			print("<select class=field name=occupation id=occupation>");
			print("<option value='".getCommunityMember($id,'occupation')."'>".getOccupation(getCommunityMember($id,'occupation'),"occupation")."</option>");
			print("<option value=''>--------------</option>");			
			$oc_query = mysql_query("SELECT id,occupation FROM occupations") ;
			while ($oc_list = mysql_fetch_row($oc_query)) {
				print("<option value='".$oc_list['0']."'>".$oc_list['1']."</option>");
			}
			print("</select><br>");		

			print("<tr><td align=right valign=top class=member_table>Leadership : <td valign=top class=member_table>");
			print("<select class=field name=leadership id=leadership>");
			print("<option value='".getCommunityMember($id,'leadership')."'>".getLeadership(getCommunityMember($id,'leadership'),"role")."</option>");
			print("<option value=''>--------------</option>");
			$leader_query = mysql_query("SELECT id,title FROM leadership") ;
			while ($leader_list = mysql_fetch_row($leader_query)) {
				print("<option value='".$leader_list['0']."'>".$leader_list['1']."</option>");
			}
			print("</select><br>");		

			print("<tr><td align=right valign=top class=member_table>Notes : <td valign=top class=member_table>");
			print("<textarea name=notes id=notes class=field>");
			print(getCommunityMember($id,'notes')."</textarea>");	
			
			print("<br><br>....................................................");
			print("....................................................");
			print("....................................................<br><br>");	

			
			
			
			
			
			
			
			

			
			
			
			

			print("<input type=button onclick='javascript:window.history.back()' value='    << Go Back    '> ");
			print("<input type=submit value='    Next Step >>    '>");			
			
			print("</form>");
			
			break ;		
			
		case "attend":
		
			if ((trim($service)=="")&&(trim($date)=="")) {
			} else {
				addService($id,$service,$date) ;
			}
			print("<script>alert('Attendance Successfully Updated.');window.location='community.add.php';</script>");
			break ;
			
	}
	
	print("</table>");
	print("<br><br><br><br><br>");
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
