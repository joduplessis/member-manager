<? 

	include "top.php" ;

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	
	include "toolbox/events.php" ;
	
	print("<td valign=top>");	
	
	if ($_GET['type']=="add") {
	
		print("<table width=100% cellspacing=0 cellpadding=5>");
		print("<form action=events_do.php method=GET name=form_root>");
		print("<tr><td><br><td><tr>");
		print("<br><font size=5><b>Add Event</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
		print("<td valign=middle align=right width=40%>Date Start : <td>");
				print("<input name=start size=20 id=start class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="start_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "start",
				        ifFormat       :    "%Y-%m-%d",
				        showsTime      :    false,
				        button         :    "start_button",
				        singleClick    :    false,
				        step           :    1
				    });
				</script>
				<?
				
		print("<tr>");
		print("<td valign=middle align=right width=40%>Date End : <td>");
				print("<input name=end size=20 id=end class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="end_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "end",
				        ifFormat       :    "%Y-%m-%d",
				        showsTime      :    false,
				        button         :    "end_button",
				        singleClick    :    false,
				        step           :    1
				    });
				</script>
				<?
		print("<tr><td align=right width=40%>Title : <td><input type=text class=field name=title> ");
		print("<tr><td align=right valign=top width=40%>Description : <td><textarea class=field cols=30 rows=5 name=description></textarea>");
		print("<tr><td align=right width=40%>Specific to : <td>");
		
		print("<select name=groups class=field>");
		$age_query = mysql_query("SELECT id,title FROM groups") or die(mysql_error()) ;
		print("<option value='0'>All</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");
		
		print("<input type=hidden name=action_type value=add>");
		print("<input type=hidden name=leader_id id=leader_id>");
		print("<tr><td align=right width=40%><td><input type=submit value='Add Event' class=field>");
		print("<tr><td><br><td>");
		print("</form>");
		print("</table>");
		


		//-----------------------------------------------------------------------------------------------------------------------------------------------			
		// end of main table

	
	} else if ($_GET['type']=="edit") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("SELECT * FROM events WHERE id = '$id'") or die(mysql_error()) ;
		$list = mysql_fetch_row($query);
		
		print("<table width=99% cellspacing=0 cellpadding=5>");
		print("<form action=events_do.php method=GET name=form_root>");
		print("<tr><td><br><td><tr>");
		print("<br><font size=5><b>Edit Event</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
		print("<td valign=middle align=right width=40%>Date Start : <td>");
				print("<input name=start size=20 id=start class=field value='".$list['3']."'>");
				?>		
				<img src="img/calender.gif" 
					 id="start_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "start",
				        ifFormat       :    "%Y-%m-%d",
				        showsTime      :    false,
				        button         :    "start_button",
				        singleClick    :    false,
				        step           :    1
				    });
				</script>
				<?
				
		print("<tr>");
		print("<td valign=middle align=right width=40%>Date End : <td>");
				print("<input name=end size=20 id=end class=field value='".$list['4']."'>");
				?>		
				<img src="img/calender.gif" 
					 id="end_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "end",
				        ifFormat       :    "%Y-%m-%d",
				        showsTime      :    false,
				        button         :    "end_button",
				        singleClick    :    false,
				        step           :    1
				    });
				</script>
				<?
		print("<tr><td align=right width=40%>Title : <td><input type=text class=field name=title value='".$list['2']."'> ");
		print("<tr><td align=right valign=top width=40%>Description : <td><textarea class=field cols=30 rows=5 name=description>".$list['1']."</textarea>");
		print("<tr><td align=right width=40%>Specific To : <td>");
		
		print("<select name=age class=field>");
		$age_query = mysql_query("SELECT id,title FROM groups") or die(mysql_error()) ;
		
		print("<option value='".$list['5']."'>".getGroup($list['5'],'title')."</option>");
		print("<option value='0'>----------</option>");
		print("<option value='0'>All</option>");
		while($get_age_query = mysql_fetch_row($age_query)) {
			print("<option value='".$get_age_query['0']."'>".$get_age_query['1']."</option>");
		}
		print("</select>");
		

		print("<input type=hidden name=action_type value=edit>");
		print("<input type=hidden name=id value=".$list['0'].">");
		print("<input type=hidden name=leader_id id=leader_id value=".$list['6'].">");
		print("<tr><td align=right width=40%><td><input type=submit value='Edit Event' class=field>");
		print("<tr><td><br><td>");
		print("</form>");
		print("</table>");
		


		//-----------------------------------------------------------------------------------------------------------------------------------------------			
		// end of main table

	
	} else {
	
	
		
		///////////////////////////////////////////////////////////////////////////////////////////////////
		// main body of page 

		$query = mysql_query("SELECT * FROM events") or die(mysql_error());

		if (mysql_num_rows($query)==0) {
		
			print("<br>Sorry, there are no events yet.");
			
		} else {

			print("<br>There are <b>".mysql_num_rows($query)."</b> events in this list.<br><br>");

			print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#fafafa>");
			print("<tr>");
			print("<td><b><font size=3>Date Start</font></b>");
			print("<td><b><font size=3>Date End</font></b>");
			print("<td><b><font size=3>Title</font></b>");
			print("<td><b><font size=3>Description</font></b>");
			print("<td><b><font size=3>Group</font></b>");
			print("<td width=60>");
			
			
			print("<tr bgcolor=#faFAFA>");
			print("<td colspan=7>");
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
			
				print("<tr bgcolor=#fafafa onClick=\"window.location='events.php?type=edit&id=".$list['0']."'\" onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#fafafa';\">");
				print("<td>".$list['3']);
				print("<td>".$list['4']);
				print("<td>".$list['2']);
				print("<td>".$list['1']);
				print("<td>".getGroup($list['5'],'title'));
				
				print("<td width=60 align=right>");
				print("<a href=javascript:confirmDelete('events_do.php?action_type=delete&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
				print("<a href=events.php?type=edit&id=".$list['0']." alt='Edit'><img src=img/edit.gif border=0 alt='View'></a> ");
				
			}

			print("<tr bgcolor=#fafafa><td colspan=5 align=middle>");
			
			print("</table>");
		
		}

		//-----------------------------------------------------------------------------------------------------------------------------------------------			
		// end of main table
	
	
	}
	
	print("</center>");
	print("</table><Br><br>");

	// ends the main table in the include file
	
	include "bottom.php" ;

?>
