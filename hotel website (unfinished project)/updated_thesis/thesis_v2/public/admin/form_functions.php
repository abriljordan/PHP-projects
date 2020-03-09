<?php
require_once('../../includes/initialize.php');
function displayQuickoverview(){
 $r = '<b>Overview</b>';
 return $r;
}
function displayReservation(){
 $r = '<b>Reservation</b>';
 return $r;
}
function displayAbout(){
 $r = '<b>About</b>';
 return $r;
}
function displayCancelledReservationList(){
 $r = '<b>Cancelled Reservations</b>';
 return $r;
}
function displayUserManagement(){
include_layout_template('usermanagement.php');
//echo "hello";
}
?>