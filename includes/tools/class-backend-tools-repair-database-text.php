<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/tools/class-backend-tools-repair-database-text.php
* File Version            : 1.0
* Created / Last Modified : 12 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end repair database & text PHP class.
*/

    if (!class_exists('DOPBSPBackEndToolsRepairDatabaseText')){
        class DOPBSPBackEndToolsRepairDatabaseText extends DOPBSPBackEndTools{
            /*
             * Constructor
             */
            function DOPBSPBackEndToolsRepairDatabaseText(){
            }
            
            /*
             * Repair database & text call.
             * 
             * @post dopbsp_repair_database_text (boolean): start signal
             */
            function set(){
                echo admin_url('admin.php?page=dopbsp');
                
                die();
            }
        }
    }