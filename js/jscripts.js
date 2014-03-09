function divdisp_on(id){
    if (document.getElementById(id) != null){
      document.getElementById(id).style.display = 'block';
    }
}

function divdisp_off(id){	
    if (document.getElementById(id) != null){
      document.getElementById(id).style.display = 'none';
    }	
}

function megerosites_x(torolszam, formnev, kerdes) {
	if (formnev == "valasz") {
		var answer = confirm ("A VÁLASZ TÖRLÉSÉT választotta.\n Biztosan törölni szeretné?");
		if (answer) { window.location="?p=ujkerdes&id="+kerdes+"&torles="+torolszam;}
	}
 }
 
 function nyelv_kapcs(id){
     
     if (document.getElementById(id).style.opacity == '0.5'){
        document.getElementById(id).style.opacity="1";
        document.getElementById('cim_'+id).style.display = 'block';
        document.getElementById('leiras_'+id).style.display = 'block';
     } else {
        document.getElementById(id).style.opacity="0.5"; 
        document.getElementById('cim_'+id).style.display = 'none';
        document.getElementById('leiras_'+id).style.display = 'none';
     }
 }