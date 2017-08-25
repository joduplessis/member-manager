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

	print("<br><font size=5><b>Adding New Member</b></font><br>");
	print("....................................................");
	print("....................................................");
	print("....................................................");
	print("....................................................");
	print("....................................................<br><br><br>");

	print("<table width=100% cellspacing=0 cellpadding=5>");
	
	$name = $_GET['name'] ;
	$surname = $_GET['surname'] ;
	$service = $_GET['service'] ;
	$date = $_GET['date'] ;
	
	$query = mysql_query("SELECT * FROM community WHERE name = '$name' AND surname = '$surname'") ;
	
	if (mysql_num_rows($query) == 0) {
	
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
	
	} else {
	
		print("<font size=5>");
		print(mysql_num_rows($query)." record(s) found with that name.") ;
		print("</font>");
		print("<br><br><Br>");
		
		print("<form action='community.add.update.php' method=GET>");	
		
		$count = 0 ;
	
		while ($data = mysql_fetch_row($query)) {
		
			print("<b><font size=3>");
			print($name." ".$surname) ;
			print("</font>");
			print("<br>");
			
			print("<font size=2>");
			print($data['3']) ;
			print("</font></b>");
			print("<br>");			
			print("<br>");	
			
			print("<font size=2>");
			print("<input type=radio name=taction onclick=javascript:putID('".$data['0']."','update')> Update this person's details.<Br>") ;
			print("<input type=radio name=taction onclick=javascript:putID('".$data['0']."','attend')> Just add the new attendance details.<Br>") ;
			print("<input type=radio name=taction onclick=javascript:putID('".$data['0']."','new')> This is someone new.<Br>") ;
			print("</font>");
			print("<br>");			
			
			print("....................................................");
			print("....................................................");
			print("....................................................");
			print("....................................................");
			print("....................................................<br><br>");
			
			$count++ ;
	
		}
		
		print("<input type=hidden name=name value='".$name."'>");		
		print("<input type=hidden name=surname value='".$surname."'>");
		print("<input type=hidden name=action id=action value=''>");		
		print("<input type=hidden name=id id=id value=''>");
		print("<input type=hidden name=service value='".$service."'>");
		print("<input type=hidden name=date value='".$date."'>");
		
		print("<input type=button onclick='javascript:window.history.back()' value='    << Go Back    '> ");
		print("<input type=submit value='    Next Step >>    '>");
		
		print("</form>");
		
	}
	

	
	print("</table>");
	print("<br><br><br><br><br>");
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;
	

?>
