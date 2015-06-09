<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/discounts/class-backend-discount.php
* File Version            : 1.0.1
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end discount PHP class.
*/

    if (!class_exists('DOPBSPBackEndDiscount')){
        class DOPBSPBackEndDiscount extends DOPBSPBackEndDiscounts{
            /*
             * Constructor
             */
            function DOPBSPBackEndDiscount(){
            }
            
            /*
             * Prints out the discount.
             * 
             * @post id (integer): discount ID
             * @post language (string): discount current editing language
             * 
             * @return discount HTML
             */
            function display(){
                global $DOPBSP;
                
                $language = $_POST['language'];
                
                $DOPBSP->views->backend_discount->template(array('id' => 1,
                                                                 'language' => $language));
                $DOPBSP->views->backend_discount_items->template(array('id' => 1,
                                                                        'language' => $language));
                
                die();
            }
            
            /*
             * Edit discount fields.
             * 
             * @post id (integer): discount ID
             * @post field (string): discount field
             * @post value (string): item new value
             */
            function edit(){
                global $wpdb; 
                global $DOPBSP; 
                
                $wpdb->update($DOPBSP->tables->discounts, array($_POST['field'] => $_POST['value']), 
                                                          array('id' => 1));
                
            	die();
            }
        }
    }