<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/discounts/class-backend-discount-item-rules.php
* File Version            : 1.0
* Created / Last Modified : 29 May 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end discount item rules PHP class.
*/

    if (!class_exists('DOPBSPBackEndDiscountItemRules')){
        class DOPBSPBackEndDiscountItemRules extends DOPBSPBackEndDiscountItem{
            /*
             * Constructor
             */        
            function DOPBSPBackEndDiscountItemRules(){
            }
            
            /*
             * Sort discount item rules.
             * 
             * @post ids (string): list of rules ids in new order
             */
            function sort(){
                global $wpdb;
                global $DOPBSP;
                
                $ids = explode(',', $_POST['ids']);
                $i = 0;
                        
                foreach ($ids as $id){
                    $i++;
                    $wpdb->update($DOPBSP->tables->discounts_items_rules, array('position' => $i), 
                                                                          array('id' => $id));
                }
                
                die();
            }
        }
    }