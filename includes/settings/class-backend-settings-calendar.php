<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/settings/class-backend-settings-calendar.php
* File Version            : 1.0.1
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendar settings PHP class.
*/

    if (!class_exists('DOPBSPBackEndSettingsCalendar')){
        class DOPBSPBackEndSettingsCalendar extends DOPBSPBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPBackEndSettingsCalendar(){
            }
            
            /*
             * Display calendar settings.
             * 
             * 
             * @return calendar settings HTML
             */
            function display(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_settings_calendar->template();
                
                die();
            }
        }
    }