<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/class-backend-pro.php
* File Version            : 1.0.8
* Created / Last Modified : 05 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end pro PHP class.
*/

    if (!class_exists('DOPBSPBackEndPRO')){
        class DOPBSPBackEndPRO extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndPRO(){
            }
        
            /*
             * Prints out the pro page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_pro->template();
            }
        }
    }