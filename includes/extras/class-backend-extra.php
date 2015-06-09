<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/extras/class-backend-extra.php
* File Version            : 1.0.2
* Created / Last Modified : 02 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end extra PHP class.
*/

    if (!class_exists('DOPBSPBackEndExtra')){
        class DOPBSPBackEndExtra extends DOPBSPBackEndExtras{
            /*
             * Constructor
             */
            function DOPBSPBackEndExtra(){
            }
            
            /*
             * Prints out the extra.
             * 
             * @post language (string): extra current editing language
             * 
             * @return extra HTML
             */
            function display(){
                global $DOPBSP;
                
                $language = $_POST['language'];
                
                $DOPBSP->views->backend_extra->template(array('language' => $language));
                $DOPBSP->views->backend_extra_groups->template(array('language' => $language));
                
                die();
            }
            
            /*
             * Edit extra fields.
             * 
             * @post field (string): extra field
             * @post value (string): group new value
             */
            function edit(){
                global $wpdb; 
                global $DOPBSP; 
                
                $wpdb->update($DOPBSP->tables->extras, array($_POST['field'] => $_POST['value']), 
                                                       array('id' => 1));
                
            	die();
            }
        }
    }