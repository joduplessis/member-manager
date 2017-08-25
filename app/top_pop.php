<?
	session_start() ;
?>

<html>
<head>

<?
	include "title.php" ;
?>

</title>
  <!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="calendar-win2k-cold-1.css" title="win2k-cold-1" />

  <!-- main calendar program -->
  <script type="text/javascript" src="calendar.js"></script>

  <!-- language for the calendar -->
  <script type="text/javascript" src="lang/calendar-en.js"></script>

  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="calendar-setup.js"></script>

<script>

function popup(page,x,y) {
	window.open(page,'','resizable=no,menubar=no,toolbar=no,location=no,scrollbars=yes,width=' + x + ',height=' + y + '');
}
	
function confirmDelete(delUrl) {
	if (confirm("Are you sure you want to delete ?")) {
		document.location = delUrl;
	} else {
		document.location = document.location ;
	}
	document.getElementById("memberDelete").style.display = 'none' ;
}


function hideWindow() {
	document.getElementById("memberDelete").style.display = 'none' ;
}

function showWindow(delUrl) {
	document.getElementById("memberDelete").style.display = '' ;
	document.getElementById("deleteLink").href = 'javascript:confirmDelete(\'' + delUrl + '\')' ;
	document.getElementById("tagLink").href  = 'javascript:confirmDelete(\'' + delUrl + '&type=tag\')' ;
}
function deleteMember(delUrl) {
	
}

function calc_check() {

	if (document.getElementById("member").checked == true) {
		document.getElementById("memdate_details").style.display = '' ;
	} else {
		document.getElementById("memdate_details").style.display = 'none' ;
	}
}
	
</script>
<style>

body {
	text-align: center;
	font-family: arial, sans-serif;
	font-size: 11px ;
	color: #666666;
	background-color: #FFFFFF;
}

.member_table {
	
	font-family: arial, sans-serif;
	font-size: 11px ;
	color: #333333;
	
}

td, a {
	font-family: arial, sans-serif;
	font-size: 11px ;
	color: #193c6b ;
	text-decoration: none ;
}

a:hover {
	font-weight: bold;
}

.nav {
	font-family: arial, sans-serif;
	font-size: 11px ;
	color: white ;
	text-decoration: none ;
}

.field {
	z-index: 0 ;
	font-size: 11px ;
	color: #000000;
	background: #ffffff;
	border: 1px solid #193c6b
}



</style>

</head>

<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>

<div style="z-index:100; position: absolute; left: 389px; top: 150px; height: 200px; width: 299px; padding: 2px; display: none;" id=memberDelete>

	<table width=100% bgcolor=red cellpadding=10 cellspacing=10 height=100%>
	<tr><td align=center valign=middle bgcolor=#f1f1f1>
	
		<table width=100% cellpadding=0 cellspacing=0 height=100% bgcolor=#f1f1f1>
		<tr><td align=center valign=middle>	
				Delete & keep on record? &nbsp;&nbsp;&nbsp; Delete Forever? &nbsp;&nbsp;&nbsp;
				
			<br>
			<a href='#' id=tagLink>
				<img src=img/button_hide.jpg border=0>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='#' id=deleteLink>
				<img src=img/button_delete.jpg border=0>
			</a>
		<tr><td align=right valign=middle><b><a href=javascript:hideWindow()>Close Window (x)</a></b>
		</table>
		
	</tr>
	</table>
	
</div>

<? 
	include "var.php" ;
	
	// if the user isn't logged in this will send them back to the login page
	
	if  (!isset($_SESSION['username'])) {
		print("<script>alert('Sorry, incorrect username or password.');window.location='index.php';</script>");
	}
	
	print("<table width=100% border=0 cellspacing=0 cellpadding=10>");
	print("<tr><td width=1><img src=img/logo1.gif>");
	print("<td align=right valign=bottom>");
	print("<a href=javascript:window.close()>Close Window (x)</a>");
	print("</table>");
?>
