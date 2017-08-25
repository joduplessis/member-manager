<?

	function makeCSV($sql) {
	
		$sql_query = mysql_query($sql) or die(mysql_query()) ;
		
		$fname = 'file/'.time().'.csv';		
		$content = "Surname, Name, Home Number, Work Number, Mobile Number\n" ;

		while ($list = mysql_fetch_row($sql_query)) {
		
			$content .= $list['1'] . "," ;
			$content .= $list['0'] . "," ;
			$content .= $list['3'] . "," ;
			$content .= $list['4'] . "," ;
			$content .= $list['5'] ;
			$content .= "\n" ;
		}
		
		$fp = fopen($fname,'w');
		fwrite($fp,$content);
		fclose($fp);
		
		return $fname;

	} 
		
	function makePDF($sql) {
	
		include	"inc/class.ezpdf.php" ;
		
		$sql_query = mysql_query($sql) or die(mysql_query()) ;
		
		$fname = 'file/'.time().'.pdf';
		
		$pdf =& new Cezpdf();
		$pdf->selectFont('./fonts/Helvetica.afm');
		$pdf->ezStartPageNumbers(300,10,10,'','',1);
		$pdf->ezColumnsStart(array('num'=>2,'gap'=>100));
		$pdf->ezColumnsStop() ;
		
		$header = array();
		$details = array() ;
		$all_details = array() ;
		$options = array('fontSize' => 10,
						 'showLines'=>2,
						 'showHeadings'=>1,
						 'shaded'=>0,
						 'xPos'=>'center',
						 'xOrientation'=>'center',
						 'width'=>530) ;

		$header['surname'] = '<b>Surname</b>' ;
		$header['name'] = '<b>Name</b>' ;
		$header['tel_work'] = '<b>Work Number</b>' ;
		$header['tel_home'] = '<b>Home Number</b>' ;
		$header['tel_mob'] = '<b>Mobile Number</b>' ;
	
		while ($list = mysql_fetch_row($sql_query)) {
		
			$details = array() ;
			
			$details['surname'] = $list['1'] ;
			$details['name'] = $list['0'] ;
			$details['tel_work'] = $list['3'] ;
			$details['tel_home'] = $list['4'] ;
			$details['tel_mob'] = $list['5'] ;

			array_push($all_details,$details) ;

		}
		
		$pdf->ezTable($all_details , $header , '' ,$options);
		
		$pdfcode = $pdf->output();

		$fp = fopen($fname,'w');
		fwrite($fp,$pdfcode);
		fclose($fp);

		
		return $fname;
			


	} 
	
	function makeHomegroupCSV($sql) {
	
		$sql_query = mysql_query($sql) or die(mysql_query()) ;
		
		$fname = 'file/'.time().'.csv';		
		$content = "Leader, Suburb, Group, Meeting Day, Meeting Time, Elder / Pastoral Leader\n" ;

		while ($list = mysql_fetch_row($sql_query)) {
		
			$content .= getCommunityMember($list['2'],'name')." ".getCommunityMember($list['2'],'surname') . "," ;
			$content .= getPlace($list['1'],'suburb') . "," ;
			$content .= getGroup($list['3'],'title') . "," ;
			$content .= $list['4'] . "," ;
			$content .= $list['5'] . "," ;
			$content .= getCommunityMember($list['6'],'name')." ".getCommunityMember($list['6'],'surname') ;
			$content .= "\n" ;
			
		}
		
		$fp = fopen($fname,'w');
		fwrite($fp,$content);
		fclose($fp);
		
		return $fname;

	} 
		
	function makeHomegroupPDF($sql) {
	
		include	"inc/class.ezpdf.php" ;
		
		$sql_query = mysql_query($sql) or die(mysql_query()) ;
		
		$fname = 'file/'.time().'.pdf';
		
		$pdf =& new Cezpdf();
		$pdf->selectFont('./fonts/Helvetica.afm');
		$pdf->ezStartPageNumbers(300,10,10,'','',1);
		$pdf->ezColumnsStart(array('num'=>2,'gap'=>100));
		$pdf->ezColumnsStop() ;
		
		$header = array();
		$details = array() ;
		$all_details = array() ;
		$options = array('fontSize' => 10,
						 'showLines'=>2,
						 'showHeadings'=>1,
						 'shaded'=>0,
						 'xPos'=>'center',
						 'xOrientation'=>'center',
						 'width'=>530) ;

		$header['leader'] = '<b>Leader</b>' ;
		$header['suburb'] = '<b>Suburb</b>' ;
		$header['group'] = '<b>Group</b>' ;
		$header['day'] = '<b>Meeting Day</b>' ;
		$header['time'] = '<b>Meeting Time</b>' ;
		$header['e'] = '<b>Elder / Pastoral Leader</b>' ;
		
		while ($list = mysql_fetch_row($sql_query)) {
		
			$details = array() ;
					
			$details['leader'] = getCommunityMember($list['2'],'name')." ".getCommunityMember($list['2'],'surname') ;
			$details['suburb'] = getPlace($list['1'],'suburb') ;
			$details['group'] = getGroup($list['3'],'title') ;
			$details['day'] = $list['4'] ;
			$details['time'] = $list['5'] ;
			$details['e'] = getCommunityMember($list['6'],'name')." ".getCommunityMember($list['6'],'surname') ;

			array_push($all_details,$details) ;

		}
		
		$pdf->ezTable($all_details , $header , '' ,$options);
		
		$pdfcode = $pdf->output();

		$fp = fopen($fname,'w');
		fwrite($fp,$pdfcode);
		fclose($fp);

		
		return $fname;
			


	} 
		
		
	



?>
