<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/tools/class-backend-tools.php
* File Version            : 1.0
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end tools PHP class.
*/

    if (!class_exists('DOPBSPBackEndTools')){
        class DOPBSPBackEndTools extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndTools(){
            }
        
            /*
             * Prints out the tools page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_tools->template();
            }
        }
    }