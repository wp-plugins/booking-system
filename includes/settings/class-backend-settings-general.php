<?php

/*
* Title                   : Booking System Pro (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/settings/class-backend-settings-general.php
* File Version            : 1.0
* Created / Last Modified : 29 April 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System PRO back end general settings PHP class.
*/

    if (!class_exists('DOPBSPBackEndSettingsGeneral')){
        class DOPBSPBackEndSettingsGeneral extends DOPBSPBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPBackEndSettingsGeneral(){
            }
        
            /*
             * Prints out the general settings page.
             * 
             * @post id (integer): calendar ID
             * 
             * @return general settings HTML
             */
            function display(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_settings_general->template(array());
                
                die();
            }
        }
    }