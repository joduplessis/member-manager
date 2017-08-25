<?
	include "top_pop.php" ;
	

	
	// sql details
	
	$id = $_GET['id'] ;
	
	$sql = "SELECT image,relationship_id,title,id FROM pictures WHERE id = '$id' ";
	
	$query = mysql_query($sql) or die(mysql_error());
	$list = mysql_fetch_row($query) ;
	
	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 border=0>");
	print("<tr bgcolor=#133b5e><td><font color=white><b>".$list['2']."</b><td align=right><a href='inc/edit_picture.php?id=".$list['3']."'><img src=img/member/edit.gif border=0></a>");

	print(" <tr><td colspan=2 align=center><img src='thumb.php?image=".$list['0']."&x=440'>");
	print("</table>");
	
	print("</table>");
	
	// end of main table

	
	include "bottom.php" ;

?>
