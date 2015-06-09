<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/staff/class-backend-staff.php
* File Version            : 1.0
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end staff PHP class.
*/

    if (!class_exists('DOPBSPBackEndStaff')){
        class DOPBSPBackEndStaff extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndStaff(){
            }
        
            /*
             * Prints out the staff page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_staff->template();
            }
        }
    }