<?
	session_start() ;
?>
<html>
<head>

<title>
	NCF Church Administration
</title>
</title>

<style>

body {
	text-align: center;
	font-family: arial, sans-serif;
	font-size: 12px ;
	color: #666666;
	background-color: #FFFFFF;
}

.member_table {
	
	font-family: arial, sans-serif;
	font-size: 12px ;
	color: #777777;
	
}

td, field,a {
	font-family: arial, sans-serif;
	font-size: 12px ;
	color: #193c6b ;
	text-decoration: none ;
}

.field {
	font-size: 12px ;
	color: #000000;
	background: #ffffff;
	border: 1px solid #193c6b
}

</style>


<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete ?")) {
    document.location = delUrl;
  }
}
function popup(page,x,y) {
	window.open(page,'','resizable=no,menubar=no,toolbar=no,location=no,scrollbars=yes,width=' + x + ',height=' + y + '');
}
</script>

</head>

<body topmargin=0 leftmargin=0 rightmargin=0 background=img/main_bg.jpg>

<? 
	include "../var.php" ;
?>