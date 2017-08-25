<?

	include "var.php" ;
	include "var.compile.php" ;
	include "var.import.php" ;

	/*
	
	$query = mysql_query("SELECT name, surname FROM community ORDER BY surname ") or die(mysql_error()) ;
	$count = 0 ;
	
	while ($data = mysql_fetch_row($query)) {
	
		$name = mysql_real_escape_string($data['0']) ; 
		$surname = mysql_real_escape_string($data['1']) ;
		
		$checker = mysql_query("SELECT id FROM members WHERE name LIKE '%$name%' AND surname LIKE '%$surname%'") or die(mysql_error()) ;
		
		if (mysql_num_rows($checker) > 0) {
		
			$get_id = mysql_fetch_row($checker) ;
			$id = $get_id['0'] ;
			
			mysql_query("DELETE FROM members WHERE id = '$id'") or die(mysql_error()) ;
			
		}
		
	}

	*/
	
	print("<a href='".makePDF("SELECT name,surname,address1,tel_home,tel_home,mobile FROM members ORDER BY surname")."'>");
	print("<img src=img/pdf.gif border=0>");
	print("</a>");		


?>
