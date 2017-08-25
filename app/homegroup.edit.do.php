<? 
	include "var.php" ;
	
	$homegroup_id = $_GET['homegroup_id'];	
	$homegroup_leader = $_GET['leader_id'];
	$homegroup_age = $_GET['homegroup_age'];
	$homegroup_suburb = $_GET['homegroup_suburb'];
	$homegroup_day = $_GET['homegroup_day'];
	$homegroup_time = $_GET['homegroup_time'];	
	$homegroup_elder = $_GET['homegroup_elder'];

	if ($homegroup_leader=="") {
	
		print("<script>alert('Please select leader.');window.history.back();</script>") ;
	
	} else {
		$query = mysql_query("UPDATE homegroup SET member_id='$homegroup_leader', age_id='$homegroup_age', suburb='$homegroup_suburb', day='$homegroup_day', time='$homegroup_time', elder='$homegroup_elder' WHERE id='$homegroup_id'") or die("error".mysql_error()) ;

		if ($query) {
		
			print("<script>alert('Homegroup edited sucessfully.');window.location='homegroups.php';</script>") ;
			
		}	
	
	}
	
	



?>
