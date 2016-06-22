var xmlHttp = createXmlHttpRequestObject();



function createXmlHttpRequestObject(){
	var xmlHttp;


	if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}else{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	return xmlHttp;
}

function process(str){
	if(xmlHttp){
		try{
			xmlHttp.open("GET","http://localhost/miniproject/checkusername.php?s=" + str,true);
			xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState==4){
			if(xmlHttp.status==200){
			try{
			text = xmlHttp.responseText;

			display = document.getElementById('display');
			if(text=="no"){

				display.className="glyphicon glyphicon-ok"
				display.innerHTML=" Username is Available :)"
			}
			else{
				display.className="glyphicon glyphicon-remove"
				display.innerHTML=" Username is Not Available :("
			}


		}

		catch(e){
			alert(e.toString());
		}
		}else{
			alert(xmlHttp.statusText);
		}
	}

}
;
			xmlHttp.send(null);
		}

		catch(e){
			alert(e.toString());
		}
	}
}
function thephotothing(str){
	if(xmlHttp){
		try{

			xmlHttp.open("GET","http://localhost/miniproject/checkphoto.php?s=" + str,true);
			xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState==4){
			if(xmlHttp.status==200){
			try{
			text = xmlHttp.responseText;

			display = document.getElementById('profilepic');
			if(text!="NULL"){
				display.setAttribute('src',text);
			}




		}

		catch(e){
			alert(e.toString());
		}
		}else{
			alert(xmlHttp.statusText);
		}
	}

}
;
			xmlHttp.send(null);
		}

		catch(e){
			alert(e.toString());
		}
	}
}
function search(str){
	if(xmlHttp){
		try{
			alert(str);
			xmlHttp.open("GET","http://localhost/miniproject/search.php?s=" +str,true);
			xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState==4){
			if(xmlHttp.status==200){
			try{
			text = xmlHttp.responseText;

			display = document.getElementById('modal-body');
			if(text!="NULL"){
				alert(text);
				display.innerHTML+=text;
			}




		}

		catch(e){
			alert(e.toString());
		}
		}else{
			alert(xmlHttp.statusText);
		}
	}

}
;
			xmlHttp.send(null);
		}

		catch(e){
			alert(e.toString());
		}
	}
}




function livesearch(str){
	if(xmlHttp){
		try{
			alert(str);
			xmlHttp.open("GET","http://localhost/miniproject/search.php?s=" +str,true);
			xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState==4){
			if(xmlHttp.status==200){
			try{
			text = xmlHttp.responseText;

			display = document.getElementById('search-output');
			if(text!="NULL"){
				alert(text);
				display.innerHTML+=text;
			}




		}

		catch(e){
			alert(e.toString());
		}
		}else{
			alert(xmlHttp.statusText);
		}
	}

}
;
			xmlHttp.send(null);
		}

		catch(e){
			alert(e.toString());
		}
	}
}
