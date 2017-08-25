function popup(page,x,y) {
	window.open(page,'','resizable=no,menubar=no,toolbar=no,location=no,scrollbars=yes,width=' + x + ',height=' + y + '');
}
	
function confirmDelete(delUrl) {
	if (confirm("Are you sure you want to delete ?")) {
		document.location = delUrl;
	} else {
		document.location = document.location ;
	}
	document.getElementById("memberDelete").style.display = 'none' ;
}


function hideWindow() {
	document.getElementById("memberDelete").style.display = 'none' ;
}

function showWindow(delUrl) {
	document.getElementById("memberDelete").style.display = '' ;
	document.getElementById("deleteLink").href = 'javascript:confirmDelete(\'' + delUrl + '\')' ;
	document.getElementById("tagLink").href  = 'javascript:confirmDelete(\'' + delUrl + '&type=tag\')' ;
}

function deleteMember(delUrl) {
	
}

function doChange(id) {
	
	var variable = id + "_id" ;
	var variableone = id + "_action" ;
	var selectField = document.getElementById(variable).value ;
	
	if (selectField == "add") {
		document.getElementById(variableone).value = "add" ;
	}

}

function calc_check() {

	if (document.getElementById("member").checked == true) {
		document.getElementById("memdate_details").style.display = '' ;
	} else {
		document.getElementById("memdate_details").style.display = 'none' ;
	}
}

function loadSubMenu(section) {
	switch(section) {
		case "main":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td align=center width=160><a href=community.add.php id=navtable1>Add Member</a><td id=navtable1 align=center width=160><a href=members.php id=navtable1>View Community List</a><td id=navtable1 align=center width=160><a href='search.php?type=members' id=navtable1>Search</a><td id=navtable1 align=center width=0><a href='community.import.php' id=navtable1>Import</a>	<td id=navtable1 align=center width=120><a href='images.php' id=navtable1>Images</a></table>" ;
		break ;
		case "homegroups":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td align=center width=160><a href=homegroup.add.php id=navtable1>Add Homegroup</a><td id=navtable1 align=center width=160><a href=homegroups.php id=navtable1>View Homegroups</a><td id=navtable1 align=center width=160><a href='search_homegroups.php' id=navtable1>Search</a></table>"
		break ;
		case "news":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td id=navtable1 align=right width=205>Welcome to NCF Church.</table>" ;
		break ;
		case "events":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td id=navtable1 align=right width=205>Welcome to NCF Church.</table>" ;
		break ;
		case "search":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td id=navtable1 align=right width=205>Welcome to NCF Church.</table>" ;
		break ;
		case "import":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td id=navtable1 align=right width=205>Welcome to NCF Church.</table>" ;
		break ;
		case "none":
			document.getElementById("submenu").innerHTML = "<table border=0 cellspacing=0 cellpadding=0 bgcolor=#91b8e1><tr><td id=navtable1 align=right width=205>Welcome to NCF Church.</table>" ;
		break ;
	}
}

function putID(ivalue,avalue) {
	document.getElementById('id').value = ivalue ;	
	document.getElementById('action').value = avalue ;	
}