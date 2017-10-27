<?php

    /**
     * config.php
     *
     * Configures app.
     */
   
    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require_once("helpers.php");

    // database credentials
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBNAME','makemybot');
    
    // enable sessions
    session_start();

?>
