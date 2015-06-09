<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-reviews.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System reviews translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextReviews')){
        class DOPBSPTranslationTextReviews{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextReviews(){
                /*
                 * Initialize reviews text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'reviews'));
            }

            /*
             * Reviews text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function reviews($text){
                array_push($text, array('key' => 'PARENT_REVIEWS',
                                        'parent' => '',
                                        'text' => 'Reviews'));
                
                array_push($text, array('key' => 'REVIEWS_TITLE',
                                        'parent' => 'PARENT_REVIEWS',
                                        'text' => 'Reviews'));
                
                return $text;
            }
        }
    }