<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/themes/class-backend-themes.php
* File Version            : 1.0.1
* Created / Last Modified : 16 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end themes PHP class.
*/

    if (!class_exists('DOPBSPBackEndThemes')){
        class DOPBSPBackEndThemes extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndThemes(){
            }
        
            /*
             * Prints out the themes page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_themes->template();
            }
            
            /*
             * Display themes.
             */
            function display(){
                global $DOPBSP;
                
                if (function_exists('curl_init')) {
                    $json = $this->file_get_contents_curl('http://wordpressbooking.systems/api/?data=themes');
                } else {
                    $json = file_get_contents('http://wordpressbooking.systems/api/?data=themes');
                }
                
                if ($json === false){
                    echo 'error';
                }
                else{
                    $themes = json_decode($json);

                    $DOPBSP->views->backend_themes_filters->template(array('themes' => $themes));
                    echo ';;;;;;;';
                    $DOPBSP->views->backend_themes_list->template(array('themes' => $themes));
                }
                
                die();
            }
        
            function file_get_contents_curl($url){
                curl_setopt($ch=curl_init(), CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                curl_close($ch);
                return $response;
            }
        }
    }