<? 
	include "var.php" ;
	$homegroup_leader = $_GET['homegroup_leader'];
	$homegroup_age = $_GET['homegroup_age'];
	$homegroup_suburb = $_GET['homegroup_suburb'];
	$homegroup_day = $_GET['homegroup_day'];
	$homegroup_time = $_GET['homegroup_time'];	
	$homegroup_elder = $_GET['homegroup_elder'];

	if ($homegroup_leader=="") {
	
		print("<script>alert('Please select leader.');window.history.back();</script>") ;
	
	} else {

		$query = mysql_query("INSERT INTO homegroup (suburb,member_id,age_id,day,time,elder) VALUES ('$homegroup_suburb','$homegroup_leader','$homegroup_age','$homegroup_day','$homegroup_time','$homegroup_elder')") or die(mysql_error()) ;

		if ($query) {
		
			print("<script>alert('Homegroup added sucessfully.');window.location='homegroups.php';</script>") ;
			
		}	
	
	}

?>
