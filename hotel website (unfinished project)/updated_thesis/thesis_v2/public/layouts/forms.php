<?php 
function displayReservation(){
}
function displayFormHome(){
	echo "The quick brown fox jumps over the lazy.";
}
function displayFormGallery(){
}
function displayFormServices(){
	echo "Gallery for Services";
}
function displayFormContactUs(){
	echo "Gallery for Contact Us";
}
function displayFormAboutUs(){
	echo "Gallery for About Us";
}
function displayRow($left,$right){
	$r = '';
	$r .= '<tr>' . $left . '</td>';
	$r .= '<tr>' . $right . '</td>';
	$r .= '<tr>';
	return $r;
}
//forms in reservation
function displayForm(){
	$r = '';
	$r .= '<table>';
	$r .= displayRow('<label for="#ofguests">Guests per room:</label>','<select name="#ofguests">
																		<option>Select One</option>
																		<option value="1">1</option>
																		<option value="2">2</option>
    																	</select>');
    $r .= '</br>';
	$r .= displayRow('<label for="#ofrooms">No. of Rooms:</label>','<select name="#ofrooms">
																	<option>Select One</option>
																	<option>1</option>
    																</select>');
	$r .='</table>';
	return $r;						
}


