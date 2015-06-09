<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-staff.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System staff translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextStaff')){
        class DOPBSPTranslationTextStaff{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextStaff(){
                /*
                 * Initialize staff text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'staff'));
            }

            /*
             * Staff text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function staff($text){
                array_push($text, array('key' => 'PARENT_STAFF',
                                        'parent' => '',
                                        'text' => 'Staff'));
                
                array_push($text, array('key' => 'STAFF_TITLE',
                                        'parent' => 'PARENT_STAFF',
                                        'text' => 'Staff'));
                
                return $text;
            }
        }
    }