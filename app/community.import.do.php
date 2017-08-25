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
	
	
	print("<form action=community.import.add.php method=GET enctype='multipart/form-data'>");
	

	$uploadfile = "temp/" . basename($_FILES['import_file']['name']);
	
	if (!move_uploaded_file($_FILES['import_file']['tmp_name'], $uploadfile)) {
	
	    print("Sorry, unexpected error. Please contact administrator or try again later.") ;
		
	} else {
	
		print("Using ... ".$_FILES['import_file']['name'].".");
		
		$handle = @fopen($uploadfile, "r");
		
		if ($handle) {
		
			print("<table width=100% cellpadding=0 cellspacing=10 border=0>");

			$buffer = fgets($handle, 4096);
			
			$x = 0;
			
			foreach(explode(";",$buffer) as $value) {
			
				$x++;

				print("<tr><td width=100 align=right> Column ".$x." :<td>");
				print("<select name='db_".$x."' class=field>");
				print("<option value='_ignore'>-----------------------</option>");
				print("<option value='_ignore'>Ignore</option>");
				print("<option value='name'>Name</option>");
				print("<option value='surname'>Surname</option>");
				print("<option value='address'>Address (Eg. 34 ComplexName / 34 RoadName)</option>");
				print("<option value='suburb'>Suburb</option>");
				print("<option value='town'>Town / City</option>");
				print("<option value='tel_home'>Tel. Home</option>");
				print("<option value='tel_work'>Tel. Work</option>");
				print("<option value='fax'>Fax</option>");
				print("<option value='mobile'>Cell Number</option>");
				print("<option value='email'>E-Mail</option>");
				print("<option value='is_member'>Member Status</option>");
				print("<option value='homegroup'>Homegroup</option>");
				
				print("</select></tr>");					

			}
			
			print("<input type=hidden name=numberOfFields value='".$x."'>");
			
			fclose($handle);		

		}	
		
		print("<tr><td align=right>First row is a header line:<td><input type=checkbox class=field name=header>");
		print("<input type=hidden name=filename value='".$uploadfile."'>");
		print("<input type=hidden name=service value='".$_POST['service']."'>");		
		print("<input type=hidden name=date value='".$_POST['date']."'>");
		
		
		print("<tr><td align=right><td>");
		print("<br><input type=submit value=' Import ' class=field>");
		
	}

	
	
	
	
	
	
	

	print("</table></form><br><br><br><br><br>");


	

	

	print("</table>");
	print("</center>");
	print("</table>");
		
	include "bottom.php" ;

?>
