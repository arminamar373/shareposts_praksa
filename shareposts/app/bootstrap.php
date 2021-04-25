<?php
//ucitavamo config
require_once 'config/config.php';

// ucitavamo biblioteke
/*require_once 'libraries/Controller.php';
require_once 'libraries/Core.php';
require_once 'libraries/Database.php'; */

// ucitavamo helpere
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
// autolodaer core libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php' ;
});
?>
