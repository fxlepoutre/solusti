<?php

// Set localization parameters.
$available_locales = array('en'=>'en_US', 'fr'=>'fr_FR');
$default_language = 'en';
$encoding = 'UTF-8';
$domain = 'solusti.v01';

// Algorithm to set locale.
if (isset($_GET["locale"]) && in_array($_GET["locale"],$available_locales) ) {
  $locale = $_GET["locale"];
} else if (isset($_SESSION["locale"])) {
  $locale = $_SESSION["locale"];
} else if (locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
  // get locale based on response of locale_accept_from_http
  $locale = $available_locales[locale_lookup(array_keys($available_locales), locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']), false, $default_language)];
} else {
  $locale = $available_locales[$default_language];
}

// Store locale for future browsing.
$_SESSION["locale"] = $locale;

// Define language, domain and encoding for gettext
putenv("LANGUAGE=$locale");
setlocale(LC_ALL, $locale)?:setlocale(LC_ALL, $default_locale);
bindtextdomain($domain, __DIR__.'/locale');
bind_textdomain_codeset($domain, $encoding);
textdomain($domain);
header("Content-type: text/html; charset=$encoding");

?>