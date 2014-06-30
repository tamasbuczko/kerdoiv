function kepfigyel(){
   //alert('ok');
}

function kerdes_sorrend_ment(id){
   //document.getElementById('form_survey').action = '?p=kerdoiv&mod=1&kerdoiv=11&sorrend=1';
   document.getElementById('form_survey').action = '';
   document.getElementById('sorrendezes').value = id;
   document.forms["form_survey"].submit();
}

function lapvege(){
    $('body').scrollTo('#end');
}

function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},1000);
}

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
 
 function del_text(id){
     //if (document.getElementById(id).value == 'Az új kérdőív címe'){
        //document.getElementById(id).value = '';
     //}
 }
 
 function display_switch(id, id2){
     //document.getElementById('neme_doboz').style.display = 'none';
     //document.getElementById('eletkor_doboz').style.display = 'none';
     //document.getElementById('jovedelme_doboz').style.display = 'none';
   if (document.getElementById(id).style.display == 'block'){
    document.getElementById(id).style.display = 'none';
    $('#'+id2).css('background-image', 'url(graphics/le.png)');
   } else {
    document.getElementById(id).style.display = 'block';
    $('#'+id2).css('background-image', 'url(graphics/fel.png)');
    }
}

function valasz_ful(id, valasz){
   //document.getElementById('a_vf_sz_'+valasz).style.display = 'none';
   //document.getElementById('a_vf_k_'+valasz).style.display = 'none';
   //document.getElementById('a_vf_v_'+valasz).style.display = 'none';
   
   document.getElementById('a_vl_sz_'+valasz).style.display = 'none';
   document.getElementById('a_vl_k_'+valasz).style.display = 'none';
   document.getElementById('a_vl_v_'+valasz).style.display = 'none';
   document.getElementById('a_vf_sz_'+valasz).style.backgroundImage="url('graphics/bg_v_ful.jpg')";
   document.getElementById('a_vf_k_'+valasz).style.backgroundImage="url('graphics/bg_v_ful.jpg')";
   document.getElementById('a_vf_v_'+valasz).style.backgroundImage="url('graphics/bg_v_ful.jpg')";
   
   document.getElementById('a_vl_'+id+'_'+valasz).style.display = 'block';
   document.getElementById('a_vf_'+id+'_'+valasz).style.backgroundImage="none";
}



function sugo(szoveg, id){
	showSugo(szoveg);	
	document.onmousemove = getCursorXY;	
	document.getElementById('sugo_popup').style.display = 'block';
        
        $( "#"+id ).mouseout(function() {
            sugo_ki();
        });
}


function getCursorXY(e){
	x = (window.Event) ? e.pageX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
	y = (window.Event) ? e.pageY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
	document.getElementById('sugo_popup').style.left = (x-70) + 'px';
	document.getElementById('sugo_popup').style.top = (y+30) + 'px';
}

function sugo_ki(){
	document.getElementById('sugo_popup').style.display = 'none';
}

function showSugo(id){
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();}
		else {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			   document.getElementById("np_p").innerHTML= xmlhttp.responseText;  //külső php file eredményének beírása az np_p divbe
			}
		  }
		xmlhttp.open("GET","sugo.php?id="+id,true);  //külső php fájl meghívása
		xmlhttp.send();
}