<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/addons/class-backend-addons.php
* File Version            : 1.0.1
* Created / Last Modified : 16 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end addons PHP class.
*/

    if (!class_exists('DOPBSPBackEndAddons')){
        class DOPBSPBackEndAddons extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndAddons(){
            }
        
            /*
             * Prints out the addons page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_addons->template();
            }
            
            /*
             * Display addons.
             */
            function display(){
                global $DOPBSP;
                
                $json = file_get_contents('http://wordpressbooking.systems/api/?data=addons');
                
                if ($json === false){
                    echo 'error';
                }
                else{
                    $addons = json_decode($json);

                    $DOPBSP->views->backend_addons_filters->template(array('addons' => $addons));
                    echo ';;;;;;;';
                    $DOPBSP->views->backend_addons_list->template(array('addons' => $addons));
                }
                
                die();
            }
        }
    }