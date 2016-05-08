<?php
//Version 3.1.1
$steamauth['apikey'] = "CF71BA273ACFD831541C18E3B10CDF54"; // Your Steam WebAPI-Key found at http://steamcommunity.com/dev/apikey
$steamauth['domainname'] = "http://ismai.fragmentized.net/~a29991/GamingAnalyst-master/index.php"; // The main URL of your website displayed in the login page
$steamauth['logoutpage'] = "http://ismai.fragmentized.net/~a29991/GamingAnalyst-master/index.php"; // Page to redirect to after a successfull logout (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
$steamauth['loginpage'] = "http://ismai.fragmentized.net/~a29991/GamingAnalyst-master/index.php"; // Page to redirect to after a successfull login (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!

// System stuff
if (empty($steamauth['apikey'])) {die("<div style='display: block; width: 100%; background-color: red; text-align: center;'>SteamAuth:<br>Please supply an API-Key!</div>");}
if (empty($steamauth['domainname'])) {$steamauth['domainname'] = $_SERVER['SERVER_NAME'];}
if (empty($steamauth['logoutpage'])) {$steamauth['logoutpage'] = $_SERVER['PHP_SELF'];}
if (empty($steamauth['loginpage'])) {$steamauth['loginpage'] = $_SERVER['PHP_SELF'];}
?>
