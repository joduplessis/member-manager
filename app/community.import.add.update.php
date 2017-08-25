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
	
	$fieldNames = explode(";",$_GET['fields']) ;

	$x = 1 ;
	$var = $x."_action";
	$update_count = $_GET['update_count'] ;
	$field_count = $_GET['numberOfFields'] ;
	
	while ($_GET[$var]) {
	
		$lineData = explode(";",$_GET[$x."_line"]) ;
		$id = trim($_GET[$x."_id"]) ;
		$service = $_GET[$x."_service"] ;
		$date = $_GET[$x."_date"] ;
		
		switch ($_GET[$var]) {
		
			case "add":
			
				addNewPerson($fieldNames,$lineData) ;
				
				$i = findMemberID($lineData[findArrayFieldPos($fieldNames,"name")],$lineData[findArrayFieldPos($fieldNames,"surname")]);
				
				if ((trim($service)=="")&&(trim($date)=="")) {
				
				} else {
				
					addService($i,$service,$date) ;
					
				}
				
				break ;
				
			case "update":
			
				updateNewPerson($id,$fieldNames,$lineData) ;
				
				if ((trim($service)=="")&&(trim($date)=="")) {
				
				} else {
				
					addService($id,$service,$date) ;
					
				}
				
				break ;
				
			case "attend":
			
				$i = findMemberID($lineData[findArrayFieldPos($fieldNames,"name")],$lineData[findArrayFieldPos($fieldNames,"surname")]);
				
				if ((trim($service)=="")&&(trim($date)=="")) {
				
				} else {
				
					addService($i,$service,$date) ;
					
				}
				
				break ;
		}
		
		$x++ ;
		
		$var = $x."_action";
	
	}

	print("</table>");
	print("<br><br><br><br><br>");
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
