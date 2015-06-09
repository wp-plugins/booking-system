<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/settings/class-backend-settings-notifications.php
* File Version            : 1.0.1
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end notifications settings PHP class.
*/

    if (!class_exists('DOPBSPBackEndSettingsNotifications')){
        class DOPBSPBackEndSettingsNotifications extends DOPBSPBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPBackEndSettingsNotifications(){
            }
            
            /*
             * Display notifications settings.
             * 
             * @return emails settings HTML
             */
            function display(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_settings_notifications->template();
                
                die();
            }
        }
    }