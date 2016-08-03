<?php
session_start();

// Set parameters.
$default_locale = 'fr_FR';
$encoding = 'UTF-8';
$domain = 'solusti.v01';

// Algorithm to set locale.
if (isset($_GET["locale"])) {
    $locale = $_GET["locale"];
} else if (isset($_SESSION["locale"])) {
    $locale  = $_SESSION["locale"];
} else {
    $locale = $default_locale;
}
$_SESSION["locale"] = $locale;

/* For future use:
$locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']); 
//*/


// Define language domain and encoding for gettext
putenv("LANGUAGE=$locale");
setlocale(LC_ALL, $locale)?:setlocale(LC_ALL, $default_locale);
bindtextdomain($domain, __DIR__.'/locale');
bind_textdomain_codeset($domain, $encoding);
textdomain($domain);
header("Content-type: text/html; charset=$encoding");

?>