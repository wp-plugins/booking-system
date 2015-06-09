<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/forms/class-backend-form-fields.php
* File Version            : 1.0
* Created / Last Modified : 29 May 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end form fields PHP class.
*/

    if (!class_exists('DOPBSPBackEndFormFields')){
        class DOPBSPBackEndFormFields extends DOPBSPBackEndForm{
            /*
             * Constructor
             */
            function DOPBSPBackEndFormFields(){
            }
            
            /*
             * Sort form fields.
             * 
             * @post ids (string): list of fields ids in new order
             */
            function sort(){
                global $wpdb;
                global $DOPBSP;
                
                $ids = explode(',', $_POST['ids']);
                $i = 0;
                
                foreach ($ids as $id){
                    $i++;
                    $wpdb->update($DOPBSP->tables->forms_fields, array('position' => $i), 
                                                                 array('id' => $id));
                }
                
                die();
            }
        }
    }