<?

	include "top.php" ;
	

	include	"inc/class.ezpdf.php" ;
	
	$sql_query = mysql_query("SELECT * FROM pictures ORDER BY member_id") or die(mysql_error());
	
	if (mysql_num_rows($sql_query)==0) {
	
			print("<script>alert('Sorry, there are no images.');window.history.back();</script>") ;
			
	} else {
	
		$fname = 'file/gallery.pdf';
		
		$pdf =& new Cezpdf();
		$pdf->selectFont('./fonts/Helvetica.afm');
		$pdf->ezStartPageNumbers(300,10,10,'','',1);

		$pdf->addText(50,50,30,"<b>Member Gallery</b>");
		
		while ($list = mysql_fetch_row($sql_query)) {
		
			$pdf->ezColumnsStart(array('num'=>1,'gap'=>50));
			$pdf->ezNewPage();
			$pdf->ezImage($list['1'],0,300,'width','left');
			$pdf->addText(50,50,24,"<b>".getCommunityMember($list['2'],name)." ".getCommunityMember($list['2'],surname)."</b>");
			$pdf->ezColumnsStop() ;		
			
		}
			

		
		$pdfcode = $pdf->output();

		$fp = fopen($fname,'w');
		fwrite($fp,$pdfcode);
		fclose($fp);
		
		print("<script>window.open('".$fname."');window.history.back();</script>");
		
	}


	

	



?>



