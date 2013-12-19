if (document.getElementById("rendben_gomb") != null){
   document.getElementById("rendben_gomb").addEventListener("click", function(){divdisp_off('popup')}, true);
}

if (document.getElementById("mentes_gomb") != null){
   document.getElementById("mentes_gomb").addEventListener("click", function(){
       document.form_survey.action = '?b=1';
	   document.form_survey.submit.click();
   }, true);
}

if (document.getElementById("magyar_zaszlo") != null){
   document.getElementById("magyar_zaszlo").addEventListener("click", function(){
       document.form_survey.action = '?lang=hu';
	   document.form_survey.submit.click();
   }, true);
}

if (document.getElementById("angol_zaszlo") != null){
   document.getElementById("angol_zaszlo").addEventListener("click", function(){
       document.form_survey.action = '?lang=en';
	   document.form_survey.submit.click();
   }, true);
}

if (document.getElementById("nemet_zaszlo") != null){
   document.getElementById("nemet_zaszlo").addEventListener("click", function(){
       document.form_survey.action = '?lang=de';
	   document.form_survey.submit.click();
   }, true);
}