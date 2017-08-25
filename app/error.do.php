<? 
	session_start();
	include "var.php" ;


	$error = $_GET['error'] ;		
	$user = $_SESSION['username'] ;

	
	$query = mysql_query("INSERT INTO error (user,date,description) VALUES ('$user',CURDATE(),'$error') ") or die(mysql_error()) ;

	if ($query) {
		print("<script>window.location='error.php?area=users';</script>") ;
	}
		

	
	
	
	
	
?>






















