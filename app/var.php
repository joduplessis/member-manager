<?

	define("HOST", "");
	define("USERNAME", "");
	define("PASSWORD", "");
	define("DATABASE", "");

	mysql_connect(HOST,USERNAME,PASSWORD) or die(mysql_error()) ;
	mysql_select_db(DATABASE) or die(mysql_error()) ;

	function findPlace($select_var,$value) {
		$returnValue = "" ;
		switch ($select_var) {

			case "suburb":
				$query = mysql_query("SELECT id FROM suburbs WHERE suburb LIKE '%$value%'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				if (mysql_num_rows($query)==0) {
					$returnValue= "" ;
				} else {
					$returnValue = $val['0'] ;
				}
				break ;
			case "town":
				$query = mysql_query("SELECT id FROM towns WHERE town LIKE '%$value%'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				if (mysql_num_rows($query)==0) {
					$returnValue= "" ;
				} else {
					$returnValue = $val['0'] ;
				}
				break ;

		}
		return $returnValue ;

	}

	function getUser($user,$type) {

		$returnValue = "" ;

		switch ($type) {

			case "username":
				$query = mysql_query("SELECT username FROM users WHERE id = '$user'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				$returnValue = $val['0'] ;
				break ;
			case "password":
				$query = mysql_query("SELECT password FROM users WHERE id = '$user'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				$returnValue = $val['0'] ;
				break ;
			case "name":
				$query = mysql_query("SELECT name FROM users WHERE id = '$user'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				$returnValue = $val['0'] ;
				break ;
			case "surname":
				$query = mysql_query("SELECT surname FROM users WHERE id = '$user'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				$returnValue = $val['0'] ;
				break ;
			case "email":
				$query = mysql_query("SELECT email FROM users WHERE id = '$user'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				$returnValue = $val['0'] ;
				break ;
			case "elder":

				$query = mysql_query("SELECT elder FROM users WHERE username = '$user'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				if ($val['0']=='1') {
					$returnValue = true ;
				} else {
					$returnValue = false ;
				}

				break ;
		}

		return $returnValue ;

	}

	function arrayCut($arr,$val) {

		$size = sizeof($arr) ;
		$string = "" ;
		for ($x=0;$x<$size;$x++) {
				if ($x != ($size-1)) {
					$string .= $arr[$x].$val ;
				} else {
					$string .= $arr[$x] ;
				}
		}

		return $string ;
	}

	function getMonth($num) {
		switch ($num) {
			case "01":
				return "00" ;
				break ;
			case "01":
				return "January" ;
				break ;
			case "02":
				return "Febuary" ;
				break ;
			case "03":
				return "March" ;
				break ;
			case "04":
				return "April" ;
				break ;
			case "05":
				return "May" ;
				break ;
			case "06":
				return "June" ;
				break ;
			case "07":
				return "July" ;
				break ;
			case "08":
				return "August" ;
				break ;
			case "09":
				return "September" ;
				break ;
			case "10":
				return "October" ;
				break ;
			case "11":
				return "November" ;
				break ;
			case "12":
				return "December" ;
				break ;
		}
	}

	function getCommunityMember($id,$type) {

		switch ($type) {
			case "name":
				$query = mysql_query("SELECT name FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "surname":
				$query = mysql_query("SELECT surname FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "work":
				$query = mysql_query("SELECT tel_work FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "home":
				$query = mysql_query("SELECT tel_home FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "mobile":
				$query = mysql_query("SELECT mobile FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "fax":
				$query = mysql_query("SELECT fax FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "email":
				$query = mysql_query("SELECT email FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "address":
				$query = mysql_query("SELECT address FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "suburb":
				$query = mysql_query("SELECT suburb FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "town":
				$query = mysql_query("SELECT town FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "homegroup":
				$query = mysql_query("SELECT homegroup FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "member":
				$query = mysql_query("SELECT is_member FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;



			case "birth":
				$query = mysql_query("SELECT date_birthdate FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "baptism":
				$query = mysql_query("SELECT date_baptism FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "visit":
				$query = mysql_query("SELECT date_firstvisit FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "membership":
				$query = mysql_query("SELECT date_member FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "death":
				$query = mysql_query("SELECT date_death FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "death":
				$query = mysql_query("SELECT date_death FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "occupation":
				$query = mysql_query("SELECT occupation FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "leadership":
				$query = mysql_query("SELECT leadership FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "notes":
				$query = mysql_query("SELECT notes FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
		}

	}

	function communityTotal() {

		$query = mysql_query("SELECT id FROM community") or die (mysql_error()) ;
		$val = mysql_num_rows($query) ;
		return $val ;

	}

	function getMember($id,$type) {

		switch ($type) {
			case "id":
				$id_ex = explode(",",$id);
				$name = $id_ex['0'] ;
				$surname = $id_ex['1'] ;
				$query = mysql_query("SELECT id FROM community WHERE name = '$name' AND surname = '$surname'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "name":
				$query = mysql_query("SELECT name FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "surname":
				$query = mysql_query("SELECT surname FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "work":
				$query = mysql_query("SELECT tel_work FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "home":
				$query = mysql_query("SELECT tel_home FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "cell":
				$query = mysql_query("SELECT mobile FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "fax":
				$query = mysql_query("SELECT fax FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "email":
				$query = mysql_query("SELECT email FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "address1":
				$query = mysql_query("SELECT address1 FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "address2":
				$query = mysql_query("SELECT address2 FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "suburb":
				$query = mysql_query("SELECT suburb FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "birthdate":
				$query = mysql_query("SELECT birthdate FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "homegroup":
				$query = mysql_query("SELECT homegroup FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "elder":
				$query = mysql_query("SELECT homegroup FROM community WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;

		}

	}

	function getGroup($age,$type) {

		if ($age==0) {

			return "All" ;

		} else {

			$sql = "SELECT ".$type." FROM groups WHERE id = '".$age."'" ;
			$query = mysql_query($sql) or die(mysql_error()) ;
			$val = mysql_fetch_row($query) ;
			return $val['0'] ;

		}
	}

	function getPlaceID($place,$type) {

		switch ($type) {

			case "suburb":
				$query = mysql_query("SELECT id FROM suburbs WHERE suburb LIKE '$place'") or die (mysql_error()) ;
				break ;
			case "town":
				$query = mysql_query("SELECT id FROM towns WHERE town LIKE '$place'") or die (mysql_error()) ;
				break ;

		}

		$val = mysql_fetch_row($query) ;
		$ret = $val['0'] ;

		return $ret ;

	}

	function getPlace($id,$type) {

		$ret = "" ;

		switch ($type) {

			case "suburb":
				$query = mysql_query("SELECT suburb FROM suburbs WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "town":
				$query = mysql_query("SELECT town FROM towns WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "region":
				$query = mysql_query("SELECT region FROM regions WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "country":
				$query = mysql_query("SELECT country FROM countries WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "code":
				$query = mysql_query("SELECT code FROM codes WHERE id = '$id'") or die (mysql_error()) ;
				break ;
		}

		if ($ret == "") {
			$val = mysql_fetch_row($query) ;
			$ret = $val['0'] ;
		}

		return $ret ;

	}

	function getHomegroup($id,$type) {

		$ret = "" ;

		switch ($type) {
			case "is_leader":
				$query = mysql_query("SELECT * FROM homegroup WHERE member_id = '$id'") or die (mysql_error()) ;
				if (mysql_num_rows($query)==0){
					return false ;
				} else {
					return true ;
				}
				break ;

			case "leader":
				$query = mysql_query("SELECT member_id FROM homegroup WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "suburb":
				$query = mysql_query("SELECT suburb FROM homegroup WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "age_group":
				$query = mysql_query("SELECT age_id FROM homegroup WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "day":
				$query = mysql_query("SELECT day FROM homegroup WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "time":
				$query = mysql_query("SELECT time FROM homegroup WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
			case "elder":
				$query = mysql_query("SELECT elder FROM homegroup WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;
		}




	}

	function getOccupation($id,$type) {

		$ret = "" ;

		switch ($type) {

			case "occupation":
				$query = mysql_query("SELECT occupation FROM occupations WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "description":
				$query = mysql_query("SELECT description FROM occupations WHERE id = '$id'") or die (mysql_error()) ;
				break ;
		}



		if ($ret == "") {
			$val = mysql_fetch_row($query) ;
			$ret = $val['0'] ;
		}

		return $ret ;

	}

	function getService($id,$type) {

		$ret = "" ;

		switch ($type) {

			case "time":
				$query = mysql_query("SELECT time FROM service WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "description":
				$query = mysql_query("SELECT description FROM service WHERE id = '$id'") or die (mysql_error()) ;
				break ;
		}



		if ($ret == "") {
			$val = mysql_fetch_row($query) ;
			$ret = $val['0'] ;
		}

		return $ret ;

	}

	function getRelationship($id,$type) {


		switch ($type) {

			case "type":
				$query = mysql_query("SELECT description FROM relationship_type WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;

			case "relationship_type":
				$query = mysql_query("SELECT relationship FROM relationship WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;

			case "other_person":
				$query = mysql_query("SELECT secondary_person FROM relationship WHERE id = '$id'") or die (mysql_error()) ;
				$val = mysql_fetch_row($query) ;
				return $val['0'] ;
				break ;

			case "has":
				$query = mysql_query("SELECT * FROM relationship WHERE primary_person = '$id' OR secondary_person = '$id'") or die (mysql_error()) ;
				if (mysql_num_rows($query) == 0){
					return false ;
				} else {
					return true ;
				}
				break ;

		}

	}

	function getLeadership($id,$type) {

		$ret = "" ;

		switch ($type) {

			case "role":
				$query = mysql_query("SELECT title FROM leadership WHERE id = '$id'") or die (mysql_error()) ;
				break ;
			case "description":
				$query = mysql_query("SELECT description FROM leadership WHERE id = '$id'") or die (mysql_error()) ;
				break ;
		}



		if ($ret == "") {
			$val = mysql_fetch_row($query) ;
			$ret = $val['0'] ;
		}

		return $ret ;

	}

	function getSkill($skill,$type) {

		switch ($type) {
		case "skill":
			$query = mysql_query("SELECT skill FROM skills WHERE id = '$skill'") or die (mysql_error()) ;
			break ;
		case "skill_id":
			$query = mysql_query("SELECT skill_id FROM skill_member WHERE id = '$skill'") or die (mysql_error()) ;
			break ;
		case "qual":
			$query = mysql_query("SELECT qualifications FROM skill_member WHERE id = '$skill'") or die (mysql_error()) ;
			break ;
		}
		$val = mysql_fetch_row($query) ;
		$ret = $val['0'] ;

		return $ret ;

	}

	function getInvolvement($id,$type) {

		switch ($type) {
			case "title":
			$query = mysql_query("SELECT title FROM involvement WHERE id = '$id'") or die (mysql_error()) ;
			break;
			case "description":
			$query = mysql_query("SELECT description FROM involvement WHERE id = '$id'") or die (mysql_error()) ;
			break;
		}



		$val = mysql_fetch_row($query) ;
		$ret = $val['0'] ;

		return $ret ;

	}

	function getRole($role) {

		$query = mysql_query("SELECT role FROM roles WHERE id = '$role'") or die (mysql_error()) ;

		$val = mysql_fetch_row($query) ;
		$ret = $val['0'] ;

		return $ret ;

	}

	function addInvolvement($id,$in,$role) {

		$query = mysql_query("INSERT INTO involvement_member(involvement_id,member_id,role) VALUES('$in','$id','$role')") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function addGroup($id,$in) {

		$query = mysql_query("INSERT INTO groups_member(groups_id,member_id) VALUES('$in','$id')") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function getInvolvementID($id) {

		$query = mysql_query("SELECT involvement_id FROM involvement_member WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			$list = mysql_fetch_row($query) ;
			return $list['0'] ;
		}

	}

	function getGroupID($id) {

		$query = mysql_query("SELECT groups_id FROM groups_member WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			$list = mysql_fetch_row($query) ;
			return $list['0'] ;
		}

	}

	function editInvolvement($id,$in,$role) {

		$query = mysql_query("UPDATE involvement_member SET involvement_id = '$in', role = '$role' WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function editGroup($id,$in) {

		$query = mysql_query("UPDATE groups_member SET groups_id = '$in', WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function addSkill($id,$skill,$qa) {

		$query = mysql_query("INSERT INTO skill_member(skill_id,member_id,qualifications) VALUES('$skill','$id','$qa')") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function editSkill($id,$skill,$qa) {

		$query = mysql_query("UPDATE skill_member SET skill_id='$skill', qualifications='$qa' WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function deleteSkill($id) {

		$query = mysql_query("DELETE FROM skill_member WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.history.back();</script>");
		}

	}

	function deleteInvolvement($id) {

		$query = mysql_query("DELETE FROM involvement_member WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.history.back();</script>");
		}

	}

	function deleteGroup($id) {

		$query = mysql_query("DELETE FROM groups_member WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.history.back();</script>");
		}

	}

	function deleteImage($id) {

		$query = mysql_query("DELETE FROM pictures WHERE id = '$id'") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.history.back();</script>");
		}

	}

	function addImage($image,$title,$id) {

		$query = mysql_query("INSERT INTO pictures(image,member_id,title) VALUES('$image','$id','$title')") ;

		if (!$query) {
			print(mysql_error());
		} else {
			print("<script>window.opener.location = window.opener.location;window.close();</script>");
		}

	}

	function isArrayEmpty($arr) {

		$empty = true ;

		for ($x = 0 ; $x < sizeof($arr) ; $x++) {

			if (trim($arr[$x]) != "") {

				$empty = false ;

			}

		}

		return $empty ;

	}

	function removeElementFromArray($arr,$val) {

		$newArray = array() ;

		for ($x = 0 ; $x < sizeof($arr) ; $x++) {

			if ($arr[$x] != $val) {

				array_push($newArray, $arr[$x]) ;

			}

		}

		return $newArray ;

	}

	function createSQLFields($arr) {

		$newArray = array() ;

		for ($x = 0 ; $x < sizeof($arr) ; $x++) {
			array_push($newArray, "'".$arr[$x]."'") ;
		}

		return $newArray ;

	}

?>
