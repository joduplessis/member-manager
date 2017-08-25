<? 




	include "top.php" ;

	
	

	// main body of page 

	print("<table width=100% cellspacing=0 cellpadding=0>");
	print("<tr>");
	print("<td valign=top width=125>");
	include "toolbox/back.php" ;
	
	print("<td valign=top>");	
		
	

	///////////////////////////////////////////////////////////////////////////////////////////////////
	// main body of page 
	
	print("<table width=100% cellspacing=0 cellpadding=20>");
	print("<tr><td>");


	print("<font size=4>Add New Community Member</font><br><br>");
	print("<form action=community.add.do.php method=GET>");
	print("<table width=100% cellspacing=0 cellpadding=5>");
	print("<tr><td align=left>");
	
	print("<table width=600 cellspacing=0 cellpadding=5>");
	
	print("<tr><td align=right valign=top class=member_table>Name / Surname : <td valign=top class=member_table>");
	
	// NAME FIELD
	print("<input class=field size=30 type=text name=name id=query autocomplete=off size=30 onKeyUp=displayunicode(event,'name','query')> ");
	
	// SURNAME FIELD
	print("<input class=field size=40 type=text name=surname id=querys autocomplete=off size=30 onKeyUp=displayunicode(event,'surname','querys')> ");
	
	// PART OF THE DOCUMENT WE USE FOR DISPLAYING AUTO COMPLETE RESULTS
	print("<br><span id=search-results></span>");
	
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
			step           :    1});
	</script>
	<?
	
	print("<tr><td><td align=left valign=top class=member_table><input class=field type=submit value='Add Person To Community List'>");				

	// end of main table
	
	print("</table>");
	
	print("</center>");
	print("</table>");

	///////////////////////////////////////////////////////////////////////////////////////////////////			


	
	
	include "bottom.php" ;

?>
