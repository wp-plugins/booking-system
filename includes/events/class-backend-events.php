<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/events/class-backend-events.php
* File Version            : 1.0
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end events PHP class.
*/

    if (!class_exists('DOPBSPBackEndEvents')){
        class DOPBSPBackEndEvents extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndEvents(){
            }
        
            /*
             * Prints out the events page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_events->template();
            }
        }
    }