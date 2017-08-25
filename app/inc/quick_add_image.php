<?

	include "top_popup.php" ;
	

	print("<table width=100% cellspacing=1 cellpadding=15 bgcolor=#bbbbbb>");

	print("<tr><td bgcolor=#f7f7f7>");	
	print("<b>Add Image</b><br><br>");
	
	print("<table width=100% height=200 cellspacing=1 cellpadding=20 bgcolor=#bbbbbb>");
	print("<tr bgcolor=#f3f3f3><td>");
	
	if (!isset($_POST['title'])) {
	
		print("<form action=quick_add_image.php method=POST enctype='multipart/form-data'>");
		print("<input type='text' name='title' class=field size=30 value=''> ( Title )<Br><br>");
		print("<input type='hidden' name='id' value='".$_GET['id']."'>");
		print("<input type=file size=30 name=image class=field><br><br>");
		print("<input type=submit value='Add Image Now' class=field></p>");
		print("</form>");
		
	} else {
	
		$file_count = 0 ; 
		
		$folder = "../bank" ;
		
		if ( !is_dir($folder) ) {
			mkdir($folder, 0777) ;
		}

		$f_arr = array() ;
		
		if ($handle = opendir($folder)) {
		
			while (false != ($file = readdir($handle))) { 
			
				if (($file != "Thumbs.db")&&($file != ".")&&($file != "..")) {
					$type = explode(".",$file) ;
					$f_arr[] = $type['0'] ;			
				}
				
			}
			
		}
		
		sort($f_arr,SORT_NUMERIC) ;
		$place = sizeof($f_arr)-1 ;
		$file_count = $f_arr[$place] ;
	

		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
	
			$type = explode(".",$_FILES['image']['name']) ;
			
			if ((strtolower($type['1']) == "jpeg") || (strtolower($type['1']) == "jpg") || (strtolower($type['1']) == "gif") || (strtolower($type['1']) == "png")) {
			
					$file_count++ ;
					$file_name = $file_count.".".$type['1'] ;
					
					if (copy($_FILES['image']['tmp_name'], $folder.'/'.$file_name)) {
					
						$file = $folder."/".$file_name ;
						
						$title = $_POST['title'] ;
						$id = $_POST['id'] ;
						
						addImage("bank/".$file_name,$title,$id) ;
						
					} else {
					
						print("<script>alert('Sorry, error in uploading image.');window.close();</script>");
						
					}
					
			} else {
			
				print("<script>alert('Sorry, please select valid image file.');window.close();</script>");
				
			}
		
		} else {
		
			print("<script>alert('Sorry, error in uploading image. Check file size.');window.close();</script>");
			
		}
	
	
	}

	// displaying main user box

	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<table width=100% cellspacing=0 cellpadding=5 bgcolor=#f1f1f1>");
	print("<tr><td align=center valign=top>".$list['0']);
	
	// end of main table

	print("</table>");
	print("</center>");
	print("</table>");
	
	
	
	include "bottom_popup.php" ;

?>
