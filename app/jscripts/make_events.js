var row = 0 ;

function displayunicode(e,where,fieldID) {

	var unicode = e.keyCode? e.keyCode : e.charCode ;	
	
	if (unicode!=255) {
	
	if ( unicode == 37 ) {
	// do nothing
	} else if ( unicode == 38 ) {
	
		try {
			
			idB = 'row' + row ;
			getRowB = document.getElementById(idB) ;
			getRowB.style.backgroundColor = '#eeeeee' ;	
			
		} catch(e) {}
		try {
		
			row-- ;
			id = 'row' + row ;
			id_val = id+'_val' ;
			getRow = document.getElementById(id) ;
			getRow.style.backgroundColor = '#dddddd' ;	
			document.getElementById(fieldID).value = document.getElementById(id_val).value ;
			
		}catch(e) {}
		
	} else if ( unicode == 39 ) {
		
		// do nothing
		
	} else if ( unicode == 13 ) {
		
		document.getElementById('search-results').style.display = 'none';
		window.stop() ;
		
	} else if ( unicode == 40 ) {
	
		try {
		
			idB = 'row' + row ;
			getRowB = document.getElementById(idB) ;
			getRowB.style.backgroundColor = '#eeeeee' ;	
			
		}catch(e) {
		}
		
		try {
		
			row++ ;
			id = 'row' + row ;
			id_val = id+'_val' ;
			getRow = document.getElementById(id) ;
			getRow.style.backgroundColor = '#dddddd' ;	
			document.getElementById(fieldID).value = document.getElementById(id_val).value ;
			
		}catch(e) {
		
		}
		
	} else {
	
		var query = document.getElementById(fieldID).value;
		
		if ( (query == null) || (query == "")) return;
		
		if (fieldID == 'querys') {
		
			var url = "jscripts/get_value.php?val="+query+"&type="+where+"&field=" + fieldID +"&width=228";
			document.getElementById('search-results').style.left = '180px';
			
		} else {		
		
			var url = "jscripts/get_value.php?val="+query+"&type="+where+"&field=" + fieldID +"&width=177";
			document.getElementById('search-results').style.left = '0px';
			
		}
		
		xmlHttp.open("GET", url, true);
		xmlHttp.onreadystatechange = result;
		xmlHttp.send(null);
		
		row = 0 ;

	}
	
	
	
	}
	
	
}