<?
	include "../var.php" ;	
	
	$val = $_GET['val'] ;	
	$field = $_GET['field'] ;	
	$width = $_GET['width'] ;

	print("<table width=".$width." cellspacing=2 bgcolor=#eeeeee>");

	$x = 1 ;

	$sql = "SELECT ".$_GET['type']." FROM community WHERE ".$_GET['type']." LIKE '%".$val."%' LIMIT 0,10" ;
	
	$query = mysql_query($sql) ;
	
	while($getList = mysql_fetch_row($query)) {
	
		print("<tr id='row".$x."' onMouseOver=\"document.getElementById('row".$x."').style.backgroundColor='#dddddd'\" onMouseOut=\"document.getElementById('row".$x."').style.backgroundColor='#eeeeee'\" onClick=\"document.getElementById('".$field."').value = document.getElementById('row".$x."_val').value ; document.getElementById('search-results').style.display='none';\"><td><input type=hidden name=none id='row".$x."_val' value='".rtrim(mysql_real_escape_string($getList['0']))."'>".rtrim(mysql_real_escape_string($getList['0']))."</tr>");
		
		$x++ ;
		
	}
	
	if ($x==1) {
	
		print("<tr id='row".$x."'><td><font size=2><input type=hidden name=none id='row".$x."_val' value='There are no matches.'>There are no matches.</font></tr>");
		
	}
	
	echo '</table>' ;


	
?>

