<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/addons/class-backend-amenities.php
* File Version            : 1.0
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end amenities PHP class.
*/

    if (!class_exists('DOPBSPBackEndAmenities')){
        class DOPBSPBackEndAmenities extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndAmenities(){
            }
        
            /*
             * Prints out the amenities page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_amenities->template();
            }
        }
    }