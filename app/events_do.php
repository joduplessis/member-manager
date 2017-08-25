<? 

	include "var.php" ;
	
	if ($_GET['action_type']=="add") {
	
		$description = $_GET['description'] ;		
		$title = $_GET['title'] ;		
		$start = $_GET['start'] ;
		$end = $_GET['end'] ;
		$age = $_GET['age'] ;
		$leader = $_GET['leader_id'] ;
		$query = mysql_query("INSERT INTO events (description,title,date_start,date_end,age_group,person) VALUES ('$description','$title','$start','$end','$age','$leader') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='events.php';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="delete") {
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM events WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='events.php';</script>") ;
		}	
	}	
	
	if ($_GET['action_type']=="edit") {
	
		$id = $_GET['id'] ;
		$description = $_GET['description'] ;		
		$title = $_GET['title'] ;		
		$start = $_GET['start'] ;
		$end = $_GET['end'] ;
		$age = $_GET['age'] ;
		$leader = $_GET['leader_id'] ;


		$query = mysql_query("UPDATE events SET description = '$description', title = '$title', date_start = '$start', date_end = '$end', age_group = '$age', person = '$leader' WHERE id='$id'") or die(mysql_error()) ;
	
		if ($query) {			
			print("<script>window.location='events.php';</script>") ;
		}
		
	}
	


?>
