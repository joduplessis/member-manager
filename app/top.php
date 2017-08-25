<?
	session_start() ;
?>

<html>
<head>

<?
	include "title.php" ;
?>

</title>

<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]--> 
<script type="text/javascript" src="coolclock.js"></script> 
<script type="text/javascript" src="moreskins.js"></script>

<!-- calender -->
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar-setup.js"></script>

<!-- ajax processing -->
<script language=javascript type=text/javascript src=jscripts/make_ajax.js></script>
<script language=javascript type=text/javascript src=jscripts/make_events.js></script>	
<script language=javascript type=text/javascript src=jscripts/make_window.js></script>

<!-- misc functions -->
<script language=javascript type=text/javascript src=jscripts/program.js></script>

<!-- calendar stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="calendar-win2k-cold-1.css" title="win2k-cold-1" />

<!-- main -->
<link rel="stylesheet" type="text/css" href="program.css"/>

</head>

<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>

<table width=100% border=0 cellspacing=0 cellpadding=10>
<tr>
<td width=200><img src=img/logo1.gif>
<td align=right valign=bottom>
<font size=3><b>Welcome back <i><? print($_SESSION['username']); ?>.</b></i></font>
<br>
<a href=settings.php>Settings / Admin</a> &nbsp;&nbsp;&nbsp;&nbsp; 
<a href=error.php>Report An Error</a>

</table>
	
<table width=100% border=0 cellspacing=0 cellpadding=5 bgcolor=#3f8ad6>
<tr>
	<td align=center width="13%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('none')" onmouseout="this.style.background='#3f8ad6';"><a href=main.php id=navtable>Home</a>
	
	<td align=center width="13%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('main')" onmouseout="this.style.background='#3f8ad6';"><a href=members.php id=navtable>Community List</a>
	
	<td align=center width="12%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('homegroups')" onmouseout="this.style.background='#3f8ad6';"><a href=homegroups.php id=navtable>Homegroups</a>
	
	<td align=center width="12%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('news')" onmouseout="this.style.background='#3f8ad6';"><a href=news.php id=navtable>News</a>
	
	<td align=center width="12%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('events')" onmouseout="this.style.background='#3f8ad6';"><a href=events.php id=navtable>Events</a>
	
	<td align=center width="12%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('search')" onmouseout="this.style.background='#3f8ad6';"><a href=search.php id=navtable>Search</a>
	
	<td align=center width="13%" onmouseover="this.style.background='#285e95'; this.style.cursor='hand'; loadSubMenu('import')" onmouseout="this.style.background='#3f8ad6';"><a href=logout.php id=navtable>Logout (x)</a>
	

<tr bgcolor=#91b8e1>
	<td colspan=8>
	<div id=submenu>
		<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1>
		<tr>
			<td id=navtable1 align=right width=205>Welcome to NCF Church.
		</table>
	</div>
</table>


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

?>
