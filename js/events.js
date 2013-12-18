if (document.getElementById("rendben_gomb") != null){
   document.getElementById("rendben_gomb").addEventListener("click", function(){divdisp_off('popup')}, true);
}

if (document.getElementById("mentes_gomb") != null){
   document.getElementById("mentes_gomb").addEventListener("click", function(){divdisp_off('popup')}, true);
   document.getElementById("mentes_gomb").addEventListener("click", function(){
       document.form_survey.action = '?b=1';
   }, true);
}