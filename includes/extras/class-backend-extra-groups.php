<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/extras/class-backend-extra-groups.php
* File Version            : 1.0
* Created / Last Modified : 29 May 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end extra groups PHP class.
*/

    if (!class_exists('DOPBSPBackEndExtraGroups')){
        class DOPBSPBackEndExtraGroups extends DOPBSPBackEndExtra{
            /*
             * Constructor
             */
            function DOPBSPBackEndExtraGroups(){
            }
            
            /*
             * Sort extra groups.
             * 
             * @post ids (string): list of groups ids in new order
             */
            function sort(){
                global $wpdb;
                global $DOPBSP;
                
                $ids = explode(',', $_POST['ids']);
                $i = 0;
                
                foreach ($ids as $id){
                    $i++;
                    $wpdb->update($DOPBSP->tables->extras_groups, array('position' => $i), 
                                                                  array('id' => $id));
                }
                
                die();
            }
        }
    }