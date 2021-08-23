<?php
////////////////////////////////////////////////
// Developed by Muhammad Al-Jilani    //
// Email: admin@aljup.com                 //
// Release Date: 2021/08/20               //
// Version: 1.0                                   //
///////////////////////////////////////////////

// Api
// $api = TEST-SUFXFOQDEWFZZWEHQQG ;
// In case you change the provider and the api asks you to use the variable {$api}

// Pull data //
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$details = json_decode(file_get_contents("http://ipwhois.app/json/{$ip}?lang=ar"));

?>