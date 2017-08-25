<?

	include "top.php" ;
	include "var.import.php" ;
	
	$id = $_GET['id'] ;

	
	$service = $_GET['service'] ;
	$date = $_GET['date'] ;
	
	$lineData = array() ;
	$fieldNames = array() ;
	
	array_push($lineData,$_GET['name']) ;
	array_push($lineData,$_GET['surname']) ;
	array_push($lineData,$_GET['number_home']) ;
	array_push($lineData,$_GET['number_work']) ;
	array_push($lineData,$_GET['mobile']) ;
	array_push($lineData,$_GET['email']) ;
	array_push($lineData,$_GET['fax']) ;
	array_push($lineData,$_GET['address']) ;
	array_push($lineData,$_GET['suburb']) ;
	array_push($lineData,$_GET['town']) ;
	array_push($lineData,$_GET['homegroup']) ;
	array_push($lineData,$_GET['status']) ;
	array_push($lineData,$_GET['birth']) ;
	array_push($lineData,$_GET['baptism']) ;
	array_push($lineData,$_GET['visit']) ;
	array_push($lineData,$_GET['membership']) ;
	array_push($lineData,$_GET['occupation']) ;
	array_push($lineData,$_GET['leadership']) ;
	array_push($lineData,$_GET['notes']) ;	
	
	array_push($fieldNames,'name') ;
	array_push($fieldNames,'surname') ;
	array_push($fieldNames,'tel_home') ;
	array_push($fieldNames,'tel_work') ;
	array_push($fieldNames,'mobile') ;
	array_push($fieldNames,'email') ;
	array_push($fieldNames,'fax') ;
	array_push($fieldNames,'address') ;
	array_push($fieldNames,'suburb') ;
	array_push($fieldNames,'town') ;
	array_push($fieldNames,'homegroup') ;
	array_push($fieldNames,'is_member') ;
	array_push($fieldNames,'date_birthdate') ;
	array_push($fieldNames,'date_baptism') ;
	array_push($fieldNames,'date_firstvisit') ;
	array_push($fieldNames,'date_member') ;
	array_push($fieldNames,'occupation') ;
	array_push($fieldNames,'leadership') ;
	array_push($fieldNames,'notes') ;

	
	$service = $_GET['service'] ;
	$date = $_GET['date'] ;
	
	addNewPerson($fieldNames,$lineData) ;
	
	$i = findMemberID($lineData[findArrayFieldPos($fieldNames,"name")],$lineData[findArrayFieldPos($fieldNames,"surname")]) ;
	
	if ((trim($service)=="")&&(trim($date)=="")) { 
	
	} else { 
	
		addService($i,$service,$date) ; 
		
	}	
	
	print("<script>alert('Person Successfully Added.');window.location='community.add.php';</script>");	

		


?>
