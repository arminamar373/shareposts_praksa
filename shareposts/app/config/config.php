<?php
// konstante za bazu podataka
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'shareposts');
// app root
define('APPROOT', dirname(dirname(__FILE__)));  // dirname sluzi za micanje zadnje stavke u magicnoj konstanti ___FILE__ dok define sluzi za odredjivanje konstante

// URL root
define('URLROOT', 'http://localhost/shareposts');

// ime sajta
define('SITENAME','SharePosts');

// verzija aplikacije
define('APPVERSION', '1.0.0');
?>