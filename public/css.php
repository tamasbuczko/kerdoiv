<?php
if ($_REQUEST['css'] == ''){
	$css = 'style1x.css';
	if ($_SESSION["css"] != ""){$css = $_SESSION["css"];}}
else {
	$css = $_REQUEST['css'];
	$_SESSION["css"] = $css;}
	
If ($_REQUEST['cssx'] != ""){
	$css_valaszto =	
	'<form id="change_css" name="change_css" action="" method="post">
	   <input type="submit" value="ok" />
			<select name="css">
				<option selected="selected" value="'.$css.'">'.$css.'</option>
				<option value="style1.css">style1.css</option>
                                <option value="style1x.css">style1x.css</option>
				<option value="style2.css">style2.css</option>
                                <option value="style3.css">style3.css</option>
                                <option value="style4.css">style4.css</option>
                                <option value="style5.css">style5.css</option>
                                <option value="style6.css">style6.css</option>
			</select>
		</form>';}

if ($kerdoiv_css){
   $css = 'surveys_css/'.$kerdoiv_css;
}