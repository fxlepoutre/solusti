<?php

// Set localization parameters.
$available_locales = array('en'=>'en_US', 'fr'=>'fr_FR');
$default_language = 'en';
$encoding = 'UTF-8';
$domain = 'solusti.v02';

// Algorithm to set locale and redirect to the proper locale.
if (isset($_GET["lang"]) && in_array($_GET["lang"],array_keys($available_locales)) ) {
  $locale = $available_locales[$_GET["lang"]];
  $_SESSION['lang'] = $_GET["lang"];
} else {
  if(isset($_SESSION['lang']) && in_array($_SESSION["lang"],array_keys($available_locales))) {
    // Get locale based on session.
    header('HTTP/1.0 301 Moved Permanently', false, 301);      
    header('Location: /'.$_SESSION['lang'].'/');
    exit(); 
  } elseif (locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    // get locale based on response of locale_accept_from_http and redirect
    $requested_language = locale_lookup(array_keys($available_locales), locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']), false, $default_language);
    header('HTTP/1.0 301 Moved Permanently', false, 301);      
    header("Location: /$requested_language/");
    exit(); 
  } else {
    // Redirect to default language
    header('HTTP/1.0 301 Moved Permanently', false, 301);
    header("Location: /$default_language/");
    exit();  
  }
}

// Define language, domain and encoding for gettext
putenv("LANGUAGE=$locale");
setlocale(LC_ALL, $locale)?:setlocale(LC_ALL, $default_locale);
bindtextdomain($domain, __DIR__.'/locale');
bind_textdomain_codeset($domain, $encoding);
textdomain($domain);
header("Content-type: text/html; charset=$encoding");

?>