<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/events/class-backend-reviews.php
* File Version            : 1.0
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reviews PHP class.
*/

    if (!class_exists('DOPBSPBackEndReviews')){
        class DOPBSPBackEndReviews extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndReviews(){
            }
        
            /*
             * Prints out the reviews page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_reviews->template();
            }
        }
    }