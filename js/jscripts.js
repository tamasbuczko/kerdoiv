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
        
    if (formnev == "kerdes") {
		var answer = confirm ("A KÉRDÉS TÖRLÉSÉT választotta.\n Biztosan törölni szeretné?");
		if (answer) { window.location="?p=ujkerdes&id="+torolszam+"&kerdestorles=1";}
	}
        
    if (formnev == "kerdes_kep") {
		var answer = confirm ("A KÉP TÖRLÉSÉT választotta.\n Biztosan törölni szeretné?");
		if (answer) { window.location="?p=ujkerdes&id="+torolszam+"&kerdeskeptorles=1";}
	}
        
    if (formnev == "fejlec_kep") {
		var answer = confirm ("A KÉP TÖRLÉSÉT választotta.\n Biztosan törölni szeretné?");
		if (answer) { window.location="?p=ujkerdoiv&id="+torolszam+"&fejleckeptorles=1";}
	}
	
	if (formnev == "valasz_kep") {
		var answer = confirm ("A KÉP TÖRLÉSÉT választotta.\n Biztosan törölni szeretné?");
		if (answer) { window.location="?p=ujkerdes&id="+kerdes+"&valaszkeptorles="+torolszam;}
	}
 }
 
 function nyelv_kapcs(id){
     
     if (document.getElementById(id).style.opacity == '0.5'){
        document.getElementById(id).style.opacity="1";
        if (document.getElementById('cim_'+id) != null){
            document.getElementById('cim_'+id).style.display = 'block';
            document.getElementById('leiras_'+id).style.display = 'block';
            document.getElementById('zaras_'+id).style.display = 'block';
        }
        if (document.getElementById('kerdes_'+id) != null){
            
            if (document.getElementById('kerdes_'+id) != null){
                var all = document.getElementsByClassName(id+'_k');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.display = 'block';
                }
            }
        }
     } else {
        document.getElementById(id).style.opacity="0.5"; 
        if (document.getElementById('cim_'+id) != null){
            document.getElementById('cim_'+id).style.display = 'none';
            document.getElementById('leiras_'+id).style.display = 'none';
            document.getElementById('zaras_'+id).style.display = 'none';
        }
        if (document.getElementById('kerdes_'+id) != null){
            var all = document.getElementsByClassName(id+'_k');
            for (var i = 0; i < all.length; i++) {
              all[i].style.display = 'none';
            }
        }
     }
	 //var element = document.getElementsByName('v');
	 //$( element ).attr( "data-sizey", "3" );
	 //$( element ).attr( "style", "height: 26px;" );
 }
 
 function control_box(){
	jQuery("#headline_img").load(function(){
	var getheight= $('#headline_img').height();
	//$('#control_box').marginTop(getheight);
	$("#control_box").css("margin-top", "-"+getheight+"px");
 });
 }