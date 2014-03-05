var gridster;

$(function(){

   var log = document.getElementById('log');

   gridster = $(".gridster ul").gridster({
          widget_base_dimensions: [10, 10],
          widget_margins: [1, 1],
          autogrow_cols: false,
		  autogrow_rows: false,
		  
          resize: {
            enabled: false
          }
        }).data('gridster');


});

	  
function csempe(id){
   var div = document.getElementById("csempek");
   var i;
   var x_id;
   for (i=0;i<div.childNodes.length;i++)
   {
   //alert(div.childNodes[i].id);
   x_id = div.childNodes[i].id;
   //alert (x_id);
   if (x_id > 0){
	  document.getElementById(x_id).style.border="0px solid #0000FF";
   }
   }
   
   
		 document.getElementById('csempe_id').value = id;
		 document.getElementById(id).style.border="1px solid #0000FF";
		 
		 
		 
}

function csere(mire){
   var csempe;
   csempe = document.getElementById('csempe_id').value;
   document.getElementById(csempe).innerHTML = '<img src="tile/'+mire+'.jpg" alt="" />';
   
}