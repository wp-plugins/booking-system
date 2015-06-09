<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/fees/class-backend-fee.php
* File Version            : 1.0.1
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end fee PHP class.
*/

    if (!class_exists('DOPBSPBackEndFee')){
        class DOPBSPBackEndFee extends DOPBSPBackEndFees{
            private $views;
            
            /*
             * Constructor
             */
            function DOPBSPBackEndFee(){
            }
            
            /*
             * Prints out the fee.
             * 
             * @post language (string): fee current editing language
             * 
             * @return fee HTML
             */
            function display(){
                global $DOPBSP;
                
                $language = $_POST['language'];
                
                $DOPBSP->views->backend_fee->template(array('language' => $language));
                
                die();
            }
            
            /*
             * Edit fee fields.
             * 
             * @post field (string): fee field
             * @post value (string): fee new value
             * @post language (string): fee selected language
             */
            function edit(){
                global $wpdb;  
                global $DOPBSP;
                
                $field = $_POST['field'];
                $value = $_POST['value'];
                $language = $_POST['language'];
                
                if ($field == 'label'){
                    $value = str_replace("\n", '<<new-line>>', $value);
                    $value = str_replace("\'", '<<single-quote>>', $value);
                    $value = utf8_encode($value);
                    
                    $fee_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->fees.' WHERE id=%d', 
                                                              1));
                    
                    $translation = json_decode($fee_data->translation);
                    $translation->$language = $value;
                    
                    $value = json_encode($translation);
                    $field = 'translation';
                }
                        
                $wpdb->update($DOPBSP->tables->fees, array($field => $value), 
                                                     array('id' =>1));
                
            	die();
            }
        }
    }