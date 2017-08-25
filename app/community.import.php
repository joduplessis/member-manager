<?

	include "top.php" ;
	
	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");

	include "toolbox/back.php" ;	
	
	print("<td valign=top>");	
		

	
	print("<table width=99% cellspacing=0 cellpadding=20>");
	print("<tr><td>");

		print("<br><font size=5><b>Import</b></font><br>");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................");
		print("....................................................<br>");

	print("<table width=100% cellspacing=0 cellpadding=5>");
	print("Please make sure you have a name and a surname column in your file.<br><br><br>");
	print("<form action=community.import.do.php method=POST enctype='multipart/form-data'><input type=hidden name=listtype value=homegroups>");
	
	print("<tr><td align=right>Format : <td>");
	print("<select name=format class=field>");
	print("<option value='csv'>CSV</option>");
	print("</select> ");

	print("<input type=file name='import_file' class=field><br>");

	print("<tr><td align=right>Service Time : <td>");
	
	//SERVICES TIMES    /////////////////////////////////////////////////////////////////////////////////////////////////	
	
	print("<select name=service class=field>");
	print("<option value=''>Do not add a service time for this person yet.</option>");
	print("<option value=''>--------------------------------------------------------</option>");
	$service_query = mysql_query("SELECT id,time FROM service ORDER BY time") ;

	while ($service_time = mysql_fetch_row($service_query)) {
		print("<option value='".$service_time['0']."'>".$service_time['1']."</option>");
	}
	print("</select>");
		
	//DATE   /////////////////////////////////////////////////////////////////////////////////////////////////
	
	print("<tr><td align=right>Date : <td>");
		print("<input name=date size=20 id=birthday class=field>");
		
		?>		
		<img src="img/calender.gif" 
			 id="birthday_button" 
			 style="cursor: pointer; " 
			 title="Date Selector"/>

		<script type="text/javascript">
			Calendar.setup({
				inputField     :    "birthday",
				ifFormat       :    "%Y-%m-%d",
				showsTime      :    false,
				button         :    "birthday_button",
				singleClick    :    false,
				step           :    1
			});
		</script>
		<?

	
	print("<tr><td align=right><td>");
	print("<input type=submit value='      Import      ' class=field>");
	print("<Br><Br>Please make sure your field delimiter is a ';' (semicolon).");
	print("</table></form><br><br><br><br><br><br><br><br><br>");


	

	

	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
