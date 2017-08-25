<?
	

	$file = $_GET['image']; 
	$size = $_GET['x']; 
	
	header('Content-type: image/jpeg'); 

	list($width, $height) = getimagesize($file); 
	
	$srcImg = imagecreatefromjpeg($file);
	$origWidth = imagesx($srcImg);
	$origHeight = imagesy($srcImg);
	$ratio = $origWidth / $size;
	$y = $origHeight / $ratio;
	
	
	$modwidth = $size; 
	$modheight = $y ; 
	
	$tn= imagecreatetruecolor($modwidth, $modheight); 
	$source = imagecreatefromjpeg($file); 
	imagecopyresized($tn, $source, 0, 0, 0, 0, $modwidth, $modheight, $width, $height); 

	imagejpeg($tn); 
?> 