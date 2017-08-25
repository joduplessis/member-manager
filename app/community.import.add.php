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
	
	$service = $_GET['service'] ;
	$date = $_GET['date'] ;	
	$uploadfile = $_GET['filename'];
	$numberOfFields = $_GET['numberOfFields'];
	
	$fieldNames = createFieldArray($numberOfFields) ;
	
	$handle = @fopen($uploadfile, "r");

	if ($handle) {

		$y = 0;
		$update_count = 0;
		$showsubmit = false ;
		
		print("<form action='community.import.add.update.php' method=GET>");	
		
		print("<input type=hidden name=fields value=".join(";",$fieldNames)."><br>");				
		
		while (!feof($handle)) {
		
			$y++;
			
			$buffer = fgets($handle, 4096); // THIS IS ONE LINE OF THE FILE.WE'RE READING IT LINE PER LINE
			
			if ( (isset($_GET['header'])) && ($y==1) ) {
		
			} else {
			
				// JUST CHECKING THAT WE HAVENT REACHED THE END OF THE FILE HERE. 
				//THE FIELDS WILL BE BLANK IF WE HAVE REACHED THE END
				// SO WE USING THE isArrayEmpty FUNCTION TO CHECK THAT
				
				if (!isArrayEmpty(explode(";",$buffer))) {
				
					$lineData = createLineData($buffer,$fieldNames,$numberOfFields) ;
					
					switch (memberCount($lineData[findArrayFieldPos($fieldNames,"name")],$lineData[findArrayFieldPos($fieldNames,"surname")])) {
						case 0:
							addNewPerson($fieldNames,$lineDataNoAttend) ;
							$i = findMemberID($lineData[findArrayFieldPos($fieldNames,"name")],$lineData[findArrayFieldPos($fieldNames,"surname")]);
							if ((trim($service)=="")&&(trim($date)=="")) {
							
							} else {
								addService($i,$service,$date) ;
							}
							print("<br><br><br>");
							break ;
							
						default:
							$update_count++ ;
							$showsubmit = true ;
							
							print("<font size=4>".$lineData[findArrayFieldPos($fieldNames,"name")]);
							print(" ".$lineData[findArrayFieldPos($fieldNames,"surname")]." ") ;
							print("(".$lineData[findArrayFieldPos($fieldNames,"address")].") already exists.</font><br>Do you want to ") ;
							
							print("<select name=".$update_count."_action>");
							print("<option value='add'> add this as someone new.</option>");
							print("<option value='attend'> just add the new attendance details.</option>");
							print("<option value='update'> update this person's details.</option>");							
							
							print("</select>");
							
							
							print("<input type=hidden name=".$update_count."_service value='".$service."'>");
							print("<input type=hidden name=".$update_count."_date value='".$date."'>");
							print("<input type=hidden name=".$update_count."_line value='".join(";",$lineData)."'>");
							print("<input type=hidden name=".$update_count."_id value='".findMemberID($lineData[findArrayFieldPos($fieldNames,"name")],$lineData[findArrayFieldPos($fieldNames,"surname")])."'>");
			
							print("<br><br>");
							break ;
							
					}
					
				
				}
				
				
			}
		
		}
		
		print("<input type=hidden name=numberOfFields value='".$numberOfFields."'>");
		print("<input type=hidden name=update_count value='".$update_count."'>");

		if ($showsubmit) {
			print("<input type=submit value=Proceed>");
		} else {
			print("Import Successful.");
		}
		
		print("</form>");
		
		fclose($handle);
		
		
	}	

	
	
	
	
	
	
	
	
	
	
	
	print("</table>");
	print("<br><br><br><br><br>");
	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
