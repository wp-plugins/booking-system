<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/extras/class-backend-extra-group-items.php
* File Version            : 1.0
* Created / Last Modified : 29 May 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end extra group items PHP class.
*/

    if (!class_exists('DOPBSPBackEndExtraGroupItems')){
        class DOPBSPBackEndExtraGroupItems extends DOPBSPBackEndExtraGroup{
            /*
             * Constructor
             */        
            function DOPBSPBackEndExtraGroupItems(){
            }
            
            /*
             * Sort extra group items.
             * 
             * @post ids (string): list of items ids in new order
             */
            function sort(){
                global $wpdb;
                global $DOPBSP;
                
                $ids = explode(',', $_POST['ids']);
                $i = 0;
                        
                foreach ($ids as $id){
                    $i++;
                    $wpdb->update($DOPBSP->tables->extras_groups_items, array('position' => $i), 
                                                                        array('id' => $id));
                }
                
                die();
            }
        }
    }