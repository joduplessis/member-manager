<? 

	include "var.php" ;
	
	if ($_GET['action_type']=="user_edit") {
	
		$id = $_GET['id'] ;	
		$name = $_GET['name'] ;		
		$surname = $_GET['surname'] ;		
		$username = $_GET['username'] ;
		$password = $_GET['password'] ;
		$email = $_GET['email'] ;
		$elder = $_GET['elder'] ;
		
		$query = mysql_query("UPDATE users SET name='$name',surname='$surname',username='$username',password='$password',email='$email',elder='$elder' WHERE id = '$id'")  or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=users';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="user_add") {
	
		$name = $_GET['name'] ;		
		$surname = $_GET['surname'] ;		
		$username = $_GET['username'] ;
		$password = $_GET['password'] ;
		$email = $_GET['email'] ;
		$elder = $_GET['elder'] ;
		
		$query = mysql_query("INSERT INTO users (name,surname,username,password,email,elder) VALUES ('$name','$surname','$username','$password','$email','$elder') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=users';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="user_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM users WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=users';</script>") ;
		}	
		
	}	
	
	
	
	if ($_GET['action_type']=="occ_edit") {
	
		$id = $_GET['id'] ;		
		$title = $_GET['title'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("UPDATE occupations SET occupation='$title',description='$description'WHERE id='$id'") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=occupations';</script>") ;
		}
		
	}
		
	if ($_GET['action_type']=="occ_add") {
	
		$title = $_GET['title'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("INSERT INTO occupations (occupation,description) VALUES ('$title','$description') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=occupations';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="occ_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM occupations WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=occupations';</script>") ;
		}	
		
	}	


	
	if ($_GET['action_type']=="loc_edit") {
	
		$table = $_GET['table'] ;	
		$id = $_GET['id'] ;	
		$loc = $_GET['loc'] ;	
		
		switch ($table) {
			case "code":
				$sql = "UPDATE codes SET code = '".$loc."' WHERE id = '".$id."' " ;
				break;
			case "suburb":
				$sql = "UPDATE suburbs SET suburb = '".$loc."' WHERE id = '".$id."' " ;
				break;
			case "town":
				$sql = "UPDATE towns SET town = '".$loc."' WHERE id = '".$id."' " ;
				break;
			case "region":
				$sql = "UPDATE regions SET region = '".$loc."' WHERE id = '".$id."' " ;
				break;
			case "country":
				$sql = "UPDATE countries SET country = '".$loc."' WHERE id = '".$id."' " ;
				break;
		}
		

		
		$query = mysql_query($sql) or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=locations';</script>") ;
		}
		
	}	

	if ($_GET['action_type']=="loc_add") {
	
		$loc = $_GET['loc'] ;	

		switch ($_GET['loc_type']) {
			case "code":
				$sql = "INSERT INTO codes (code) VALUES ('".$loc."') " ;
				break;
			case "suburb":
				$sql = "INSERT INTO suburbs (suburb) VALUES ('".$loc."') " ;
				break;
			case "city":
				$sql = "INSERT INTO towns (town) VALUES ('".$loc."') " ;
				break;
			case "region":
				$sql = "INSERT INTO regions (region) VALUES ('".$loc."') " ;
				break;
			case "country":
				$sql = "INSERT INTO countries (country) VALUES ('".$loc."') " ;
				break;
		}
		

		
		$query = mysql_query($sql) or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=locations';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="loc_del") {
	
		$id = $_GET['id'] ;
		$table = $_GET['table'] ;
		
		$sql = "DELETE FROM ".$table." WHERE id = '$id'" ;
		$query = mysql_query($sql) or die(mysql_error()) ;
		
		if ($query) {
			print("<script>window.location='settings_list.php?area=locations';</script>") ;
		}	
		
	}
	
	

	if ($_GET['action_type']=="groups_edit") {
	
		$id = $_GET['id'] ;
		$title = $_GET['title'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("UPDATE groups SET title='$title', description='$description' WHERE id = '$id' ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=groups';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="groups_add") {
	
		$title = $_GET['title'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("INSERT INTO groups (title,description) VALUES ('$title','$description') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=groups';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="groups_del") {
	
		$id = $_GET['id'] ;
		
		@mysql_query("DELETE FROM groups_member WHERE groups_id = '$id'") or die(mysql_error()) ;
		
		$query = mysql_query("DELETE FROM groups WHERE id = '$id'") or die(mysql_error()) ;
		
		if ($query) {
			print("<script>window.location='settings_list.php?area=groups';</script>") ;
		}	
		
	}
	
	
	
	if ($_GET['action_type']=="in_edit") {
	
		$id = $_GET['id'] ;
		$title = $_GET['title'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("UPDATE involvement SET title='$title', description='$description' WHERE id = '$id' ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=involvements';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="in_add") {
	
		$title = $_GET['title'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("INSERT INTO involvement (title,description) VALUES ('$title','$description') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=involvements';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="in_del") {
	
		$id = $_GET['id'] ;
		
		@mysql_query("DELETE FROM involvement_member WHERE involvement_id = '$id'") or die(mysql_error()) ;
		
		$query = mysql_query("DELETE FROM involvement WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=involvements';</script>") ;
		}	
		
	}	
	


	if ($_GET['action_type']=="roles_edit") {
	
		$role = $_GET['role'] ;		
		$id = $_GET['id'] ;		
		
		$query = mysql_query("UPDATE roles SET role = '$role' WHERE id = '$id' ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=roles';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="roles_add") {
	
		$role = $_GET['role'] ;		
		
		$query = mysql_query("INSERT INTO roles (role) VALUES ('$role') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=roles';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="roles_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM roles WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=roles';</script>") ;
		}	
		
	}
	


	if ($_GET['action_type']=="skills_edit") {
	
		$skill = $_GET['skill'] ;		
		$id = $_GET['id'] ;
		
		$query = mysql_query("UPDATE skills SET skill = '$skill' WHERE id = '$id'") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=skills';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="skills_add") {
	
		$skill = $_GET['skill'] ;		
		
		$query = mysql_query("INSERT INTO skills (skill) VALUES ('$skill') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=skills';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="skills_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM skills WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=skills';</script>") ;
		}	
		
	}
	

	if ($_GET['action_type']=="relationship_edit") {
	
		$relationship = $_GET['relationship'] ;		
		$id = $_GET['id'] ;	
		
		$query = mysql_query("UPDATE relationship_type SET description = '$relationship' WHERE id = '$id' ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=relationship';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="relationship_add") {
	
		$relationship = $_GET['relationship'] ;		
		
		$query = mysql_query("INSERT INTO relationship_type (description) VALUES ('$relationship') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=relationship';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="relationship_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM relationship_type WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=relationship';</script>") ;
		}	
		
	}	
	

	if ($_GET['action_type']=="leadership_edit") {
	
		$leadership = $_GET['leadership'] ;	
		$id = $_GET['id'] ;
		
		$query = mysql_query("UPDATE leadership SET title = '$leadership' WHERE id = '$id' ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=leadership';</script>") ;
		}
		
	}

	if ($_GET['action_type']=="leadership_add") {
	
		$leadership = $_GET['leadership'] ;		
		
		$query = mysql_query("INSERT INTO leadership (title) VALUES ('$leadership') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=leadership';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="leadership_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM leadership WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=leadership';</script>") ;
		}	
		
	}	
		
	
	
	if ($_GET['action_type']=="service_edit") {
	
		$id = $_GET['id'] ;		
		$time = $_GET['time'] ;		
		$description = $_GET['description'] ;		
		
		$query = mysql_query("UPDATE service SET time='$time',description='$description' WHERE id='$id'") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=service';</script>") ;
		}
		
	}
		
	if ($_GET['action_type']=="service_add") {
	
		$time = $_GET['time'] ;		
		$description = $_GET['description'] ;			
		
		$query = mysql_query("INSERT INTO service (time,description) VALUES ('$time','$description') ") or die(mysql_error()) ;

		if ($query) {
			print("<script>window.location='settings_list.php?area=service';</script>") ;
		}
		
	}
	
	if ($_GET['action_type']=="service_del") {
	
		$id = $_GET['id'] ;
		$query = mysql_query("DELETE FROM service WHERE id = '$id'") or die(mysql_error()) ;
		if ($query) {
			print("<script>window.location='settings_list.php?area=service';</script>") ;
		}	
		
	}	
	
	
	
?>






















