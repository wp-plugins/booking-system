<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/forms/class-backend-form-field-select-options.php
* File Version            : 1.0
* Created / Last Modified : 29 May 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end form field select options PHP class.
*/

    if (!class_exists('DOPBSPBackEndFormFieldSelectOptions')){
        class DOPBSPBackEndFormFieldSelectOptions extends DOPBSPBackEndFormField{
            /*
             * Constructor
             */        
            function DOPBSPBackEndFormFieldSelectOptions(){
            }
            
            /*
             * Sort form field select options.
             * 
             * @post positions (string): list of options ids in new order
             */
            function sort(){
                global $wpdb;
                global $DOPBSP;
                
                $ids = explode(',', $_POST['ids']);
                $i = 0;
                        
                foreach ($ids as $id){
                    $i++;
                    $wpdb->update($DOPBSP->tables->forms_fields_options, array('position' => $i), 
                                                                         array('id' => $id));
                }
                
                die();
            }
        }
    }