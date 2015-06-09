<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/discounts/class-backend-discount-items.php
* File Version            : 1.0
* Created / Last Modified : 04 June 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end discount items PHP class.
*/

    if (!class_exists('DOPBSPBackEndDiscountItems')){
        class DOPBSPBackEndDiscountItems extends DOPBSPBackEndDiscount{
            /*
             * Constructor
             */
            function DOPBSPBackEndDiscountItems(){
            }
            
            /*
             * Sort discount items.
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
                    $wpdb->update($DOPBSP->tables->discounts_items, array('position' => $i), 
                                                                    array('id' => $id));
                }
                
                die();
            }
        }
    }