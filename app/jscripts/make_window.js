	function result() {
	
		if (xmlHttp.readyState == 4) {
		  
			var response = xmlHttp.responseText;
			
			var win = document.getElementById("search-results") ;
				
			win.style.display = 'inline';
			win.style.width = '300px';
			win.style.position = 'relative' ;
			win.style.backgroundColor = '#eeeeee';
			win.style.border = 'solid 0px #aaaaaa';
			win.style.padding = '0px';
			win.innerHTML = response ;

		}
	  
	}

	