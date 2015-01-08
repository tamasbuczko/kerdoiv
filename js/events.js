if (document.getElementById("email_beker_blokk") != null){
    
    if (document.getElementById('tipus_nyilt').checked == true){
        document.getElementById('email_beker_blokk').style.display = 'block';
        document.getElementById('zart_emailek_blokk').style.display = 'none';
    }
    
    document.getElementById("tipus_nyilt").addEventListener("change", function(){div_switch()}, true);
    document.getElementById("tipus_zart").addEventListener("change", function(){div_switch()}, true);
}

if (document.getElementById("gomb_ingyen_reg") != null){
   document.getElementById("gomb_ingyen_reg").addEventListener("click", function(){reg_doboz_kapcs('1')}, true); 
   document.getElementById("gomb_ezust_reg").addEventListener("click", function(){reg_doboz_kapcs('2')}, true); 
   document.getElementById("gomb_arany_reg").addEventListener("click", function(){reg_doboz_kapcs('3')}, true); 
   document.getElementById("gomb_platina_reg").addEventListener("click", function(){reg_doboz_kapcs('4')}, true);
}

if (document.getElementById("neme_kapcs") != null){
    document.getElementById("neme_kapcs").addEventListener("click", function(){display_switch('neme_doboz', this.id)}, true);
}
if (document.getElementById("eletkor_kapcs") != null){
    document.getElementById("eletkor_kapcs").addEventListener("click", function(){display_switch('eletkor_doboz', this.id)}, true);
}
if (document.getElementById("csaladiallapot_kapcs") != null){
    document.getElementById("csaladiallapot_kapcs").addEventListener("click", function(){display_switch('csaladiallapot_doboz', this.id)}, true);
}
if (document.getElementById("foglalkozas_kapcs") != null){
    document.getElementById("foglalkozas_kapcs").addEventListener("click", function(){display_switch('foglalkozas_doboz', this.id)}, true);
}
if (document.getElementById("vegzettseg_kapcs") != null){
    document.getElementById("vegzettseg_kapcs").addEventListener("click", function(){display_switch('vegzettseg_doboz', this.id)}, true);
}
if (document.getElementById("jovedelme_kapcs") != null){
    document.getElementById("jovedelme_kapcs").addEventListener("click", function(){display_switch('jovedelme_doboz', this.id)}, true);
}
if (document.getElementById("orszag_kapcs") != null){
    document.getElementById("orszag_kapcs").addEventListener("click", function(){display_switch('orszag_doboz', this.id)}, true);
}


if (document.getElementById("rendben_gomb") != null){
   document.getElementById("rendben_gomb").addEventListener("click", function(){divdisp_off('popup')}, true);
}

if (document.getElementById("nyelvkapcs") != null){
   document.getElementById("nyelvkapcs").addEventListener("change", function(){document.nyelv.submit.click();}, true);
}

if (document.getElementById("mentes_gomb") != null){
   document.getElementById("mentes_gomb").addEventListener("click", function(){
       document.form_survey.action = '?b=1';
	   document.form_survey.submit.click();
   }, true);
}

if (document.getElementById("magyar_zaszlo") != null){
   document.getElementById("magyar_zaszlo").addEventListener("click", function(){
       if (document.getElementById("p").value == 'eredmeny'){
           window.top.location.href = "?er=1&lang=hu&kerdoiv="+document.getElementById("kerdoiv").value;
       } else {
            document.form_survey.action = '?lang=hu';
	   document.form_survey.submit.click();
       }
   }, true);
}

if (document.getElementById("angol_zaszlo") != null){
   document.getElementById("angol_zaszlo").addEventListener("click", function(){
       if (document.getElementById("p").value == 'eredmeny'){
           window.top.location.href = "?er=1&lang=en&kerdoiv="+document.getElementById("kerdoiv").value;
       } else {
           document.form_survey.action = '?lang=en';
	   document.form_survey.submit.click();
       }
   }, true);
}

if (document.getElementById("nemet_zaszlo") != null){
   document.getElementById("nemet_zaszlo").addEventListener("click", function(){
       if (document.getElementById("p").value == 'eredmeny'){
           window.top.location.href = "?er=1&lang=de&kerdoiv="+document.getElementById("kerdoiv").value;
       } else {
            document.form_survey.action = '?lang=de';
	   document.form_survey.submit.click();
       }
   }, true);
}