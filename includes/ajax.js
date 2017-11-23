function createAjax(){
  if(window.ActiveXObject){
    try{
      return new ActiveXobject("Microsoft.XMLHTTP");
    }catch(e){
      return new ActiveXObject("Msxml2.XMLHTTP");
    }
  }
  else if(window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
}

var xmlhttp = createAjax();
function send Request(halaman, parameter, konten, komponen){
  var con = window.document.getElementById(konten);
  if(xmlhttp.readyState==4 || xmlhttp.readyState==0){
		xmlhttp.open('POST', halaman, true);
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				if(komponen=='div') obj.innerHTML=parseScript(xmlhttp.responseText);
				else obj.value=parseScript(xmlhttp.responseText);
			}
		}
		xmlhttp.send(parameter);
	}
}
