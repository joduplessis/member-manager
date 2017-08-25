<? 

	include "var.php" ;
	
	if ($_GET['action_type']=="add") {
	
		$news = $_GET['news'] ;		
		$date = $_GET['date'] ;		
		$query = mysql_query("INSERT INTO news (description,expire) VALUES ('$news','$date') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='news.php';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="delete") {
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM news WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='news.php';</script>") ;
		}	
	}	
	
	if ($_GET['action_type']=="edit") {
	
		$id = $_GET['id'] ;
		$news = $_GET['news'] ;		
		$date = $_GET['date'] ;		

		$query = mysql_query("UPDATE news SET description = '$news', expire = '$date' WHERE id='$id'") or die(mysql_error()) ;
	
		if ($query) {			
			print("<script>window.location='news.php';</script>") ;
		}
		
	}
	


?>
