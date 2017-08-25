<html>
<head>
<?	
	include "title.htm" ;
?>

</head>

<link href="styles.css" rel="stylesheet" type="text/css">

<body>


<table width="100%" height="100%" border="0" cellpadding="10" cellspacing="0">
  <tr>
	<td width="1" background="img/bg_bar_green.gif">&nbsp;</td>
	<td align="left" valign="top">
	<img src=img/music_head.gif>
	<br><br>
	
<div class=style5>We will e-mail you your login details once the request has been made.</div><br>		

<form action=request_music.do.php method=POST>
<table width="100%" border="0" cellpadding="3" cellspacing="0">
	<tr>
	<td align="right" width=100 valign="middle" class=style5>Name : 
	<td align="left" valign="top"><input type=text size=30 name=name class=booking_field>
	</tr>
	<tr>
	<td align="right" width=100 valign="middle" class=style5>Surname : 
	<td align="left" valign="top"><input type=text size=20 name=surname class=booking_field>
	</tr>
	<tr>
	<td align="right" width=100 valign="middle" class=style5>Contact Number : 
	<td align="left" valign="top"><input type=text size=20 name=contact class=booking_field>
	</tr>
	<tr>
	<td align="right" width=100 valign="middle" class=style5>E-Mail : 
	<td align="left" valign="top"><input type=text size=20 name=email class=booking_field>
	</tr>	
	<tr>
	<td align="right" width=100 valign="top" class=style5>
	<td align="left" valign="top"><input type=submit class=booking_field value='Request'>
	</tr>	
</table>

</form>

<br>

<a href=javascript:window.close() class=style66>Close Window (x)</a>

</table>

<?
	include "inc/footer.php" ;
?>	

</body>
</html>