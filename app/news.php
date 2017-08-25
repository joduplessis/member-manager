<? 

	include "top.php" ;

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/news.php" ;
	
	print("<td valign=top>");	
	
		
	
	if ($_GET['type']=="add") {
	
		print("<table width=100% cellspacing=0 cellpadding=5>");
		print("<form action=news_do.php method=GET name=form_root>");
		print("<tr><td><br><td><tr>");
		print("<br><font size=5><b>Add News</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
		print("<td valign=middle align=right width=40%>Expiry Date : <td>");
				print("<input name=date size=20 id=date class=field>");
				?>		
				<img src="img/calender.gif" 
					 id="date_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "date",
				        ifFormat       :    "%Y-%m-%d",
				        showsTime      :    false,
				        button         :    "date_button",
				        singleClick    :    false,
				        step           :    1
				    });
				</script>
				<?
				

		print("<tr><td align=right valign=top width=40%>News : <td><textarea class=field cols=30 rows=5 name=news></textarea>");
		print("<input type=hidden name=action_type value=add>");
		print("<tr><td align=right width=40%><td><input type=submit value='Add News' class=field>");
		print("<tr><td><br><td>");
		print("</form>");
		print("</table>");
		


		//-----------------------------------------------------------------------------------------------------------------------------------------------			
		// end of main table

	
	} else if ($_GET['type']=="edit") {
	
		$id = $_GET['id'] ;
		
		$query = mysql_query("SELECT * FROM news WHERE id = '$id'") or die(mysql_error()) ;
		$list = mysql_fetch_row($query);
		
		print("<table width=99% cellspacing=0 cellpadding=5>");
		print("<form action=news_do.php method=GET name=form_root>");
		print("<tr><td><br><td><tr>");
		print("<br><font size=5><b>Edit News</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");
		print("<td valign=middle align=right width=40%>Expiry Date : <td>");
				print("<input name=date size=20 id=date class=field value='".$list['2']."'>");
				?>		
				<img src="img/calender.gif" 
					 id="date_button" 
					 style="cursor: pointer; " 
					 title="Date Selector"/>

				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "date",
				        ifFormat       :    "%Y-%m-%d",
				        showsTime      :    false,
				        button         :    "date_button",
				        singleClick    :    false,
				        step           :    1
				    });
				</script>
				<?
				

		print("<tr><td align=right valign=top width=40%>News : <td><textarea class=field cols=30 rows=5 name=news>".$list['1']."</textarea>");
		print("<input type=hidden name=action_type value=edit><input type=hidden name=id value='".$_GET['id']."'>");
		print("<tr><td align=right width=40%><td><input type=submit value='Edit News' class=field>");
		print("<tr><td><br><td>");
		print("</form>");
		print("</table>");
	
	} else {
			
		///////////////////////////////////////////////////////////////////////////////////////////////////
		// main body of page 

		$query = mysql_query("SELECT * FROM news") or die(mysql_error());

		if (mysql_num_rows($query)==0) {
		
			print("<br>Sorry, there is no news yet.");
			
		} else {

			print("<br>There are <b>".mysql_num_rows($query)."</b> news items in this list.<br><br>");

			print("<table width=99% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
			print("<tr bgcolor=#faFAFA>");
			print("<td><b><font size=3>News</font></b>");
			print("<td><b><font size=3>Expiry Date</font></b>");
			print("<td width=60>");
			
			print("<tr bgcolor=#faFAFA>");
			print("<td colspan=3>");
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
			
				print("<tr bgcolor=#faFAFA onClick=\"window.location='news.php?type=edit&id=".$list['0']."'\" onmouseover=\"this.style.background='#e5e5e5'; this.style.cursor='hand'\" onmouseout=\"this.style.background='#faFAFA';\">");
				print("<td>".$list['1']);
				print("<td>".$list['2']);
			
				print("<td width=60 align=right>");
				print("<a href=javascript:confirmDelete('news_do.php?action_type=delete&id=".$list['0']."')><img src=img/delete.gif border=0 alt='Delete'></a> ");
				print("<a href=news.php?type=edit&id=".$list['0']." alt='Edit'><img src=img/edit.gif border=0 alt='View'></a> ");
				
			}

			print("<tr bgcolor=#faFAFA><td colspan=5 align=middle>");
			
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
