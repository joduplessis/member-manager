<?

	function findArrayFieldPos($arr, $field) {
	
		$pos = false ;
	
		for ($count=0;$count < sizeof($arr);$count++) {
		
			if ($arr[$count] == $field) {
				$pos = $count; 
			}	
			
		}	

		return $pos ;
		
	}
	
	function findMemberID($name, $surname) {
	
		$query = mysql_query("SELECT id FROM community WHERE name = '$name' AND surname = '$surname'") or die (mysql_error()) ;
		if (mysql_num_rows($query)==0){
			return false ;
		} else {
			$val = mysql_fetch_row($query) ;
			$ret = $val['0'] ;
			return $ret ;
		}
		
	}	
	
	function memberCount($name, $surname) {
	
		$query = mysql_query("SELECT id FROM community WHERE name = '$name' AND surname = '$surname'") or die (mysql_error()) ;
		return mysql_num_rows($query) ;
		
	}	
	
	function createFieldArray($x) {
	
		$fields = array() ;
		
		for ($y = 1 ; $y <= $x ; $y++) {
		
			$varName = "db_" . $y ;		
			
			$varVal = $_GET[$varName] ;
			
			if ($varVal == "") {
				print("<script>alert('Please dont leave any fields blank.');window.history.back();</script>");
			} else {
				array_push($fields, $varVal) ;
			}
					
		}
		
		return $fields ;
		
	}

	function createLineData($buffer,$fieldNames,$numberOfFields) {
	
		$sql_values = array() ;	
		
		$lineData = explode(";",$buffer) ;		
		
		for ($bufferCount = 0 ; $bufferCount < $numberOfFields ; $bufferCount++) {

			$value = trim(str_replace("\"", "",$lineData[$bufferCount])) ;
			
			
			
			switch ($fieldNames[$bufferCount]) {
				
				case "suburb" :
					$value = findPlace("suburb",$value) ;
					break ;
				
				case "_ignore" :
					$value = "_ignore" ;
					break ;
				
				case "town" :
					$value = findPlace("town",$value) ;
					break ;
				
				case "is_member" :
					if (strtolower($value) == "") { $value = "0" ; }
					if (strtolower($value) == "v") { $value = "0" ; }
					if (strtolower($value) == "m") { $value = "1" ; }
					if (strtolower($value) == "y") { $value = "1" ; }
					if (strtolower($value) == "n") { $value = "1" ; }
					break ;
					
				default :
					$value = $value ;
			}
			
			array_push($sql_values, $value) ;
				
		}
		
		return $sql_values ;
			
	}
		
	function addNewPerson($fieldNames,$lineData) {
	
		$fieldNames = removeElementFromArray($fieldNames,"_ignore") ;
		$lineData = createSQLFields(removeElementFromArray($lineData,"_ignore")) ;
		
		$sql = "INSERT INTO community (".join(",",$fieldNames).") VALUES(".join(",",$lineData).")"	;
		
		$query = mysql_query($sql) ;
		
		if (!$query) {
			print("FAILED! NEW MEMBER INSERT ERROR :: ".mysql_error()."<br><br>") ;
		} else {
			print("Person created.<br>") ;
		}

	}
	
	function updateNewPerson($id,$fieldNames,$lineData) {
	
		$newFieldNames = removeElementFromArray($fieldNames,"_ignore") ;
		$newLineData = createSQLFields(removeElementFromArray($lineData,"_ignore")) ;
		
		$sqlDataArray = array() ;
		$sql = "UPDATE community SET "	;
		$x = 0 ;
		$tempString = "" ;
		
		foreach ($newFieldNames as $value) {
			$tempString = $value." = ".$newLineData[$x]."" ;	
			array_push($sqlDataArray,$tempString) ;
			$x++ ;
		}
		
		$sql .= join(",",$sqlDataArray) . " WHERE id = '".$id."'"	;
		
		$query = mysql_query($sql) ;
		
		if (!$query) {
			print("<font color=red>FAILED! MEMBER UPDATE ERROR :: ".mysql_error()."<br><br></font>") ;
		} else {
			print("Person updated.<br>") ;
		}
		
	}

	function addService($id,$service,$date) {
	
		$sql = "INSERT INTO attendance (member,date,service) VALUES('".$id."','".$date."','".$service."')"	;

		$query = mysql_query($sql) ;
		
		if (!$query) {
		
			print("<font color=red>FAILED! NEW MEMBER SERVICE TIME DATE INSERT ERROR :: ".mysql_error()."<br><br></font>") ;
			
			exit ;
			
		}

	}

?>















