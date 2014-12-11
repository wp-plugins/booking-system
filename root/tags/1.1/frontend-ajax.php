<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : frontend-ajax.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Front End AJAX.
*/

    define("DOING_AJAX", true);

    require_once("../../../wp-load.php"); // Add wp-load.php file.
    
    if(!isset($_REQUEST["action"]) || trim($_REQUEST["action"])==""){
        die("-1");
    }

    @header("Content-Type: text/html; charset=".get_option("blog_charset"));

    include_once('dopbs.php'); // Including your plugin’s main file where ajax actions are defined.
    send_nosniff_header();
    
    if (has_action("wp_ajax_".$_REQUEST["action"])){
        do_action("wp_ajax_".$_REQUEST["action"]);
        exit;
    }
    status_header(404);

?>