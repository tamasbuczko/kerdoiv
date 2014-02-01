<?php
if ($_REQUEST['css'] == ''){
	$css = 'style.css';
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
				<option value="style.css">style.css</option>
				<option value="style2.css">style2.css</option>
			</select>
		</form>';}
?>