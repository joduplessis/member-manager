<?
	session_start() ;
?>

<html>

<head>

<?
	include "title.php" ;
?>

<style>

body {
	text-align: center;
	font-family: arial, sans-serif;
	font-size: 11px ;
	color: #aaaaaa;
	background-color: #FFFFFF;
}

td, field,a {
	font-family: arial, sans-serif;
	font-size: 11px ;
	color: #6E93B1 ;
	text-decoration: none ;
}

.field {
	font-size: 11px ;
	color: #6E93B1;
	background: #ffffff;
	border: 1px solid #6E93B1
}

.loginfield {
	font-size: 18px ;
	color: #254a70;
	background: #ffffff;
	border: 1px solid #6E93B1

}
</style>

</head>

<body topmargin=0 leftmargin=0 rightmargin=0 background=img/main_bg.jpg>

<? 
	include "var.php" ;
	
	if (!isset($_POST['username'])) {

		print("<br><br>");
		print("<br><br>");
		print("<br><br>");
		print("<br><br>");
		print("<br>");
		
		print("<form action=index.php method=POST>");

		print("<table border=0 cellpadding=20 cellspacing=0 align=left bgcolor=#477db6 width=100%>");
		print("<tr>");
		print("<td>");
		print("<input type=text name=username size=15 class='loginfield'> ");
		print("<input type=password name=password size=15 class='loginfield'> ");
		print("<input type=submit size=20  class='loginfield' value='Login Now'><Br><br>");
		print("<font color=#91b8e1>NCF Church Member Management System V1.0</font>");		
		print("</table>");


		print("</form>");
		
	} else {
	
		$username = $_POST['username'] ;
		$password = $_POST['password'] ;
		
		// checking for user
		$query = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die(mysql_error());

		if (mysql_num_rows($query) == 0) {
		
			print("<script>alert('Sorry, incorrect username or password.');window.location='index.php';</script>");
			
		} else {
		
			// setting session variable and sending them to the first page
			$_SESSION['username'] = $username ;
			print("<script>window.location='members.php';</script>");
			
		}
	
	}

	include "bottom.php" ;

?>
